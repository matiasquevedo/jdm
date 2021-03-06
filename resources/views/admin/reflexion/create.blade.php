@extends('admin.template.main')


@section('title', 'Nuevo Mensaje Semanal')

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
			<h3>Nuevo Mensaje Semanal</h3>
		</div>

		{!! Form::open(['route'=>'mensajes.store', 'method'=>'POST','files'=>'true']) !!}

		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('title','Titulo*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('content','Mensaje*') !!}
				{!! Form::textarea('content',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Mensaje','required']) !!}
				</div>
			</div>


  			<div class="col-md-4">
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

		$('#trumbowyg-demo').trumbowyg();

		document.getElementById("upload").onchange = function() {
			var reader = new FileReader(); //instanciamos el objeto de la api FileReader

  			reader.onload = function(e) {
    		document.getElementById("image").src = e.target.result;
  			};

  		// read the image file as a data URL.
  		reader.readAsDataURL(this.files[0]);
		};

		function limite_textarea(valor) {   
    		total = valor.length;
        	document.getElementById('cont').innerHTML = total;
		}

		

		
	</script>

@endsection