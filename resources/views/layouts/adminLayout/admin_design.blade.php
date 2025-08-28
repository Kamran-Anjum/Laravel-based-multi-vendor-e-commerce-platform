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
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
		<link href="{{ asset('css/backend_css/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> -->
		<!-- Scripts -->
	    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

	    <meta name="_token" content="{{csrf_token()}}" />

	</head>
	<body>

		@include('layouts.adminLayout.admin_header')
		@include('layouts.adminLayout.admin_sidebar')

		@yield('content')
    	@yield('scripts')

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

		<!-- text editor -->
	    <script src="https://cdn.tiny.cloud/1/adaf3vu0z7m9expnrl1rhtwnrdj5ghw18tcbj97ehvld2nyl/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

	    <script>
	      
	      var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

	      tinymce.init({
	        selector: 'textarea#texteditor',
			plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
			imagetools_cors_hosts: ['picsum.photos'],
			menubar: 'file edit view insert format tools table help',
			toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
			toolbar_sticky: true,
			autosave_ask_before_unload: true,
			autosave_interval: '30s',
			autosave_prefix: '{path}{query}-{id}-',
			autosave_restore_when_empty: false,
			autosave_retention: '2m',
			image_advtab: true,
			link_list: [
			{ title: 'My page 1', value: 'https://www.tiny.cloud' },
			{ title: 'My page 2', value: 'http://www.moxiecode.com' }
			],
			image_list: [
			{ title: 'My page 1', value: 'https://www.tiny.cloud' },
			{ title: 'My page 2', value: 'http://www.moxiecode.com' }
			],
			image_class_list: [
			{ title: 'None', value: '' },
			{ title: 'Some class', value: 'class-name' }
			],
			importcss_append: true,
			file_picker_callback: function (callback, value, meta) {
			/* Provide file and text for the link dialog */
			if (meta.filetype === 'file') {
			  callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
			}

			/* Provide image and alt text for the image dialog */
			if (meta.filetype === 'image') {
			  callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
			}

			/* Provide alternative source and posted for the media dialog */
			if (meta.filetype === 'media') {
			  callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
			}
			},
			templates: [
			    { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
			{ title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
			{ title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
			],
			template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
			template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
			height: 600,
			image_caption: true,
			quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
			noneditable_noneditable_class: 'mceNonEditable',
			toolbar_mode: 'sliding',
			contextmenu: 'link image imagetools table',
			skin: useDarkMode ? 'oxide-dark' : 'oxide',
			content_css: useDarkMode ? 'dark' : 'default',
			content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
	       });

	    </script>

	    <script>
	      
	      var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;

	      tinymce.init({
	        selector: 'textarea#texteditornew',
			plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
			imagetools_cors_hosts: ['picsum.photos'],
			menubar: 'file edit view insert format tools table help',
			toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
			toolbar_sticky: true,
			autosave_ask_before_unload: true,
			autosave_interval: '30s',
			autosave_prefix: '{path}{query}-{id}-',
			autosave_restore_when_empty: false,
			autosave_retention: '2m',
			image_advtab: true,
			link_list: [
			{ title: 'My page 1', value: 'https://www.tiny.cloud' },
			{ title: 'My page 2', value: 'http://www.moxiecode.com' }
			],
			image_list: [
			{ title: 'My page 1', value: 'https://www.tiny.cloud' },
			{ title: 'My page 2', value: 'http://www.moxiecode.com' }
			],
			image_class_list: [
			{ title: 'None', value: '' },
			{ title: 'Some class', value: 'class-name' }
			],
			importcss_append: true,
			file_picker_callback: function (callback, value, meta) {
			/* Provide file and text for the link dialog */
			if (meta.filetype === 'file') {
			  callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
			}

			/* Provide image and alt text for the image dialog */
			if (meta.filetype === 'image') {
			  callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
			}

			/* Provide alternative source and posted for the media dialog */
			if (meta.filetype === 'media') {
			  callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
			}
			},
			templates: [
			    { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
			{ title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
			{ title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
			],
			template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
			template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
			height: 600,
			image_caption: true,
			quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
			noneditable_noneditable_class: 'mceNonEditable',
			toolbar_mode: 'sliding',
			contextmenu: 'link image imagetools table',
			skin: useDarkMode ? 'oxide-dark' : 'oxide',
			content_css: useDarkMode ? 'dark' : 'default',
			content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
	       });
	      
	    </script>
		 
	</body>
</html>
