<link rel="apple-touch-icon" href="{{ asset('assets/admin/apple-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('assets/admin/favicon.png') }}">

{{-- DOC: Begin global stylesheets. --}}
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all">
<link rel="stylesheet" href="{{ asset('assets/admin/vendor/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/vendor/simple-line-icons/simple-line-icons.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/vendor/uniform/css/uniform.default.css') }}">

{{-- DOC: Begin page specific stylesheets. --}}
@yield('page-styles')

<link rel="stylesheet" href="{{ asset('assets/admin/css/components.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/plugins.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/css/themes/darkblue.css') }}">

{{-- DOC: These special scripts need to be placed in head. --}}
<!--[if lt IE 9]>
<script src="{{ asset('assets/admin/vendor/respond.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/excanvas.min.js') }}"></script>
<![endif]-->
