@extends('admin.template.main')


@section('title', 'Nuevo Contrato')

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
			<h3>Nuevo Contrato</h3>
			<h3>Cliente:  {{$ad->name}}</h3>
			<h3>Datos de la Empresa</h3>
		</div>

		{!! Form::open(['route'=>'ads.storePdf','method'=>'POST','files'=>'true']) !!}

		<div class="row">
  			<div class="col-md-6">
				
				<div style="display:none;">
				{!! Form::text('id',$ad->id,['class'=>'form-control','placeholder'=>'Cliente','required']) !!}
				</div>

				<div>
				{!! Form::label('Razón Social/Nombre','Razón Social/Nombre*') !!}
				{!! Form::text('razonsocial',$ad->name,['class'=>'form-control','placeholder'=>'Razón Social/Nombre','required']) !!} 
				</div>


				<div>
				{!! Form::label('Responsable','Responsable*') !!}
				{!! Form::text('responsable',null,['class'=>'form-control','placeholder'=>'Responsable','required']) !!} 
				</div>

				<div>
				{!! Form::label('DNI','DNI*') !!}
				{!! Form::text('dni',null,['class'=>'form-control','placeholder'=>'DNI','required']) !!} 
				</div>

				<div>
				
				{!! Form::label('Direccion','Dirección*') !!}
				{!! Form::text('direccion',null,['class'=>'form-control','placeholder'=>'Dirección','required']) !!} 
				</div>
						
				<div>
				{!! Form::label('Código Postal','Código Postal*') !!}
				{!! Form::text('cp','5600',['class'=>'form-control','placeholder'=>'Código Postal','required']) !!} 
				</div>

				<div>
				{!! Form::label('Telefono','Telefono*') !!}
				{!! Form::text('telefono',null,['class'=>'form-control','placeholder'=>'Telefono','required']) !!} 
				</div>	
			</div>				
			
			<div class="col-md-6">				
				<div>
				{!! Form::label('CUIL/CUIT/DNI','CUIL/CUIT/DNI*') !!}
				{!! Form::select('principal', array('35' => 'Seleccione Tipo','0' => 'CUIL','1' => 'CUIT','2' => 'DNI'), null,['class'=>'form-control select-tag','unique','id'=>'principal']) !!}
				</div>
				<div id="cuilText" style="display: none">
				{!! Form::text('cuilText',null,['class'=>'form-control','placeholder'=>'CUIL/CUIT/DNI','required']) !!} 
				</div>

				<div>
				{!! Form::label('Sector/Rubro','Sector/Rubro*') !!}
				{!! Form::text('rubro',null,['class'=>'form-control','placeholder'=>'Sector/Rubro','required']) !!} 
				</div>

				<div>
				{!! Form::label('Cargo','Cargo*') !!}
				{!! Form::text('cargo',null,['class'=>'form-control','placeholder'=>'Cargo','required']) !!} 
				</div>	

				<div>
				{!! Form::label('Localidad','Localidad*') !!}
				{!! Form::text('localidad',null,['class'=>'form-control','placeholder'=>'Localidad','required']) !!} 
				</div>

				<div>
				{!! Form::label('Localidad','Email*') !!}
				{!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Email','required']) !!} 
				</div>			
			</div>

				

				
				
		</div>
		<div>
			<hr>
			<div>
				{!! Form::label('Paquete') !!}
				{!! Form::select('paquetes[]',$productos, null,['class'=>'form-control select-tag','multiple']) !!}
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
