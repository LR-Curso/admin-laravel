<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.6/img/user2-160x160.jpg" class="img-circle" alt="{{ trans('lrcurso_admin::sidebar.user_image') }}" />
            </div>
            <div class="pull-left info">
                @if(Auth::check())
                <p>{{ Auth::user()->name }}</p>
                @else
                <p>@lang('lrcurso_admin::sidebar.anonymous')</p>
                @endif
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">@lang('lrcurso_admin::admin.menu')</li>
            @foreach(config('lr-admin.controllers') as $controller)
                @if($controller::showInSidebar())
                <li class="active">
                    <a href="{{ action("\\".$controller.'@index'), [], false }}" title="{{ $controller::getDescription() }}">
                        <i class='{{ $controller::getIconClass() }}'></i>
                        <span>{{ $controller::getTitle() }}</span>
                    </a>
                </li>
                @endif
            @endforeach
        </ul>
    </section>
</aside>
