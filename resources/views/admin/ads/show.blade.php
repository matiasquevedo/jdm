@extends('admin.template.main')


@section('title', 'Publicidad')

@section('content')


	<div class="container-fluid">
  		<h3>{{$ad->name}}
              @if($ad->category == '0')
              <span class="label label-danger">Paquete 1</span>
              @elseif($ad->category == '1')
              <span class="label label-success">Paquete 2</span>
              @endif

              <div class="btn btn-default"><a href="{{ route('ads.CreatePdf', $ad->id) }}">Generar Contrato</a></div>
      </h3>
      <div class="row">
        <div class="col-md-8">
          
          <h4>{{$ad->description}}</h4>

        </div>
        <div class="col-md-4">
          <h3>Precio de Paquete: {{$ad->precio}}</h3>
          <h3>Periodo: {{$ad->periodo}}</h3> 
          <h3>Precio Mensual: {{$precioMensual}}</h3>
          <div>
            <div>
              <img width="330" height="330" src="/images/publicistas/paginaPrincipal/{{$ad->image}}" alt="">
            </div>
          </div>

        </div>
      </div>
  		
	</div>
@endsection