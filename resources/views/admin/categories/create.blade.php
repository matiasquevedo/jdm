@extends('admin.template.main')


@section('title', 'Nuevo Categoria')

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


	{!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('name','Nombre Categoria') !!}
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}


@endsection