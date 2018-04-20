@extends('admin.template.main')


@section('title', 'Lista de Usuarios')

@section('content')



<div class="row">
  <div class="col-md-1">
  	
  	<a href="{{ route('users.create')}}" class="btn btn-info">Nuevo</a>

  </div>
  {{$users}}
  <div class="col-md-10">

  		<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Tipo</th>
      <th>Accion</th>
    </tr>
  </thead>
  <tbody>
	@if(empty($users))
		<tr>
			<td></td>
			<td>No hay usuarios para Mostrar</td>
			<td></td>
			<td></td>
		</tr>
	@else
		@foreach($users as $user)
		<tr>
			<td>{{$user->name}}</td>
      <td>
        @if($user->type == "member")
          <span class="label label-success">{{ $user->type }}</span>
        @else
          <span class="label label-info">{{$user->type}}</span>
        @endif
      </td>
      <td>
      <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a>
      </td>
		</tr>


  		@endforeach
  

	@endif

  	
  </tbody>
</table>
{!! $users->render() !!}  	

  </div>
  <div class="col-md-1">
    
    
  </div>
</div>

@endsection

@section('js')

@endsection