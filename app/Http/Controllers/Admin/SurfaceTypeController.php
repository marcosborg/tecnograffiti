<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySurfaceTypeRequest;
use App\Http\Requests\StoreSurfaceTypeRequest;
use App\Http\Requests\UpdateSurfaceTypeRequest;
use App\Models\SurfaceType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SurfaceTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('surface_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = SurfaceType::query()->select(sprintf('%s.*', (new SurfaceType)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'surface_type_show';
                $editGate      = 'surface_type_edit';
                $deleteGate    = 'surface_type_delete';
                $crudRoutePart = 'surface-types';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.surfaceTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('surface_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.surfaceTypes.create');
    }

    public function store(StoreSurfaceTypeRequest $request)
    {
        $surfaceType = SurfaceType::create($request->all());

        return redirect()->route('admin.surface-types.index');
    }

    public function edit(SurfaceType $surfaceType)
    {
        abort_if(Gate::denies('surface_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.surfaceTypes.edit', compact('surfaceType'));
    }

    public function update(UpdateSurfaceTypeRequest $request, SurfaceType $surfaceType)
    {
        $surfaceType->update($request->all());

        return redirect()->route('admin.surface-types.index');
    }

    public function show(SurfaceType $surfaceType)
    {
        abort_if(Gate::denies('surface_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.surfaceTypes.show', compact('surfaceType'));
    }

    public function destroy(SurfaceType $surfaceType)
    {
        abort_if(Gate::denies('surface_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $surfaceType->delete();

        return back();
    }

    public function massDestroy(MassDestroySurfaceTypeRequest $request)
    {
        $surfaceTypes = SurfaceType::find(request('ids'));

        foreach ($surfaceTypes as $surfaceType) {
            $surfaceType->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
