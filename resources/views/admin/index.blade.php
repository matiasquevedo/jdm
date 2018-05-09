@extends('admin.template.main')


@section('title', 'Inicio')

@section('content')

	<div class="container">
		<div class="row row-backbordered text-center">
			<div class="col-sm-12">
				<div class="panel panel-default panel-floating panel-floating-inline">
					<div class="panel-body">
						<div class="panel-content">
							<h3 class="m-b-0">
								<strong>Inicio</strong>
							</h3>
							<p class="text-muted">Tareas de adminitracion de la Aplicación</p>
							<div class="panel-actions"></div>
						</div>
						
					</div>
				</div>


			</div>
		</div>
</div>

<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">

		</div>
		<div class="col-md-3">
			<h4>Horarios</h4>
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
	</div>



@endsection