@extends('eventista.template.main')


@section('title', 'Nuevo Evento')

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
			<h3>Nuevo Evento</h3>
		</div>

		{!! Form::open(['route'=>'eventos.store', 'method'=>'POST','files'=>'true']) !!}


		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('title','Titulo*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('fecha','Fecha*') !!}
				{!! Form::text('fecha',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('hora','Hora*') !!}
				{!! Form::text('hora',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('descripcion','Descripcion*') !!}
				{!! Form::textarea('descripcion',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
				</div>
			</div>


  			<div class="col-md-4">
  				<div class="form-group">
				{!! Form::label('lugar','Lugar*') !!}<p><i>(Concierto,Teatro,etc...)</i></p>
				{!! Form::text('lugar',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('tipo','Tipo*') !!}<p><i>(Concierto,Teatro,etc...)</i></p>
				{!! Form::text('tipo',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('precio','Precio') !!}
				{!! Form::text('precio',null,['class'=>'form-control','placeholder'=>'Fuente']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('image','Imagen de Portada*') !!}
				{!! Form::file('image',['id'=>'upload','name'=>'image']) !!}
				</div>

				<div class="preview">
					<img id="image" width="400" height="400">
				</div>
  			</div>
		</div>		

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>

		{!! Form::close() !!}


	</div>
	
	

@endsection

@section('js')
	<script>
		$('.select-tag').chosen({
			placeholder_text_multiple:'',
			no_results_text: "Oops, no hay tags parecido a ",
			search_contains:true,

		});

		$('.select-category').chosen({
			placeholder_text_multiple:'Seleccione al menos 3 tags',
			no_results_text: "Oops, no hay categoria parecida a ",
			search_contains:true,

		});

		$('#trumbowyg-demo').trumbowyg();

		document.getElementById("upload").onchange = function() {
			var reader = new FileReader(); //instanciamos el objeto de la api FileReader

  			reader.onload = function(e) {
    		document.getElementById("image").src = e.target.result;
  			};

  		// read the image file as a data URL.
  		reader.readAsDataURL(this.files[0]);
		};

	</script>

@endsection