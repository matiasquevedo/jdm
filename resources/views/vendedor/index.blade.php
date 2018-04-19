@extends('vendedor.template.main')


@section('title', 'Inicio')

@section('content')

	<div class="container">
		<div class="row row-backbordered text-center">
			<div class="col-sm-12">
				<div class="panel panel-default panel-floating panel-floating-inline">
					<div class="panel-body">
						<div class="panel-content">
							<h3 class="m-b-0">
								<strong>Vendedor</strong>
							</h3>
							<p class="text-muted">Ventas de Publicidad</p>
							<div class="panel-actions"></div>
						</div>
						
					</div>
				</div>


				<div class="row row-padded homepage-grid row-bordered p-t text-center">
	<a href="">
		<div class="col-sm-4">
     <img class="homepage-grid-icon" src="//cdn.shopify.com/s/files/1/0691/5403/t/141/assets/components-icon.svg?16007593649882510692">
      <h5><strong>Contratos</strong></h5>
      <p class="text-muted">Mis Contratos</p>
    </div>
		
	</a>
	<a href="{{route('vendedor.ads.index')}}">
		<div class="col-sm-4">
     <img class="homepage-grid-icon" src="//cdn.shopify.com/s/files/1/0691/5403/t/141/assets/components-icon.svg?16007593649882510692">
      <h5><strong>Nuevo Contrato</strong></h5>
      <p class="text-muted">Mis Contratos</p>
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