@extends('admin.template.main')


@section('title')

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

		<div class="row">
			<div class="col-md-8">
				<h3> </h3>
				<a href="{{ route('albumes.index')}}" class="btn btn-info">Volver al Album</a>
			</div>
			<div class="col-md-4">			
				
			</div>
		</div>

				{!! Form::open(['route'=>'fotos.store', 'method'=>'POST','files'=>'true']) !!}

						<div class="form-group">
						{!! Form::label('image','Imagen de Portada*') !!}
						{!! Form::file('image',['id'=>'upload','name'=>'images','multiple']) !!}
						</div>	

				<div class="form-group">
					{!! Form::submit('Subir images',['class'=>'btn btn-primary']) !!}
				</div>

				{!! Form::close() !!}

		

	</div>

@endsection

@section('js')

<!-- 	<script>
		Dropzone.options.myDropzone = {
		            autoProcessQueue: false,
		            uploadMultiple: true,
		            maxFilezise: 20,
		            maxFiles: 25,
		            
		            init: function() {
		                var submitBtn = document.querySelector("#submit");
		                myDropzone = this;
		                
		                submitBtn.addEventListener("click", function(e){
		                    e.preventDefault();
		                    e.stopPropagation();
		                    myDropzone.processQueue();
		                });
		                this.on("addedfile", function(file) {
		                });
		                
		                this.on("complete", function(file) {
		                    myDropzone.removeFile(file);
		                });
		 
		                this.on("success", 
		                    myDropzone.processQueue.bind(myDropzone)
		                );
		            }
		        };

	</script> -->

@endsection