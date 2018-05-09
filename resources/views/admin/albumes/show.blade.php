@extends('admin.template.main')


@section('title','Album: '.$album->titulo)

@section('content')

	<div class="container-fluid">
  		<h3>{{$album->titulo}}
  		</h3>
      <form action="/admin/fotos" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <br /><br />
          Agregar Fotos al Album:
          <br />
          <input type="file" name="images[]" multiple />
          <br /><br />
          <input type="hidden" value="{{$album->id}}" name="album_id" />
          <input type="submit" value="Subir" />
      </form>

      <div>
              {!!$album->descripcion!!}
      </div>


  		<div class="panel panel-default">
  			<div class="panel-body" id="content">
          <h3>Portada</h3>
  					<div>
  						<img src="/fotos/albumes/{{$album->portada}}" alt="" width="150">
  					</div> 			
  			</div>
		</div>
    </div>

    

	</div>
  <h3>Fotos:</h3>
  <div class="tz-gallery">
      <div class="row">
        @foreach($fotos as $foto)
          <div class="col-sm-6 col-md-4">
              <a class="lightbox" href="/fotos/albumes/fotos/{{$foto->foto}}">
                  <img src="/fotos/albumes/fotos/{{$foto->foto}}" alt="Park">
              </a>
          </div>
        @endforeach
      </div>

  </div>
@endsection

@section('js')

<script>
    baguetteBox.run('.tz-gallery');
</script>
@endsection
