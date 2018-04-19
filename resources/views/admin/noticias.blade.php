@extends('admin.template.main')


@section('title', 'Inicio')

@section('content')
<nav class="navbar">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li ><a  id="eliminar" >Eliminar</a></li>
        <li><a href="{{ route('categories.index')}}">Categorias</a></li>
        <li><a href="{{ route('articles.index')}}">Articulos</a></li>
        <li><a href="{{ route('tags.index')}}">Columnas</a></li>
        <li><a href="{{ route('ads.index')}}">Publicidad</a></li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="pins">
      

    @foreach($articles as $article)
    @if($article->state == "0")
    <div style="background-color: #ffa6a4 !important" class="pin">
    	<div>
    		<div>
    			<a href="{{ route('articles.show', $article->id) }}"><h1>{{$article->title}}</h1></a>
    			<h3>{{$article->bajada}}</h3>
    			<p>{{$article->volanta}}</p>
    			<div class="row">
    				<div class="col-md-8">{{$article->user->name}}</div>
    				<div class="col-md-4"></div>
    			</div>
                <div class="checkbox">
                    <label><input type="checkbox" value="{{$article->id}}"></label>
                </div> 			
    		</div>
    	</div>
    </div>
    @else

    <div style="background-color: #81ff81 !important" class="pin">
    	<div>
    		<div>
    			<a href="{{ route('articles.show', $article->id) }}"><h1>{{$article->title}}</h1></a>
    			<h3>{{$article->bajada}}</h3>
    			<p>{{$article->volanta}}</p>
    			<div class="row">
    				<div class="col-md-8">{{$article->user->name}}</div>
    				<div class="col-md-4"></div>
    			</div>
                <div class="checkbox">
                    <label><input type="checkbox" value="{{$article->id}}"></label>
                </div>
    			
    		</div>
    	</div>
    </div>

    @endif

    
    @endforeach
{!! $articles->render() !!}   

  </div>
</div>

@endsection

@section('js')
    <script>
        var arr = $.map($('input:checkbox:checked'), function(e,i) {
            return +e.value;
        });


        $("#eliminar").click(function(){
            $.ajax({
                
                
                processData: false,
                contentType: false,
                dataType: 'json',
                 headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: '/admin/eliminar/varios/' + arr,
                type: 'POST',
                data: {},
                contentType: false,
                processData: false,
                success: function (data) {


                },
                error: function (data) {
                    console.log();
                }
            });
        });

        

        console.log(arr);
    </script>

@endsection

