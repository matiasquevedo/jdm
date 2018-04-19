@extends('revisor.template.main')


@section('title', 'Lista de Articulos')

@section('content')

<div class="row">
  <div class="col-md-1">
    

  </div>
    <div class="col-md-10">


  {!! Form::open(['route'=>'articles.varios', 'method'=>'GET','files'=>'true']) !!}

      <table class="table table-striped">
  <thead>
    <tr>
      <th>Titulo</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
    <tr>
      <td> <a href="{{ route('revisor.articles.edit', $article->id) }}">{{$article->title}}</a></td>
    </tr>


    @endforeach
  
  </tbody>
</table>  

  </div>
  <div class="col-md-1">

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