<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\User;
use App\ImageEvento;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class EventosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $eventos = Evento::orderBy('id','DESC')->paginate(7);
        return view('admin.eventos.index')->with('eventos',$eventos);
    }

    public function indexUser(){

        $id = \Auth::user()->id;
        $eventos = DB::table('eventos')->where('user_id','LIKE',"%$id%")->get();
        return view('eventista.eventos.index')->with('eventos',$eventos);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('eventista.eventos.create');
    }

    public function AdminCreate()
    {
        //
        return view('admin.eventos.create');
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
        if($request->file('image')){
            $file = $request->file('image');
            $name = 'diario_evento' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/eventos/';
            $file->move($path,$name);
        }
        $evento = new Evento($request->all());
        $evento->user_id = \Auth::user()->id;
        $evento->save();

        $image = new ImageEvento();
        $image->foto = $name;
        $image->evento()->associate($evento);
        $image->save();


        flash('Se creado el evento ' . $evento->title)->success();
        return redirect()->route('eventista.eventos.index');
    }

    public function AdminStore(Request $request)
    {
        //
        if($request->file('image')){
            $file = $request->file('image');
            $name = 'diario_evento' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/eventos/';
            $file->move($path,$name);
        }
        $evento = new Evento($request->all());
        $evento->user_id = \Auth::user()->id;
        $evento->save();

        $image = new ImageEvento();
        $image->foto = $name;
        $image->evento()->associate($evento);
        $image->save();

        flash('Se creado el evento ' . $evento->title)->success();
        return redirect()->route('admin.eventos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd("todo ok");
        $evento = Evento::find($id);
        return view('eventista.eventos.show')->with('evento',$evento);
    }

    public function AdminShow($id)
    {
        //dd("todo ok");
        $evento = Evento::find($id);
        return view('admin.eventos.show')->with('evento',$evento);
    }

    public function post($id){
        $evento = Evento::find($id);
        $evento->state = '1';
        $evento->save();
        flash('Se a publicado el articulo: ' . $evento->title)->success();
        return redirect()->route('admin.eventos.index',$evento->id);
    }

    public function undpost($id){
        $evento = Evento::find($id);
        $evento->state = '0';
        $evento->save();
        flash('Se a publicado el articulo: ' . $evento->title)->success();
        return redirect()->route('admin.eventos.index',$evento->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd("todo ok editar");
        $evento = Evento::find($id);
        return view('eventista.eventos.edit')->with('evento',$evento);
    }

    public function AdminEdit($id)
    {
        //dd("todo ok editar");
        $evento = Evento::find($id);
        return view('admin.eventos.edit')->with('evento',$evento);
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
        $evento = Evento::find($id);
        $evento->fill($request->all());
        $evento->save();
        flash('Se a editado el articulo ' . $evento->title)->success();
        return redirect()->route('eventos.index');
    }

    public function AdminUpdate(Request $request, $id)
    {
        //
        $evento = Evento::find($id);
        $evento->fill($request->all());
        $evento->save();
        flash('Se a editado el articulo ' . $evento->title)->success();
        return redirect()->route('admin.eventos.index');
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
        $evento = Evento::find($id);
        $evento->delete();
        flash('Se a eliminado el articulo ' . $evento->title)->error();
        return redirect()->route('eventista.eventos.index');
    }

    public function AdminDestroy($id)
    {
        //
        $evento = Evento::find($id);
        $evento->delete();
        flash('Se a eliminado el articulo ' . $evento->title)->error();
        return redirect()->route('admin.eventos.index');
    }



    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////---API---///////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////


    public function ApiIndex(){
        $eventos = DB::table('eventospostview')->get();
        $json = json_decode($eventos,true);
        return response()->json(array('result'=>$json));
    }

    public function ApiShow($id){
        $evento = Evento::with('user','images')->get()->find($id);
        $json = json_decode($evento,true);
        return response()->json(array('result'=>$json));
    }

    public function PublicShow($id){
        //dd("todo ok");
        $evento = Evento::find($id);
        $image = DB::table('imagesEventos')->where('evento_id',$id)->value('foto');
        //dd($article);

        return view('showEvento')->with('evento',$evento)->with('image',$image);
    }

}
