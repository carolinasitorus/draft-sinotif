{{-- BEGIN HEADER --}}
<header class="page-header navbar navbar-fixed-top">
    {{-- BEGIN HEADER INNER --}}
    <div class="page-header-inner">
        {{-- BEGIN LOGO --}}
        <div class="page-logo">
            <a href="#">
                <img src="#" alt="logo" class="logo-default" style="height: 30px;">
            </a>
            {{-- DOC: Remove the above "hide" to enable the sidebar toggler button on header --}}
            <div class="menu-toggler sidebar-toggler"></div>
        </div> <!-- /.page-logo -->

        {{-- BEGIN RESPONSIVE MENU TOGGLER --}}
        <a href="#" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"></a> <!-- /.responsive-toggler -->

        {{-- BEGIN PAGE ACTIONS --}}
        <div class="page-actions">@yield('page-header-actions')</div> <!-- /.page-actions -->

        {{-- BEGIN PAGE TOP --}}
        <div class="page-top">
            <nav class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    {{-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte --}}
                    <li class="dropdown dropdown-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <span class="username username-hide-on-mobile"></span>
                            <i class="fa fa-angle-down"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="#">
                                <i class="icon-lock"></i> Change Password</a>
                            </li>
                            <li>
                                <a href="#">
                                <i class="icon-key"></i> Log Out</a>
                            </li>
                        </ul>
                    </li> <!-- /.dropdown-user -->
                </ul> <!-- /.navbar-nav -->
            </nav> <!-- /.top-menu -->
        </div> <!-- /.page-top -->
    </div> <!-- /.page-header-inner -->
</header> <!-- /.page-header -->
