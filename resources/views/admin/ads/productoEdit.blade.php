@extends('admin.template.main')


@section('title', 'Nuevo Producto')

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
			<h3>Editar Producto</h3>
		</div>

		{!! Form::open(['route'=>['admin.preducto.update', $producto->id], 'method'=>'PUT']) !!}

		<div class="row">
  			<div class="col-md-6">

				<div>
				{!! Form::label('Nombre','Nombre*') !!}
				{!! Form::text('nombre',$producto->nombre,['class'=>'form-control','placeholder'=>'Nombre','required']) !!} 
				</div>

				<div>
				{!! Form::label('Descripción','Descripción*') !!}
				{!! Form::text('descripcion',$producto->descripcion,['class'=>'form-control','placeholder'=>'Descripción','required']) !!} 
				</div>

				<div>
				{!! Form::label('Precio','Precio*') !!}
				{!! Form::number('precio',$producto->precio,['class'=>'form-control','placeholder'=>'Precio','required','step' => '0.1']) !!} 
				</div>	
			</div>				
							
		</div>
		<div class="form-group">
			{!! Form::submit('Crear',['class'=>'btn btn-primary']) !!}
		</div>
		{!! Form::close() !!}	
	</div>	



@endsection


@section('js')
	<script>

		$('.select-tag').chosen({
			placeholder_text_multiple:'Ubicacion de Publicidad',
			search_contains:true,

		});

		document.getElementById("principal").onchange = function() {
			if ($("#principal").val()<"33" ){
           		$("#cuilText").show();
      		} else {
      			$("#cuilText").hide();
      		}		
		}
		

		
	</script>

@endsection
