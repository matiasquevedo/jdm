<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reflexion;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReflexionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mensajes = Reflexion::orderBy('id','DESC')->paginate(7);
        $mensajes->each(function($mensajes){
            $mensajes->user;
        });
        return view('admin.reflexion.index')->with('mensajes',$mensajes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.reflexion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $mensaje = new Reflexion($request->all());
        $mensaje->user_id = \Auth::user()->id;
        $mensaje->save();
        return redirect()->route('mensajes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $mensaje= Reflexion::find($id);
        return view('admin.reflexion.edit')->with('mensaje',$mensaje);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mensaje= Reflexion::find($id);
        $mensaje->fill($request->all());
        $mensaje->save();
        flash('Se a editado el mensaje ' . $mensaje->title)->success();
        return redirect()->route('mensajes.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mensaje = Reflexion::find($id);
        $mensaje->delete();
        flash('Se a eliminado el mensaje ' . $mensaje->title)->error();
        return redirect()->route('mensajes.index');
    }


    public function apiMensaje(){
        $mensaje = Reflexion::latest()->first();
        $json = json_decode($mensaje);
        return response()->json(array('result'=>$json));
    }

}
