<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        #dd($request->user()->type);
        if($request->user()->type == 'admin'){
            return view('admin.index');
        }elseif ($request->user()->type == 'member') {
            return view('editor.index');
        }elseif ($request->user()->type == 'nuevo') {
            return view('nova.index');
        }
        
        
    }
}
