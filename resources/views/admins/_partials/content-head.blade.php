{{-- BEGIN PAGE HEADER --}}
<div class="page-bar">
    <ul class="page-breadcrumb">
        @section('page-breadcrumb')
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Home</a>
        </li>
        @show
    </ul>
    <div class="page-toolbar">
        @yield('page-header-toolbar')
    </div>
</div>

@include('admins._partials.flash')

<h3 class="page-title">
@section('page-title')
    'Untitle'
@show
</h3>
{{-- END PAGE HEADER --}}
