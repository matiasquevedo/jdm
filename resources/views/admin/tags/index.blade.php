@extends('admin.template.main')


@section('title', 'Lista de Tags')

@section('content')



<div class="row">
  <div class="col-md-1">
  	
  	<a href="{{ route('tags.create')}}" class="btn btn-info">Nuevo</a>

  </div>
  <div class="col-md-10">
  <div>
    <div>
        {!! Form::open(['route'=>'tags.index','method'=>'GET','class'=>'navbar-form pull-right']) !!}
          <div class="input-group">
              
              {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Buscar Tag','aria-describedby'=>'search']) !!}

              <span class="input-group-addon" id="search"><span class="glyphicon glyphicon-search"></span></span>
          </div>

        {!! Form::close() !!}

    </div>
  </div>
  		<table class="table table-striped">
  <thead>
    <tr>
      <th>#Id</th>
      <th>Nombre</th>
      <th>Acción</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($tags as $tag)
		<tr>
			<td>{{$tag->id}}</td>
			<td>{{$tag->name}}</td>
			<td><a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench"></span></a><a href="{{ route('tags.destroy', $tag->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></a></td>
		</tr>


  	@endforeach
  
  </tbody>
</table>
{!! $tags->render() !!}  	

  </div>
  <div class="col-md-1">
  	
  	

  </div>
</div>



@endsection