{{-- BEGIN SIDEBAR --}}
<aside class="page-sidebar-wrapper">
    {{-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing --}}
    {{-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed --}}
    <nav class="page-sidebar navbar-collapse collapse">
        {{-- BEGIN SIDEBAR MENU --}}
        {{-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) --}}
        {{-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode --}}
        {{-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode --}}
        {{-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing --}}
        {{-- DOC: Set data-keep-expand="true" to keep the submenues expanded --}}
        {{-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed --}}
        <ul class="page-sidebar-menu  page-header-fixed" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="active">
                <a href="#">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            @yield('sidebar-menus')
        </ul>
        {{-- END SIDEBAR MENU --}}
    </nav>
</aside>
{{-- END SIDEBAR --}}
