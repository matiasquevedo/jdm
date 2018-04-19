@extends('admin.template.main')


@section('title', 'Nuevo Articulo')

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
			<h3>Nuevo Articulo</h3>
		</div>

		{!! Form::open(['route'=>'articles.store', 'method'=>'POST','files'=>'true']) !!}

		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('title','Titulo*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('title',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('bajada','Bajada*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('bajada',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('volanta','Volanta*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('volanta',null,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('content','Contenido*') !!}
				{!! Form::textarea('content',null,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
				</div>
			</div>


  			<div class="col-md-4">
  				
				<div class="form-group">
				{!! Form::label('category_id','Categoria*') !!}
				{!! Form::select('category_id',$categories,null,['class'=>'form-control select-category','required']) !!}
				</div>


				<div class="form-group">
				{!! Form::label('tags','Columna*') !!}
				{!! Form::select('tags[]',$tags,null,['class'=>'form-control select-tag','multiple']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('fuente','Fuente* (fuente propia colocar: Brick') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('fuente',null,['class'=>'form-control','placeholder'=>'Fuente']) !!}
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