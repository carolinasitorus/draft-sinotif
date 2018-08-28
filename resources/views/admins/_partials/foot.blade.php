{{-- DOC: Begin global scripts. --}}
<script src="{{ asset('assets/admin/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/jquery.blockui.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/jquery.cokie.min.js') }}"></script>
<script src="{{ asset('assets/admin/vendor/uniform/jquery.uniform.min.js') }}"></script>

<script id="adminUrl-script">
    window.adminUrl = function (path) {
        return siteUrl('/backend/' + path.replace(/^\/|\/$/g, ''))
    };
</script>

{{-- DOC: Begin page specific scripts. --}}
@yield('page-scripts')

<script src="{{ asset('assets/admin/js/metronic.js') }}"></script>
<script src="{{ asset('assets/admin/js/layout.js') }}"></script>
