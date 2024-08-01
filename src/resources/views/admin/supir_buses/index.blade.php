@extends('layouts.admin')

@section('content')
@can('menu_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.menus.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.menu.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.menu.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-supirBus">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            {{ trans('cruds.menu.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.menu.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.menu.fields.no_kendaraan') }}
                        </th>
                        <th>
                            {{ trans('cruds.menu.fields.alamat') }}
                        </th>
                        <th>
                            {{ trans('cruds.menu.fields.no_telp') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($supirBuses as $key => $supirBus)
                        <tr data-entry-id="{{ $supirBus->id }}">
                            <td>
                            </td>
                            <td>
                                {{ $supirBus->id ?? '' }}
                            </td>
                            <td>
                                {{ $supirBus->nama ?? '' }}
                            </td>
                            <td>
                                {{ $supirBus->no_kendaraan ?? '' }}
                            </td>
                            <td>
                                {{ $supirBus->alamat ?? '' }}
                            </td>
                            <td>
                                {{ $supirBus->no_telp ?? '' }}
                            </td>
                            <td>
                                @can('supir_bus_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.supir_buses.show', $supirBus->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('supir_bus_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.supir_buses.edit', $supirBus->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('supir_bus_delete')
                                    <form action="{{ route('admin.supir_buses.destroy', $supirBus->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@parent
<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('supir_bus_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.supir_buses.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
                var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('global.datatables.zero_selected') }}')

                    return
                }

                if (confirm('{{ trans('global.areYouSure') }}')) {
                    $.ajax({
                        headers: {'x-csrf-token': _token},
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }})
                        .done(function () { location.reload() })
                }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            orderCellsTop: true,
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        let table = $('.datatable-supirBus:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection
