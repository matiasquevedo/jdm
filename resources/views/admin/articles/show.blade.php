@extends('admin.template.main')


@section('title', 'Lista de Articulos')

@section('content')
  <div>
    <ol class="breadcrumb">
      <li><a href="{{ route('categories.show',$article->category->id)}}">{{$article->category->name}}</a></li>
    </ol>
    <div>
      {{$article->created_at}}
    </div>

    <div>
      {{$article->update_at}}
    </div>
  </div>

	<div class="container-fluid">
  		<h3>{{$article->title}} 
  		@if($article->state == '0')
			<span class="label label-danger">Sin Publicar</span>
			<div class="btn btn-default"><a href="{{ route('articles.post',$article->id)}}">Publicar</a></div>
		@else
			<span class="label label-success">Publicada</span>
			<div class="btn btn-default"><a href="{{ route('articles.undpost',$article->id)}}">No Publicar</a></div>
  		@endif
  		</h3>

      <div>
              {!!$article->volanta!!}
      </div>


  		<div class="panel panel-default">
  			<div class="panel-body" id="content">
  				
          <div>

            <div>
              <h4>{!!$article->bajada!!}</h4>
            </div>
            
  					{!!$article->content!!}  					
  				
          </div>
          <div>
            <div>
              <h3>Fuente: {!!$article->fuente!!}</h3>
            </div>
          </div>

  				<div>
  					<div>
  						<h4>Imagen de Portada</h4>
  					</div>
  					<div>
  						<img src="/images/articles/{{$image}}" alt="">
  					</div>
  				</div>
  				
  			</div>
		</div>
	</div>
@endsection