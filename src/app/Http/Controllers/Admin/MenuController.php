<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySupirBusRequest;
use App\Http\Requests\StoreSupirBusRequest;
use App\Http\Requests\UpdateSupirBusRequest;
use App\Models\SupirBus;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('menu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supirBuses = SupirBus::all();

        return view('admin.supir_buses.index', compact('supirBuses'));
    }

    public function create()
    {
        abort_if(Gate::denies('menu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supir_buses.create');
    }

    public function store(StoreSupirBusRequest $request)
    {
        $supirBus = SupirBus::create($request->all());

        return redirect()->route('admin.menus.index')->with('success', 'Supir bus created successfully.');
    }

    public function edit(SupirBus $supirBus)
    {
        abort_if(Gate::denies('menu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supir_buses.edit', compact('supirBus'));
    }

    public function update(UpdateSupirBusRequest $request, SupirBus $supirBus)
    {
        $supirBus->update($request->all());

        return redirect()->route('admin.supir_buses.index')->with('success', 'Supir bus updated successfully.');
    }

    public function show(SupirBus $supirBus)
    {
        abort_if(Gate::denies('menu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.supir_buses.show', compact('supirBus'));
    }

    public function destroy(SupirBus $supirBus)
    {
        abort_if(Gate::denies('menu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $supirBus->delete();

        return back();
    }

    public function massDestroy(MassDestroySupirBusRequest $request)
    {
        SupirBus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
