@extends('admin.template.main')


@section('title', 'Nuevo Tags')

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


	{!! Form::open(['route'=>'tags.store', 'method'=>'POST']) !!}

		<div class="form-group">
			{!! Form::label('name','Nombre Tag') !!}
			{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre','required']) !!}
		</div>

		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>



	{!! Form::close() !!}


@endsection