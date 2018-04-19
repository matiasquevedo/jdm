<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Image;
use App\User;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $articles = Article::Search($request->title)->orderBy('id','DESC')->paginate(20);
        $articles->each(function($articles){
            $articles->user;
        });
        return view('admin.articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //Manipulacion de Imagenes
        //dd($request);
        if($request->file('image')){
            $file = $request->file('image');
            $name = 'diario_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/articles/';
            $file->move($path,$name);
        }
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();

        $image = new Image();
        $image->foto = $name;
        $image->article()->associate($article);
        $image->save();

        $article->tags()->sync($request->tags);
        flash('Se creado el articulo ' . $article->title)->success();
        return redirect()->route('articles.index');

    }

    public function EditorStore(ArticleRequest $request)
    {
        //Manipulacion de Imagenes
        if($request->file('image')){
            $file = $request->file('image');
            $name = 'diario_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '/images/articles/';
            $file->move($path,$name);
        }
        $article = new Article($request->all());
        $article->user_id = \Auth::user()->id;
        $article->save();

        $image = new Image();
        $image->foto = $name;
        $image->article()->associate($article);
        $image->save();

        $article->tags()->sync($request->tags);
        flash('Se creado el articulo ' . $article->title)->success();
        return redirect()->route('editor.articles.index');

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
        $article = Article::find($id);
        $image = DB::table('images')->where('article_id',$id)->value('foto');
        

        return view('admin.articles.show')->with('article',$article)->with('image',$image);
    }

    public function post($id){
        $article = Article::find($id);
        $article->state = '1';
        $article->save();
        flash('Se a publicado el articulo: ' . $article->title)->success();
        return redirect()->route('articles.index',$article->id);
    }

    public function undpost($id){
        $article = Article::find($id);
        $article->state = '0';
        $article->save();
        flash('Se a despublicado el articulo: ' . $article->title)->error();
        return redirect()->route('articles.index',$article->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.articles.edit')->with('article',$article);
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
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();
        $article->tags()->sync($request->tags);
        flash('Se a editado el articulo ' . $article->title)->success();
        return redirect()->route('articles.index');
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
        $article = Article::find($id);
        $article->delete();
        flash('Se a eliminado el articulo ' . $article->title)->error();
        return redirect()->route('articles.index');
    }

    public function eliminarVarios(Request $request){
        $val=$request->act;
        $myCheckboxes = $request->input('box');

        if ($myCheckboxes == null) {            
            return redirect()->route('articles.index');
        } else {
            if ($val == '0') {

               foreach ($myCheckboxes as $b) {
                   # code...
                $article = Article::find($b);
                $article->delete();
               }
               return redirect()->route('articles.index');
            } elseif ($val == '1') {
                foreach ($myCheckboxes as $b) {
                   # code...
                $article = Article::find($b);
                $article->state = '1';
                $article->save();
               }
               return redirect()->route('articles.index');
                
            } elseif ($val == '2') {
                foreach ($myCheckboxes as $b) {
                   # code...
                $article = Article::find($b);
                $article->state = '0';
                $article->save();
               }
               return redirect()->route('articles.index');
                
            }
            
        }
    }

    public function list(Request $request){
        $articles = Article::Search($request->title)->
        orderBy('id','DESC')->paginate(7);
        $articles->each(function($articles){
            $articles->user;
        });
        return view('admin.noticias')->with('articles',$articles);
    }

    public function notificacion($id){

    }

    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    //////////////////////////////EDITOR!!!!!!!!!!!!///////////////////////////////////////////////////
    public function EditorIndex(Request $request){
       //$articles = Article::Search($request->title)->orderBy('id','ASC')->paginate(7);
        $id = \Auth::user()->id;
        $articles = DB::table('articles')->where('user_id','LIKE',"%$id%")->get();
        /*$articles->each(function($articles){
            $articles->category;
            $articles->user;
        });*/
        //dd($articles);
        return view('editor.articles.index')->with('articles',$articles);
    }

    public function EditorArticleCreate(){
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tag::orderBy('name','ASC')->pluck('name','id');
        return view('editor.articles.create')->with('categories',$categories)->with('tags',$tags);

    }

    public function EditorArticleEdit($id){
        $article = Article::find($id);
        $article->category;
        $art_tags=$article->tags->pluck('id')->ToArray();
        $categories = Category::orderBy('name','ASC')->pluck('name','id');
        $tags = Tag::orderBy('name','ASC')->pluck('name','id');
       # dd($article);
        return view('editor.articles.edit')->with('categories',$categories)->with('tags',$tags)->with('article',$article)->with('art_tags',$art_tags);
    }

    public function EditorArticleUpdate(Request $request, $id)
    {
        //
        $article = Article::find($id);
        $article->fill($request->all());
        $article->save();
        $article->tags()->sync($request->tags);
        flash('Se a editado el articulo ' . $article->title)->success();
        return redirect()->route('editor.articles.index');
    }

    public function EditorArticleShow($id){
        $article = Article::find($id);
        $image = DB::table('images')->where('article_id',$id)->value('foto');        

        return view('editor.articles.show')->with('article',$article)->with('image',$image);

    }

    public function EditorArticleDestroy($id){
        $article = Article::find($id);
        $article->delete();
        flash('Se a eliminado el articulo ' . $article->title)->error();
        return redirect()->route('editor.articles.index');

    }

    public function EditorDocumentacion(){
        return view('editor.documentacion.doc');
    }

    public function ApiIndex(){

        //$articles = Article::with('user','category','images','tags')->orderBy('id','DESC')->get();
        $articles = DB::table('articlespostview')->get();
        $json = json_decode($articles,true);
        return response()->json(array('result'=>$json));

    }

    public function ApiCategories(){
        $categories = Category::all();
        $json = json_decode($categories,true);
        return response()->json(array('result'=>$json));
    }

    public function ApiTags(){
        $tags = Tag::all();      
        $json = json_decode($tags,true);  
        return response()->json(array('result'=>$json));
    }

    public function ApiShow($id){
        $article = Article::with('user','images')->get()->find($id);
        $json = json_decode($article,true);
        return response()->json(array('result'=>$json));
    }

    
    ////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////
    ////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////////////////////////REVISOR!!!!!!!!!!!!//////////////////////////////////////



    

}

/*'title','state','title','content','user_id','category_id'

->with('categories',$categories)->with('tags',$tags)->with('article',$article)->with('art_tags',$art_tags);

*/