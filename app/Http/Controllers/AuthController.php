<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        if (!isset(session()->all()['loginId'])) {
            return view('auth.login');
        } else {
            return redirect('dashboard');
        }
    }

    public function loginUser(Request $request)
    {
        $user = User::where('email', '=', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('dashboard');
            }
        } else {
            die('wrong username or password');
        }
    }

    public function dashboard()
    {


        /* $oldest = DB::table('newsletters')->first();
        $oldest = DB::table('newsletters')->orderBy('id', 'desc')->first()->get();
        $data_id = $oldest->id; */

        /* $data_id = DB::table('newsletters')->where('id', 129)->where('title', 'yahoo')->get();
        die(var_dump($data_id[0]->title)); */
        /* $delete = Newsletter::find($data_id)->delete(); */

        $news = Newsletter::latest()->paginate(2);
        /* $news = DB::table('newsletters')->orderBy('id', 'asc')->latest()->paginate(2); */
        $trashnews = Newsletter::onlyTrashed()->latest()->paginate(2);


        return view('admin.dashboard', compact('news', 'trashnews'));
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return view('auth.login');
        } else {
            die('loggg');
        }
    }
}
