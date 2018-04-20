@extends('admin.template.main')


@section('title', 'Lista de Articulos')

@section('content')

<div class="row">
  <div class="col-md-1">
    
    <a href="{{ route('articles.create')}}" class="btn btn-info">Nuevo</a>

  </div>
    <div class="col-md-9">
      <div>
  </div>


  {!! Form::open(['route'=>'articles.varios', 'method'=>'GET','files'=>'true']) !!}

      <table class="table table-striped">
  <thead>
    <tr>
      <th></th>
      <th>Titulo</th>
      <th>Usuario</th>
      <th>Estado</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <td>{{ Form::checkbox('box[]',$article->id, null, ['class' => 'field']) }}</td>
      <td> <a href="{{ route('articles.show', $article->id) }}">{{$article->title}}</a></td>
      <td>
         @if($article->user->type == "member")
          <a href="{{ route('user.articles', $article->user->id) }}">{{$article->user->name}}</a> 
          <span class="label label-success">{{ $article->user->type }}</span>
        @else
          <a href="{{ route('user.articles', $article->user->id) }}">{{$article->user->name}}</a>
          
          <span class="label label-info">{{$article->user->type}}</span>
        @endif
      </td>
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
{!! $articles->render() !!}   

  </div>
  <div class="col-md-2">


  <div class="form-group div-fijo">
      {!! Form::label('act','Acción') !!}
      {!! Form::select('act',config('multiple.opciones'),null,['class'=>'form-control','placeholder'=>'Seleccione una opción...','required']) !!}
      {!! Form::submit('Ir',['class'=>'btn btn-primary']) !!}
</div>
    
    

  </div>
</div>

{!! Form::close() !!}

@endsection

@section('js')
  <script>

    $('.select-tag').chosen({
      placeholder_text_multiple:'Ubicacion de Publicidad',
      search_contains:true,

    });
    

    
  </script>

@endsection