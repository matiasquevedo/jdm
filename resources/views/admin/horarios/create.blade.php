@extends('admin.template.main')


@section('title', 'Nuevo Horario')

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
			<h3>Nuevo Horario</h3>
		</div>

		{!! Form::open(['route'=>'horarios.store', 'method'=>'POST','files'=>'true']) !!}


		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('tema','Tema*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('tema',null,['class'=>'form-control','placeholder'=>'Tema','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('dias','Dia*') !!}
				{!! Form::text('dias',null,['class'=>'form-control','placeholder'=>'Dia','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('hora','Hora*') !!}
				{!! Form::text('hora',null,['class'=>'form-control','placeholder'=>'Dia','required']) !!}
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