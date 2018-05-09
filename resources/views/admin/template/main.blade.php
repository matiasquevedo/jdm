<html>
	<head>
		<meta>
		<title>@yield('title') | Santuario</title>

		<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">	
		<link rel="stylesheet" href="{{ asset('plugins/chosen/chosen.css')}}">
		<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/dist/ui/trumbowyg.css')}}">
		<link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css')}}">
		<meta name="csrf-token" content="{{ csrf_token() }}">
	</head>
	<body>
		
		@include('admin.template.partials.nav')
		@include('flash::message')
		<section>
			@yield('content')
		</section>
		<script src="{{asset('plugins/jquery/jquery.js')}}"></script>
		<script src="{{asset('plugins/bootstrap/js/bootstrap.js')}}"></script>
		<script src="{{asset('plugins/chosen/chosen.jquery.js')}}"></script>
		<script src="{{asset('plugins/trumbowyg/dist/trumbowyg.js')}}"></script>
		<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
		<script src="{{asset('plugins/dropzone/dropzone.js')}}"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <link rel="stylesheet" href="gallery-grid.css">
		@yield('js')
	</body>
</html>