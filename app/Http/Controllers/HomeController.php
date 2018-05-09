<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

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
            $horarios = Horario::orderBy('id','DESC')->paginate(5);
            return view('admin.index')->with('horarios',$horarios);
        }elseif ($request->user()->type == 'member') {
            return view('editor.index');
        }elseif ($request->user()->type == 'nuevo') {
            return view('nova.index');
        }
        
        
    }
}
