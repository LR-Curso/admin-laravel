@extends('lrcurso_admin::admin.app')

@section('contentheader_title')
    {{ $title }}
@endsection

@section('main-content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">
                @if(request()->method() == 'post')
                    @lang('form.create.title')
                @else
                    @lang('form.edit.title')
                @endif
            </h3>
        </div>
        <div class="box-body">
            {!! form($form) !!}
        </div>
    </div>
@endsection

@section('css')
    @parent
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/css/select2.min.css" integrity="sha384-wCtV4+Y0Qc1RNg341xqADYvciqiG4lgd7Jf6Udp0EQ0PoEv83t+MLRtJyaO5vAEh" crossorigin="anonymous">
@endsection

@section('scripts')
@parent
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.1-rc.1/js/select2.min.js" integrity="sha384-qo4GC4ybLCuD4tJwpdLnDt87GE0sx+aMRrzF9dfzCOXUnX70wls8TP96AGy6IfTz" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('select').select2();
</script>
@endsection
