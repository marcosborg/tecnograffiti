<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReceptionModeRequest;
use App\Http\Requests\StoreReceptionModeRequest;
use App\Http\Requests\UpdateReceptionModeRequest;
use App\Models\ReceptionMode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReceptionModesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reception_mode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receptionModes = ReceptionMode::all();

        return view('admin.receptionModes.index', compact('receptionModes'));
    }

    public function create()
    {
        abort_if(Gate::denies('reception_mode_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.receptionModes.create');
    }

    public function store(StoreReceptionModeRequest $request)
    {
        $receptionMode = ReceptionMode::create($request->all());

        return redirect()->route('admin.reception-modes.index');
    }

    public function edit(ReceptionMode $receptionMode)
    {
        abort_if(Gate::denies('reception_mode_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.receptionModes.edit', compact('receptionMode'));
    }

    public function update(UpdateReceptionModeRequest $request, ReceptionMode $receptionMode)
    {
        $receptionMode->update($request->all());

        return redirect()->route('admin.reception-modes.index');
    }

    public function show(ReceptionMode $receptionMode)
    {
        abort_if(Gate::denies('reception_mode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.receptionModes.show', compact('receptionMode'));
    }

    public function destroy(ReceptionMode $receptionMode)
    {
        abort_if(Gate::denies('reception_mode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $receptionMode->delete();

        return back();
    }

    public function massDestroy(MassDestroyReceptionModeRequest $request)
    {
        $receptionModes = ReceptionMode::find(request('ids'));

        foreach ($receptionModes as $receptionMode) {
            $receptionMode->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
