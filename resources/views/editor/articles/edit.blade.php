@extends('editor.template.main')


@section('title', 'Editar Articulo')

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
			<h3>Editar el Articulo: {!! $article->title !!}</h3>
		</div>

		{!! Form::open(['route'=>['editor.articles.update',$article], 'method'=>'PUT']) !!}

		<div class="row">
  			<div class="col-md-8">
				<div class="form-group">
				{!! Form::label('title','Titulo') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('bajada','Bajada*') !!}<p><i>Minimo 30 Caracteres</i></p>
				{!! Form::text('bajada',$article->bajada,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('volanta','Volanta*') !!}<p><i>Minimo 8 Caracteres</i></p>
				{!! Form::text('volanta',$article->volanta,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('content','Contenido') !!}<p><i>Minimo 280 Caracteres</i></p>
				{!! Form::textarea('content',$article->content,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
				</div>
			</div>


  			<div class="col-md-4">
  				
				<div class="form-group">
				{!! Form::label('category_id','Categoria') !!}
				{!! Form::select('category_id',$categories,$article->category->id,['class'=>'form-control select-category','required']) !!}
				</div>


				<div class="form-group">
				{!! Form::label('tags','Columna') !!}
				{!! Form::select('tags[]',$tags, $art_tags,['class'=>'form-control select-tag','multiple']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('fuente','Fuente*') !!}<p><i>Fuente propia colocar: Brick</i></p>
				{!! Form::text('fuente',$article->fuente,['class'=>'form-control','placeholder'=>'Fuente']) !!}
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