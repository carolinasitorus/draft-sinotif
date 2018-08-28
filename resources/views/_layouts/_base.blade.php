<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ app()->getLocale() }}" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getLocale() }}" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="" class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@if (!empty($metaTitle)) {{ $metaTitle }} | @endif</title>

    {{-- DOC: generating global site head, incl: css link, meta, etc. --}}
    @yield('site-head')
</head>
<body{!! isset($bodyClasses) ? ' class="'.$bodyClasses.'"' : '' !!}>
    {{-- DOC: generating global site content layout, incl: css link, meta, etc. --}}
    @yield('site-content')

    {{-- DOC: Share website baseUrl to client JS via window object. --}}
    <script id="baseUrl-script">
    (function () {
        window.baseUrl = '/';
        window.siteUrl = function (path) {
            return baseUrl + '/' + path.replace(/^\/|\/$/g, '');
        };
    })()
    </script>

    {{-- DOC: generating global site foot, incl: js script, etc. --}}
    @yield('site-foot')
</body>
</html>
