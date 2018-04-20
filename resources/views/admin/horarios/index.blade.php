@extends('admin.template.main')


@section('title', 'Horarios')

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

	<a href="{{ route('horarios.create')}}" class="btn btn-info">Nuevo</a>

	

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Tema</th>
						<th>dia</th>
						<th>hora</th>
					</tr>
				</thead>
				<tbody>
	@foreach($horarios as $horario)
					<tr>
      					<td>{{$horario->tema}}</td>
      					<td>{{$horario->dias}}</td>
           				<td>{{$horario->hora}} hs</td>
      					<td><a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('horarios.destroy', $horario->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
					</tr>
	@endforeach	
				</tbody>
				


			</table>
			{!! $horarios->render() !!} 
			
				
					
				
		</div>
		<div class="col-md-1"></div>
	</div>
@endsection