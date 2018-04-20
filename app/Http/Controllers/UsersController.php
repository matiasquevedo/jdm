<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Activity;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function adminHome(){
        return view('admin.index');
    }


    public function index()
    {
        //
        $users = User::orderBy('id','ASC')->paginate(5);
        /*foreach ($activities as $activity) {
            dd($activity->user->name);
        }*/
        return view('admin.users.index')->with('users', $users);
    }

    



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        flash('Se a registrado ' . $user->name . ' de forma exitosa')->success();
        return redirect()->route('users.index');



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
        $user = User::find($id);
        return view('admin.users.edit')->with('user',$user);
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->type = $request->type;
        flash('Se a editado ' . $user->name . ' de forma exitosa')->success();
        $user->save();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        flash('Se a eliminado ' . $user->name . ' de forma exitosa')->error();
        $user->delete();
        return redirect()->route('users.index');
    }

    public function ArticlesForUser($id){
        $user = User::find($id);
        $articles = DB::table('articles')->where('user_id','LIKE',"%$id%")->get();
        $count = $articles->count();
        return view('admin.users.articles')->with('articles',$articles)->with('user',$user)->with('count',$count);

    }

    public function kk(){
        $activities = Activity::users(1)->get();
        /*foreach ($activities as $activity) {
            dd($activity->user->name);
        }*/
        return "hola";
    }

}
