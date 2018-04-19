@extends('admin.template.main')


@section('title', 'Nuevo Publicidad')

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
			<h3>Nuevo Publicidad</h3>
		</div>

		{!! Form::open(['route'=>'ads.store', 'method'=>'POST','files'=>'true']) !!}

		<div class="row">
  			<div class="col-md-6">
				<div class="form-group">
				{!! Form::label('cliente','Cliente*') !!}
				{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Cliente','required']) !!}  
				</div>
		

				<div class="form-group">
				{!! Form::label('title','Descripcion') !!}
				{!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Descripción','required']) !!}  
				</div>

				

						

						
			</div>

			<div class="col-md-6">
				<div class="form-group">
				{!! Form::label('precioConvenido','Precio convenido') !!}>
				{!! Form::number('precio',null,['class'=>'form-control','step' => 'any','placeholder'=>'$0.00','required']) !!}  
				</div>

				<div class="form-group">
				{!! Form::label('periodoPublicidad','Periodo de Publicidad') !!}
				{!! Form::number('periodo',null,['class'=>'form-control','placeholder'=>'meses','required']) !!}  
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							{!! Form::label('Ubicacion','Ubicacion*') !!} <br>
							{!! Form::select('principal', array('0' => 'Pagina Princial'), null,['class'=>'form-control select-tag','multiple','id'=>'principal']) !!} 
							{!! Form::select('especificas', array('0' => 'Noticias Especificas'), null,['class'=>'form-control select-tag','multiple','id'=>'especificas']) !!}
							{!! Form::select('notificacion', array('0' => 'Notificaciones'), null,['class'=>'form-control select-tag','multiple','id'=>'notificacion']) !!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						{!! Form::label('category','Categoria') !!}
						{!! Form::select('category',array('0' => 'Paquete 1', '1' => 'Paquete 2','2' => 'Paquete 3'),null,['class'=>'form-control select-category','required']) !!}
						</div>
					</div>
				</div>

				
				
			</div>
		</div>	

	<div class="ubicacion" id="paginaPrincipal" style="display:none;">				<div class="form-group">
				{!! Form::label('imagePrincipal','Imagen para Pagina Principal') !!}
				{!! Form::file('imagePrincipal',['id'=>'upload','name'=>'imagePrincipal']) !!}
				</div>		
	</div>

	<div class="ubicacion" id="noticiasEspecificas" style="display:none;">	
		<div class="form-group">
				{!! Form::label('imageNoticia','Imagen para Noticia Especifica') !!}
				{!! Form::file('imageNoticia',['id'=>'upload','name'=>'imageNoticia']) !!}
				</div>
	</div>

	<div class="ubicacion" id="notificaciones" style="display:none;">	<div class="form-group">
				{!! Form::label('imageNotificacion','Imagen para Notificación') !!}
				{!! Form::file('imageNotificacion',['id'=>'upload','name'=>'imageNotificacion']) !!}
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

		$('.select-category').chosen({
			placeholder_text_multiple:'Paquete Publicitario',
			search_contains:true,

		});
		document.getElementById("principal").onchange = function() {
			if ($("#principal").val()=="0" ){
           		$("#paginaPrincipal").show();
      		} else{
           		$("#paginaPrincipal").hide();
      		} 						
		};

		document.getElementById("especificas").onchange = function() {
			if ($("#especificas").val()=="0" ){
           		$("#noticiasEspecificas").show();
      		} else{
           		$("#noticiasEspecificas").hide();
      		} 						
		};

		document.getElementById("notificacion").onchange = function() {
			if ($("#notificacion").val()=="0" ){
           		$("#notificaciones").show();
      		} else{
           		$("#notificaciones").hide();
      		} 						
		};
		

		
	</script>

@endsection
