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
							<p class="text-muted">Tareas de adminitracion de Noticias</p>
							<div class="panel-actions"></div>
						</div>
						
					</div>
				</div>


				<div class="row row-padded homepage-grid row-bordered p-t text-center">
    <a href=""><div class="col-sm-4">
      <img class="homepage-grid-icon" src="//cdn.shopify.com/s/files/1/0691/5403/t/141/assets/components-icon.svg?16007593649882510692">
      <h5><strong>Usuarios</strong></h5>
      <p class="text-muted">Lista de Usuarios</p>
    </div></a>
	<a href="">
		<div class="col-sm-4">
      <img class="homepage-grid-icon" src="//cdn.shopify.com/s/files/1/0691/5403/t/141/assets/sliders-icon.svg?16007593649882510692">
      <h5><strong>Configuraciones</strong></h5>
      <p class="text-muted">Envio de noticias</p>
    </div>
		
	</a>
    
	<a href="{{route('articles.list')}}">
		<div class="col-sm-4">
      <img class="homepage-grid-icon" src="//cdn.shopify.com/s/files/1/0691/5403/t/141/assets/wrenches-icon.svg?16007593649882510692">
      <h5><strong>Lista de Noticias</strong></h5>
      <p class="text-muted">Noticias en produccion y en deployds</p>
    </div>
		
	</a>
    
  </div>

  <div class="row row-padded homepage-grid row-bordered p-t text-center">
    
	<a href="https://console.firebase.google.com/project/suard-1e428/notification?hl=es-419">
		<div class="col-sm-4">
      <img class="homepage-grid-icon" src="//cdn.shopify.com/s/files/1/0691/5403/t/141/assets/wrenches-icon.svg?16007593649882510692">
      <h5><strong>Envio de Notificaciones</strong></h5>
    </div>
		
	</a>
    
  </div>




			</div>
		</div>
</div>

<div class="footer navbar-fixed-bottom">
	<div class="text-center" style="padding-bottom: 20px;">
		<a href="https://www.sou-ar.com">
			<img src="/images/souar.png" alt="" width="80px">			
		</a>                            
	</div>	
</div>


@endsection