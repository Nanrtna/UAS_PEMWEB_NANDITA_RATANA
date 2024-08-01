@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.menu.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.supir_buses.update", [$supirBus->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama">{{ trans('cruds.menu.fields.nama') }}</label>
                <input class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" type="text" name="nama" id="nama" value="{{ old('nama', $supirBus->nama) }}">
                @if($errors->has('nama'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.nama_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_kendaraan">{{ trans('cruds.menu.fields.no_kendaraan') }}</label>
                <input class="form-control {{ $errors->has('no_kendaraan') ? 'is-invalid' : '' }}" type="number" name="no_kendaraan" id="no_kendaraan" value="{{ old('no_kendaraan', $supirBus->no_kendaraan) }}">
                @if($errors->has('no_kendaraan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_kendaraan') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.no_kendaraan_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.menu.fields.alamat') }}</label>
                <input class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" type="text" name="alamat" id="alamat" value="{{ old('alamat', $supirBus->alamat) }}">
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="no_telp">{{ trans('cruds.menu.fields.no_telp') }}</label>
                <input class="form-control {{ $errors->has('no_telp') ? 'is-invalid' : '' }}" type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $supirBus->no_telp) }}">
                @if($errors->has('no_telp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('no_telp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.menu.fields.no_telp_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
