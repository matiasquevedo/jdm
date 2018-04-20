<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Horario;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $horarios = Horario::orderBy('id','DESC')->paginate(5);
        return view('admin.horarios.index')->with('horarios',$horarios);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd("todo ok");
        return view('admin.horarios.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd('todo ok desde crear '.$request);
        $horario= New Horario($request->all());
        $horario->save();
        return redirect()->route('horarios.index');

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
        $horario = Horario::find($id);
        return view('admin.horarios.edit')->with('horario',$horario);;
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
        $horario = Horario::find($id);
        $horario->fill($request->all());
        $horario->save();
        flash('Se a editado el horario ' . $horario->tema)->success();
        return redirect()->route('horarios.index');

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
        $horario = Horario::find($id);
        $horario->delete();
        flash('Se a eliminado el horario ' . $horario->tema)->error();
        return redirect()->route('horarios.index');
    }

    public function apiHorarios(){
    	$horarios = Horario::all();
        $json = json_decode($horarios,true);
        return response()->json(array('result'=>$json));
    }
}
