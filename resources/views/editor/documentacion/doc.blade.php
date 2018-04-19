@extends('editor.template.main')


@section('title', 'Documentación')

@section('content')
<div class="container documentacion">
	<h3 class="text-center">Documentación Brick Diario</h3>
	<h4>Uso de la Redacción Online

	</h4>
	<div>
		<p>La Redacción Online es una plataforma de desarrollo de artículos periodísticos que permite gestionar la creación de dichos artículos, edición, publicación y seguimiento, conectado al escritor con la aplicación móvil.</p>
	</div>
	<div>
		<div class="btn-group" role="group" aria-label="...">
  			<a href="#usuarios" class="btn btn-danger">Usuarios</a>
  			<a href="#articulos" class="btn btn-info">Artículos</a>
  			<a href="#elementos" class="btn btn-warning">Elementos de un Artículos</a>
  			<a href="#nuevo" class="btn btn-success">Creando un Nuevo Artículo</a>
  			<a href="#editando" class="btn btn-danger">Editando un Artículo</a>
  			<a href="#estados" class="btn btn-info">Estados de un Artículo</a>

  			
		</div>
	</div>

	<div id="usuarios" class="seccion">
		<h4>Tipos de Usuarios</h4>
		<div>
		<p>Cada usuario de la plataforma tiene tareas específicas asignadas según su rol. Estos roles son:</p>
		<ul>
			<li>Editor: Puede crear nuevos artículos. Solo se le permite editar y eliminar sus artículos.</li>
			<li>Eventista: Puede crear nuevos eventos. Solo se le permite editar y eliminar sus eventos.</li>
			<li>Revisor: Puede crear nuevos artículos. Además se le permite revisar y editar los artículos de otros usuarios Editores. Puede eliminar solo sus artículos.</li>
			<li>Administrador: Puede ver todos los artículos y es el encargado de publicarlos.</li>
		</ul>
		</div>
	</div>
	<div id="articulos" class="seccion">
		<h4>Artículo</h4>
		<div>
		<p>Cambiando el paradigma de diario convencional (impreso en papel), Brick generaliza el concepto de articulo, abarcando todos los generos periodísticos. Un articulo de Brick puede ser una noticia,un reportaje, una crónica, articulo de opinión, editorial, etc. Los artículos son los elementos principales de Brick. 
Gracias a este cambio de paradigma, un articulo no es solo el relato escrito de un hecho de actualidad. En Brick los artículos pueden incluir audio, imágenes, videos, links, publicaciones de redes sociales, botones, mapas interactivos, etc, permitiendo el desarrollo de contenido atractivo y de calidad.</p>
		</div>
	</div>

	<div id="elementos" class="seccion">
		<h4>Elementos de un Articulo</h4>
		<div>
		<p>Los artículos de Brick cuentan de siete elementos obligatorios que deben cumplir algunas condiciones:
		</p>
		<p><b>Título:</b> Es un campo obligatorio y debe ser atractivo e interesante, de al menos 8 caracteres.</p>
		<p><b>Bajada:</b> Se encuentra debajo del título y debe resumir los aspectos mas importantes del articulo. Es obligatorio y de al menos 30 caracteres.</p>
		<p><b>Volanta:</b>Complementa al título, anticipando información. Es obligatorio y de al menos 8 caracteres.</p>
		<p><b>Contenido:</b> Este campo expone la información completa, desarrollando de mayor a menor importancia. Permite utilizar distintos formatos (alineaciones, viñetas, listas, negritas, etc) y recursos multimedia (imagen, audio, video). Es obligatorio y de al menos 280 caracteres.</p>
		<p><b>Categoría:</b> Las categorías discriminan los elementos por su contenido. Cada articulo perteneces a solo una categoría.  </p>
		<p><b>Fuente:</b>Es cualquier elemento externo al editor, que provee datos e información para el desarrollo del articulo. También adopta un nuevo paradigma, pudiendo ser fuentes periodísticas otros periódicos digitales, blogs, videos, infografías. Un articulo puede incluir un número ilimitado de fuentes, las cuales todas deben ser citadas.</p>
		<p><b>Imagen de Portada:</b> Es la imagen relacionada al articulo, extremadamente importante en la aplicación móvil. Es obligatorio incluir dicha imagen y debe respetar la propiedad intelectual.</p>
		</div>
	</div>

	<div id="nuevo" class="seccion">
		<h4>Creando un Nuevo Articulo</h4>
		<div class="embed-responsive embed-responsive-16by9" >
				<iframe class="embed-responsive-item" src="/doc/nuevo_articulo.mp4" ></iframe>
		</div>
		
	</div>

	<div id="editando" class="seccion">
		<h4>Editando un Articulo</h4>
		<div class="embed-responsive embed-responsive-16by9" >
				<iframe class="embed-responsive-item" src="/doc/editar_articulo.mp4" ></iframe>
		</div>
		
	</div>

	<div id="estados" class="seccion">
		<h4>Estados de un Articulo</h4>
		<p>Los Artículos pueden tener dos estados: Publicado y Sin Publicar.
		</p><p>Los artículos en estado "Publicado" son aquellos que han sido revisados por un usuario administrador o revisor y están disponibles en la Aplicación Móvil. No pueden ser Editados ni Eliminados por el usuario editor.
		</p>
		<div class="imgDoc">
			<img src="/doc/p.png" alt="">
		</div>

		<p>Los artículos en estado "Sin Publicar" no pueden leerse en la Aplicación Móvil, ya que no han sido revisados o son muy antiguos.Pueden ser editados o eliminados por el usuario editor.</p>
		<div class="imgDoc">
			<img src="/doc/sinP.png" alt="">
		</div>
	</div>

	





</div>

@endsection