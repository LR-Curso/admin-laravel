@extends('lrcurso_admin::admin.app')

@section('contentheader_title')
	{{ $title }}
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        {{--<h3 class="box-title">{{ $titulo or 'Falta definir um titulo' }}</h3>--}}
		    <div class="btn-group">
                    <a href="{{ $route_create ?? request()->getUri()."/create" }}" class="btn btn-primary">Novo</a>
            </div>
		<div class="pull-right">
			@if($search_form ?? false)
            {!! form($search_form) !!}
			@endif
        </div>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper">
        	<table class="table table-striped table-hover dataTable" id="dados" role="grid">
        		<thead>
        			<tr>
						@foreach(array_values($list_display) as $column)
        				    <th class="sorting">@lang('admin.list.'.$column)</th>
						@endforeach
                            <th class="text-right">Funções</th>
        			</tr>
        		</thead>
        		<tbody>
				@forelse($dataset as $data)
        			<tr>
					@foreach(array_values($list_display) as $column)
                        <td>{{ $data->$column }}</td>
					@endforeach
						<td class="text-right">


                            <form action="{{ request()->getUri() }}/{{ $data->id }}" method="post">
                                <input type="hidden" value="DELETE" name="_method">
                                {!! csrf_field() !!}
                                    <div class="btn-group">
                                        <a href="{{ request()->getUri() }}/{{ $data->id }}/edit" title="editar" class="btn btn-success">
                                            <i class="fa fa-pencil"></i>
                                        </a>

                                        <button class="btn btn-danger" title="deletar">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>

			                </form>
                        </td>
        			</tr>
				@empty
					<tr>
						<td colspan="{{ count($list_display)+1 }}">
							Não existe registros aqui.
						</td>
					</tr>
				@endforelse
        		</tbody>
        	</table>
        </div>
    </div>
    <div class="box-footer">
        {!!  $dataset->render() !!}
    </div>
</div>
@endsection
{{--@section('css')--}}
    {{--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" integrity="sha384-0+oHgv887Bf6R5zNNUEA1S3uGi50ThGLGlBPj2b45pM+4waOZ+tTOV5EgvHS9cv4" crossorigin="anonymous">--}}
{{--@endsection--}}

{{--@section('scripts')--}}
	{{--@parent--}}
	{{--<script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js" integrity="sha384-QyXw3+FbFWMGvHERjd2qCYZRk+b2Pjmtq15C/hioWsjhRQ7ogFIq/TyxV45EzU1H" crossorigin="anonymous"></script>--}}
	{{--<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js" integrity="sha384-fo515/EdB6QvtVyTtvtq4h0AeRxSvuTaUvc+Mg3HOeBUyozTDPBl53MpXK4CEW0+" crossorigin="anonymous"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('#dados').DataTable({--}}
                {{--"paging": false,--}}
                {{--"info":     false,--}}
                {{--"filter":     false,--}}
                {{--"language": {--}}
                    {{--"decimal": ",",--}}
                    {{--"thousands": "."--}}
                {{--}--}}
            {{--});--}}
        {{--} );--}}
    {{--</script>--}}
{{--@endsection--}}
