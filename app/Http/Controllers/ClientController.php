<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function dashboard()
    {

        $news = Newsletter::latest();
        /* $news = DB::table('newsletters')->orderBy('id', 'asc')->latest()->paginate(2); */
        $trashnews = Newsletter::onlyTrashed()->latest();


        return view('client.dashboard', compact('news', 'trashnews'));
    }
}
