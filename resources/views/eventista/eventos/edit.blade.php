@extends('eventista.template.main')


@section('title', 'Editar Evento')

@section('content')

	@if(count($errors)>0)

		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)

					<li>
						{{ $error}}
					</li>

				@endforeach
			</ul>
			

		</div>
		
	@endif

	

	<div class="container">

		<div>
			<h3>Editar el Evento: {!! $evento->title !!}</h3>
		</div>

		{!! Form::open(['route'=>['eventos.update',$evento], 'method'=>'PUT']) !!}

		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('title','Titulo') !!}
				{!! Form::text('title',$evento->title,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('fecha','Fecha*') !!}
				{!! Form::text('fecha',$evento->fecha,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('hora','Hora*') !!}
				{!! Form::text('hora',$evento->hora,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('descripcion','Descripcion*') !!}
				{!! Form::textarea('descripcion',$evento->descripcion,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
				</div>
			</div>


  			<div class="col-md-4">  				
				<div class="form-group">
				{!! Form::label('lugar','Lugar*') !!}
				{!! Form::text('lugar',$evento->lugar,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('tipo','Tipo*') !!}<p><i>(Concierto,Teatro,etc...)</i></p>
				{!! Form::text('tipo',$evento->tipo,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('precio','Precio') !!}
				{!! Form::text('precio',$evento->precio,['class'=>'form-control','placeholder'=>'Fuente']) !!}
				</div>
  			</div>
		</div>	

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}
	</div>
	

@endsection

@section('js')
	<script>
		$('.select-tag').chosen({
			placeholder_text_multiple:'Seleccione al menos 3 tags',
			no_results_text: "Oops, no hay tags parecido a ",
			search_contains:true,

		});

		$('.select-category').chosen({
			placeholder_text_multiple:'Seleccione al menos 3 tags',
			no_results_text: "Oops, no hay categoria parecida a ",
			search_contains:true,

		});

		$('#trumbowyg-demo').trumbowyg();

	</script>

@endsection