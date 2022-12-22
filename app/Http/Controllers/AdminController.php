<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function insert_data()
    {
        return view('admin.insert');
    }

    public function insert_data_pocess(Request $request)
    {
        $validate = $request->validate(
            [
                'title' => 'required',
                'content' => 'required',
            ],
            [
                'title.required' => 'Please Insert Name',
                'content.required' => 'Please Insert Content',

            ]
        );

        Newsletter::insert([
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);

        return redirect('dashboard');
    }

    public function update_data($id)
    {
        $news = Newsletter::find($id);
        return view('admin.update', compact('news'));
    }

    public function update_data_process(Request $request, $id)
    {

        $news = Newsletter::find($id)->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('dashboard');
    }

    public function soft_delete($id)
    {

        $delete = Newsletter::find($id)->delete();
        return Redirect()->back();
    }

    public function restore($id)
    {

        DB::table('newsletters')
            ->where('id', $id)
            ->update(['created_at' => Carbon::now()->toDateTimeString()]);
        $delete = Newsletter::withTrashed()->find($id)->restore();
        return Redirect()->back();
    }

    public function ajax_call()
    {
        $news = Newsletter::latest()->get();
        /* $news = DB::table('newsletters')->orderBy('id', 'asc')->latest()->paginate(2); */
        $trashnews = Newsletter::onlyTrashed()->latest()->paginate(2);



        return response()->json(array('news' => $news), 200);
    }
}
