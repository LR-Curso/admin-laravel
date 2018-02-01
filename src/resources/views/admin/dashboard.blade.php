@extends('lrcurso_admin::admin.app')

@section('contentheader_title')
    Dashboard
@endsection

@section('main-content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row cards">
            @foreach(config('lr-admin.controllers') as $controller)
                @if($controller::showInSidebar())
                    <div class="col-lg-3 col xs-6">
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>&nbsp;</h3>

                                <p>{{ $controller::getTitle() }}</p>
                            </div>
                            <div class="icon">
                                <i class='{{ $controller::getIconClass() }}'></i>
                            </div>
                            <a href="{{ action("\\".$controller.'@index', [], false) }}" class="small-box-footer" title="{{ $controller::getDescription() }}">
                                Acessar <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>
@endsection
