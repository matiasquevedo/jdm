@extends('admin.template.main')


@section('title', 'Ver Articulo' )

@section('content')

	<div class="container-fluid">
  		<h3>{{$evento->title}} 
  		@if($evento->state == '0')
			<span class="label label-danger">Sin Publicar</span>
      <div class="btn btn-default"><a href="{{ route('evento.post',$evento->id)}}">Publicar</a></div>
		@else
			<span class="label label-success">Publicada</span>
      <div class="btn btn-default"><a href="{{ route('evento.undpost',$evento->id)}}">No Publicar</a></div>
  		@endif
      <div class="btn btn-default"><a href="{{ route('eventos.edit',$evento->id)}}">Editar</a></div>
  		</h3>
      <div>
        <span class="glyphicon glyphicon-tag">{!!$evento->tipo!!}</span>
      </div>
      
  		<div class="panel ">
  			<div class="panel-body" id="content">
  				<div>
            <div class="row">
            <div class="col-sm-6">
              <div>
                <h3>
                  <span class="glyphicon glyphicon-calendar">{!!$evento->fecha!!}</span>                  
                </h3>          
              </div>
              <div>
                <h3>
                  <span class="glyphicon glyphicon-time">{!!$evento->hora!!}</span>                  
                </h3>
              </div>
            </div>
            <div class="col-sm-6">
              <div>
                <h3>
                  <span class="glyphicon glyphicon-map-marker">{!!$evento->lugar!!}</span>                  
                </h3>
              </div>
              <div>
                <h3>
                  <span class="glyphicon glyphicon-shopping-cart">{!!$evento->precio!!}</span>        
                </h3>
              </div>
            </div>
            </div>
            <div>
              <p>{!!$evento->descripcion!!}</p>
            </div>
          </div>
  				
  			</div>
		</div>
	</div>
@endsection