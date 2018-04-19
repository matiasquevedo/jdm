@extends('admin.template.main')


@section('title', 'Lista de Categorias')

@section('content')



<div class="row">
  <div class="col-md-1">
  	
  	<a href="{{ route('categories.create')}}" class="btn btn-info">Nuevo</a>

  </div>
  <div class="col-md-10">

  		<table class="table table-striped">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($categories as $category)
		<tr>
			<td><a href="{{ route('categories.show', $category->id) }}">{{$category->name}}</a></td>
			<td><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>


  	@endforeach
  
  </tbody>
</table>
{!! $categories->render() !!}  	

  </div>
  <div class="col-md-1">
  	
  	

  </div>
</div>



@endsection