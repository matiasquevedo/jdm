@extends('admin.template.main')


@section('title', 'Editar Usuario ' . $user->name)

@section('content')

	{!! Form::open(['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}

		<div class="form-group">
			{!! Form::label('name','Nombre') !!}
			{!! Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('email','Email') !!}
			{!! Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'nombre@server.com','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('type','Tipo Usuario') !!}
			{!! Form::select('type',[''=>'Seleccione Tipo de Usuario' ,'nova'=>'Nuevo','member'=>'Editor','admin'=>'Administrador','even'=>'Eventista','revisor'=>'Revisor'],$user->type,['class'=>'form-control','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Editar',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}


@endsection