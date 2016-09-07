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
        				    <th class="sorting">@lang('admin.crud.'.$column)</th>
						@endforeach
                            <th class="text-right">Funções</th>
        			</tr>
        		</thead>
        		<tbody>
				@forelse($dataset as $data)
        			<tr>
					@foreach(array_values($list_display) as $column)
                        <?php $v = $data; ?>
                        @foreach(explode('.', $column) as $c)
                                <?php $v = $v->$c; ?>
                        @endforeach
                            <td>{{ $v }}</td>
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