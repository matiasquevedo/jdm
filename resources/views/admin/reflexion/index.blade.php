@extends('admin.template.main')


@section('title', 'Lista de Articulos')

@section('content')

<p>Se publica el ultimo creado...</p>
<div class="row">
  <div class="col-md-1">
    
    <a href="{{ route('mensajes.create')}}" class="btn btn-info">Nuevo</a>

  </div>
    <div class="col-md-9">
      <div>
  </div>


  {!! Form::open(['route'=>'articles.varios', 'method'=>'GET','files'=>'true']) !!}

      <table class="table table-striped">
  <thead>
    <tr>
      <th>Titulo</th>
      <th>Contenido</th>
      <th>Autor</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($mensajes as $mensaje)
    <tr> 
      <td>{{$mensaje->title}}</td>
      <td>
        {!!$mensaje->content!!}
      </td>
      <td>
          {{$mensaje->user->name}}
      </td>
      <td>
        <a href="{{ route('mensajes.edit', $mensaje->id) }}" class="btn btn-warning">   <span class="glyphicon glyphicon-wrench">          
          </span>
        </a>
        <a href="{{ route('mensajes.destroy', $mensaje->id) }}" class="btn btn-danger">
          <span class="glyphicon glyphicon-remove"></span>
        </a>
      </td>
    </tr>


    @endforeach
  
  </tbody>
</table>
{!! $mensajes->render() !!}   

  </div>
  <div class="col-md-2">

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