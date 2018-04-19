@extends('admin.template.main')


@section('title', 'Articulos por: '.$user->name)

@section('content')



<div class="row">

  <div class="col-md-1">
  	
  	

  </div>
  <div class="col-md-10">
      <h3>Articulos por: {{$user->name}} - Cantidad: {{$count}} </h3>
  		<table class="table table-striped">
  <thead>
    <tr>
      <th>Titulo</th>
      <th>URL</th>
      <th>Estado</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>      
      <td> <a href="{{ route('articles.show', $article->id) }}">{{$article->title}}</a></td>
      <td><a href="http://diario.brickdiario.com/article/{{$article->id}}">diario.brickdiario.com/article/{{$article->id}}</a></td>
      <td>
        @if($article->state == "0")
          <span class="label label-danger">Sin Publicar</span>
        @else
          <span class="label label-success">Publicada</span>
        @endif

      </td>
      <td>
        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">   <span class="glyphicon glyphicon-wrench">          
          </span>
        </a>
        <a href="{{ route('articles.destroy', $article->id) }}" class="btn btn-danger">
          <span class="glyphicon glyphicon-remove"></span>
        </a>
      </td>
      
    </tr>
  	@endforeach
  </tbody>
</table>	

  </div>
  <div class="col-md-1">
  	
  	

  </div>
</div>



@endsection