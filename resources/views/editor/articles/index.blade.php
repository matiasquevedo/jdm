@extends('editor.template.main')


@section('title', 'Mis Articulos')

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

	

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Estado</th>
						<th>Acción</th>
					</tr>
				</thead>
				<tbody>
	@foreach($articles as $article)
					<tr>
      					<td> <a href="{{ route('editor.articles.show', $article->id) }}">{{$article->title}}</a></td>
           				<td>
        					@if($article->state == "0")
          					<span class="label label-danger">Sin Publicar</span>
       						@else
          					<span class="label label-success">Publicada</span>
       						 @endif

      					</td>
      					<td>
      						@if($article->state == "0")
      						<a href="{{ route('editor.articles.edit', $article->id) }}" class="btn btn-warning">
      							<span class="glyphicon glyphicon-wrench"></span>
      						</a>
      						<a href="{{ route('editor.articles.destroy', $article->id) }}" class="btn btn-danger">
      							<span class="glyphicon glyphicon-remove"></span>
      						</a>
      						@endif
      					</td>
					</tr>
	@endforeach	
				</tbody>
				


			</table>
			
				
					
				
		</div>
		<div class="col-md-1"></div>
	</div>
@endsection