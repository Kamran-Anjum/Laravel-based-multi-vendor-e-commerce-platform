<!DOCTYPE html>
<html lang="en">
	<head>
		
		<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/frontend_images/lilac2express-logo.png') }}">
		<title>Lilac2xpress</title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap.min.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/backend_css/select2.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/backend_css/uniform.css') }}"/>

		<link rel="stylesheet" href="{{ asset('css/backend_css/bootstrap-responsive.min.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/backend_css/fullcalendar.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-style.css') }}"/>
		<link rel="stylesheet" href="{{ asset('css/backend_css/matrix-media.css') }}"/>
		<link href="{{ asset('fonts/backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
		<link rel="stylesheet" href="{{ asset('css/backend_css/jquery.gritter.css') }}" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
		<link href="{{ asset('css/backend_css/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->
		<!-- Scripts -->
	    <script src="{{ asset('js/app.js') }}" defer></script>

	    <meta name="_token" content="{{csrf_token()}}" />

	</head>
	<body>

		@include('layouts.adminLayout.admin_header')
		@include('layouts.adminLayout.admin_sidebar')

		@yield('content')

		@include('layouts.adminLayout.admin_footer')

		<script src="{{ asset('js/backend_js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/backend_js/jquery.ui.custom.js') }}"></script>
		<script src="{{ asset('js/backend_js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/backend_js/jquery.uniform.js') }}"></script>
		<script src="{{ asset('js/backend_js/select2.min.js') }}"></script>
		<script src="{{ asset('js/backend_js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('css/backend_css/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
		<script src="{{ asset('css/backend_css/sweetalert2/sweet-alert.init.js') }}"></script>
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script> -->
		<script src="{{ asset('js/backend_js/jquery.validate.js') }}"></script> 
		<script src="{{ asset('js/backend_js/matrix.js') }}"></script> 
		<script src="{{ asset('js/backend_js/matrix.form_validation.js') }}"></script>
		<script src="{{ asset('js/backend_js/matrix.tables.js') }}"></script>
		<script src="{{ asset('js/backend_js/matrix.popover.js') }}"></script>
		 
	</body>
</html>
