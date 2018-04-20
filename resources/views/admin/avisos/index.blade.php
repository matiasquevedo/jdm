@extends('admin.template.main')


@section('title', 'Avisos')

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

	<a href="{{ route('avisos.create')}}" class="btn btn-info">Nuevo</a>

	

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Titulo</th>
						<th>Aviso</th>
						<th>Estado</th>
					</tr>
				</thead>
				<tbody>
	@foreach($avisos as $aviso)
					<tr>
      					<td>{{$aviso->titulo}}</td>
      					<td>{{$aviso->aviso}}</td>
           				<td>
						@if($aviso->state == "0")
           					<span class="label label-danger">Sin Publicar</span>
           				    <div class="btn btn-default"><a href="{{route('avisos.post',$aviso->id)}}">Publicar</a></div>
						@else
           					<span class="label label-success">Publicada</span>
           				    <div class="btn btn-default"><a href=" {{route('avisos.undpost',$aviso->id)}} ">Despublicar</a></div>
						@endif
           				</td>
      					<td><a href="{{ route('avisos.edit', $aviso->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('avisos.destroy', $aviso->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
	@endforeach	
				</tbody>
				


			</table>
			{!! $avisos->render() !!} 
			
				
					
				
		</div>
		<div class="col-md-1"></div>
	</div>
@endsection