<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aviso;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class AvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $avisos = Aviso::orderBy('id','DESC')->paginate(5);
        return view('admin.avisos.index')->with('avisos',$avisos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.avisos.create');
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
        $aviso= New Aviso($request->all());
        $aviso->save();
        flash('Se a creado ' . $aviso->titulo . ' de forma exitosa')->success();
        return redirect()->route('avisos.index');
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
        $aviso = Aviso::find($id);
        return view('admin.avisos.edit')->with('aviso',$aviso);
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
        $aviso = Aviso::find($id);
        $aviso->fill($request->all());
        $aviso->save();
        flash('Se a editado el aviso ' . $aviso->titulo)->success();
        return redirect()->route('avisos.index');
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
        $aviso = Aviso::find($id);
        $aviso->delete();
        flash('Se a eliminado el hoavisorario ' . $aviso->titulo)->error();
        return redirect()->route('avisos.index');
    }

    public function publicarAviso($id){
        $aviso = Aviso::find($id);
        $aviso->state = '1';
        $aviso->save();
        flash('Se a publicado el aviso: ' . $aviso->titulo)->success();
        return redirect()->route('avisos.index');
    }

    public function despublicarAviso($id){
        $aviso = Aviso::find($id);
        $aviso->state = '0';
        $aviso->save();
        flash('Se a publicado el aviso: ' . $aviso->titulo)->success();
        return redirect()->route('avisos.index');
    }

    public function apiAvisos(){
        $eventos = DB::table('avisospostview')->get();
        $json = json_decode($eventos,true);
        return response()->json(array('result'=>$json));
    }
}
