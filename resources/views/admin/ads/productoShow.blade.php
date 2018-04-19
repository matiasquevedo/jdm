@extends('admin.template.main')


@section('title', 'Publicidad')

@section('content')


<div class="container">
	<h2> {{$producto->nombre}}</h2> 
	<h3>Precio: {{$producto->precio}}</h3>
	<div >
    	<h4>{{$producto->descripcion}}</h4>
	</div>  		
</div>
@endsection