<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/admin') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{{ config('lr-admin.title-min') }}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{ config('lr-admin.title') }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                            <p>
                                {{ Auth::user()->name }}
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="col-xs-6 text-center">
                                <a href="/admin/empresa/edit/{{ Auth::user()->id_empresa }}">Empresa</a>
                            </div>
                            {{--<div class="col-xs-4 text-center">--}}
                                {{--<a href="#">Sales</a>--}}
                            {{--</div>--}}
                            <div class="col-xs-6 text-center">
                                <a href="#">Relatórios</a>
                            </div>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="/admin/usuario/edit/{{ Auth::user()->id }}" class="btn btn-default btn-flat">Meu perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sair</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>
</header>