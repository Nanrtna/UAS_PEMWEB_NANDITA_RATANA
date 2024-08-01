@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.menu.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('admin.supir_buses.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('cruds.menu.fields.id') }}
                    </th>
                    <td>
                        {{ $supirBus->id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.menu.fields.nama') }}
                    </th>
                    <td>
                        {{ $supirBus->nama }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.menu.fields.no_kendaraan') }}
                    </th>
                    <td>
                        {{ $supirBus->no_kendaraan }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.menu.fields.alamat') }}
                    </th>
                    <td>
                        {{ $supirBus->alamat }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('cruds.menu.fields.no_telp') }}
                    </th>
                    <td>
                        {{ $supirBus->no_telp }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <a class="btn btn-default" href="{{ route('admin.supir_buses.index') }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>

@endsection
