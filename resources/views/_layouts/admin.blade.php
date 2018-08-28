@extends('_layouts._base', [
    'bodyClasses' => 'page-header-fixed page-sidebar-fixed page-container-bg-solid page-sidebar-closed-hide-logo'
])

{{-- DOC: Basic admin page layout. --}}
@section('site-content')
    {{-- DOC: Include admin header --}}
    @include('admins._partials.header')

    <main class="page-container">
        {{-- DOC: Include admin sidebar --}}
        @include('admins._partials.sidebar')

        {{-- DOC: Begin Page content --}}
        <div class="page-content-wrapper">
            <div class="page-content">
                @include('admins._partials.content-head')

                @yield('page-content')
            </div> <!-- /.page-content -->
        </div> <!-- /.page-content-wrapper -->
    </main> <!-- /.container -->

    <footer class="page-footer">
        @include('admins._partials.footer-copyright', ['classes' => 'page-footer-inner pull-right'])

        <div class="scroll-to-top"><i class="icon-arrow-up"></i></div> <!-- /.scroll-to-top -->
    </footer> <!-- /.page-footer -->
@endsection

{{-- DOC: Basic admin global head. --}}
@section('site-head')
    @include('admins._partials.head')
@endsection

{{-- DOC: Basic admin global foot. --}}
@section('site-foot')
    @include('admins._partials.foot')

    {{-- DOC: Begin page specific initialization script. --}}
    <script id="init-script">
    jQuery(document).ready(function() {
        @section('init-scripts')
        Metronic.init(); // init metronic core componets
        Layout.init(); // init layout
        @show
    });
    </script>
@endsection
