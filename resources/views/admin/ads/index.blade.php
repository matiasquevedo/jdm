@extends('admin.template.main')


@section('title', 'Publicidad')

@section('content')



<div class="row">
  <div class="col-md-2">
  	
  	<a href="{{ route('ads.create')}}" class="btn btn-info">Nuevo</a>

  </div>
  <div class="col-md-10">

  		<table class="table table-striped">
  <thead>
    <tr>
      <th>#Id</th>
      <th>Nombre</th>
      <th>Precio Contratado</th>
      <th>Periodo</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($ads as $ad)
		<tr>
			<td>{{$ad->id}}</td>
			<td><a href="{{ route('ads.show', $ad->id) }}">{{$ad->name}}</a></td>
      <td>{{$ad->precio}}</td>
      <td>{{$ad->periodo}}</td>
      <td>{{$ad->user->name}}</td>
			<td><a href="{{ route('ads.edit', $ad->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('ads.destroy', $ad->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>


  	@endforeach
  
  </tbody>
</table>
{!! $ads->render() !!}  	
  <h3>Total de Publicidad mes:  {{$total}}</h3> 
    
    

  </div>
 </div>

 <h3>Paquetes Publicitarios</h3>

 <div class="row">
  <div class="col-md-2">
    
    <a href="{{ route('admin.preducto.create' )}}" class="btn btn-info">Nuevo Paquete</a>

  </div>
  <div class="col-md-10">

      <table class="table table-striped">
  <thead>
    <tr>
      <th>#Id</th>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Precio</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $producto)
    <tr>
      <td>{{$producto->id}}</td>
      <td><a href="{{ route('admin.preducto.show', $producto->id) }}">{{$producto->nombre}}</a></td>
      <td>{{$producto->descripcion}}</td>
      <td>{{$producto->precio}}</td>
      <td><a href="{{ route('admin.preducto.edit', $producto->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('admin.preducto.destroy', $producto->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
    </tr>


    @endforeach
  
  </tbody>
</table>
{!! $ads->render() !!}    
    
    

  </div>
 </div>



@endsection