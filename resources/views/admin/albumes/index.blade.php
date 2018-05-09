@extends('admin.template.main')


@section('title', 'Albumes')

@section('content')

<div class="row">
  <div class="col-md-1">
    
    <a href="{{ route('albumes.create')}}" class="btn btn-info">Nuevo Album</a>

  </div>
    <div class="col-md-9">
      <div>
  </div>

  </div>
  <div class="col-md-2">


  </div>
</div>

 <div class="container">
    <div class="row"><br>
      @foreach($albumes as $album)
          <a href="{{ route('albumes.show', $album->id) }}">
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
                <img src="/fotos/albumes/{{$album->portada}}" class="img-responsive">
                <h3> {{$album->titulo}} </h3><a href="{{ route('albumes.destroy', $album->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
            </div>
          </a>

        @endforeach
    </div>
    {!! $albumes->render() !!}  
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