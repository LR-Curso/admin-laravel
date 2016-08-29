@extends('lrcurso_admin::admin.app')

@section('contentheader_title')
	{{ $title }}
@endsection

@section('main-content')
<div class="box box-primary">
    <div class="box-header with-border">
        {{--<h3 class="box-title">{{ $titulo or 'Falta definir um titulo' }}</h3>--}}
		@can('criar', $model)
            <div class="btn-group">
                @if($dataset->first() and $dataset->first()->lang_id)
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Novo <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                @foreach(\App\Models\Lang::all() as $lang)
                    <li><a href="{{ $route_create }}?lang={{  $lang->code }}">{{ $lang->language }}</a></li>
                @endforeach
                </ul>
                @else
                    <a href="{{ $route_create }}" class="btn btn-primary">Novo</a>
                @endif
            </div>
        @endcan
        @can('importar', $model)
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
            Importar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <form action="/{{ request()->path() }}/import" method="post" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Importação de dados</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="csv">CSV</label>
                                <textarea class="form-control" name="csv" id="csv" placeholder="Cole seu csv"></textarea>
                            </div>
                            <p>
                                <b>Ou</b>
                            </p>
                            <div class="form-group">
                                <label for="csv_file">Arquivo de importação</label>
                                <input type="file" id="csv_file" name="csv_file">
                                <p class="help-block">Arquivo de importação no formato csv.</p>
                            </div>
                            <p>
                                <h4>Cabeçário:</h4>
                                @foreach($form_fields as $coluna)
                                    {{ $coluna['options']['label'] }};
                                @endforeach
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endcan

		<div class="pull-right">
			@if($search_form != null)
            {!! form($search_form) !!}
			@endif
        </div>
    </div>
    <div class="box-body">
        <div class="dataTables_wrapper">
        	<table class="table table-striped table-hover dataTable" id="dados" role="grid">
        		<thead>
        			<tr>
						@foreach(array_values($list_display) as $coluna)
        				    <th class="sorting">{{ $coluna }}</th>
						@endforeach
                            <th class="text-right">Funções</th>
        			</tr>
        		</thead>
        		<tbody>
				@forelse($dataset as $data)
        			<tr>
					@foreach(array_keys($list_display) as $coluna)
                        @if($coluna == 'lang_id')
                            {{--{{ dd($data->lang) }}--}}
                            <td>{{ $data->lang->code }}</td>
                        @else
                            <td>{{ $data->$coluna }}</td>
                        @endif
					@endforeach
						<td class="text-right">


                            <form action="{{ $route_delete }}/{{ $data->id }}" method="post">
                                {!! csrf_field() !!}
                                {{--<div class="btn-group">--}}
									@can('atualizar', $data)

                                    <div class="btn-group">
                                        @if($data->lang_id)
                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-pencil"></i> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            @foreach(\App\Models\Lang::all() as $lang)
                                                <li>
                                                    <a href="{{ $route_edit }}/{{ $data->id }}?lang={{  $lang->code }}" title="editar">
                                                        {{ $lang->language }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        @else
                                            <a href="{{ $route_edit }}/{{ $data->id }}" title="editar" class="btn btn-success">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        @endif
                                    </div>
									@endcan
									@can('deletar', $data)
									<button class="btn btn-danger" title="deletar">
                                        <i class="fa fa-trash"></i>
                                    </button>

									@endcan
								{{--</div>--}}
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
