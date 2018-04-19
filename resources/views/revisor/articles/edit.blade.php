@extends('revisor.template.main')


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

		{!! Form::open(['route'=>['revisor.articles.update',$article], 'method'=>'PUT']) !!}

		<div class="row">
				<div class="form-group">
				{!! Form::label('title','Titulo') !!}
				{!! Form::text('title',$article->title,['class'=>'form-control','placeholder'=>'Titulo','required']) !!}
				</div>

				<div class="form-group">
				{!! Form::label('content','Contenido') !!}
				{!! Form::textarea('content',$article->content,['class'=>'form-control','id'=>'trumbowyg-demo','placeholder'=>'Contenido','required']) !!}
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