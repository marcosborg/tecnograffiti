<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientTypeRequest;
use App\Http\Requests\StoreClientTypeRequest;
use App\Http\Requests\UpdateClientTypeRequest;
use App\Models\ClientType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ClientTypeController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('client_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ClientType::query()->select(sprintf('%s.*', (new ClientType())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'client_type_show';
                $editGate = 'client_type_edit';
                $deleteGate = 'client_type_delete';
                $crudRoutePart = 'client-types';

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

        return view('admin.clientTypes.index');
    }

    public function create()
    {
        abort_if(Gate::denies('client_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientTypes.create');
    }

    public function store(StoreClientTypeRequest $request)
    {
        $clientType = ClientType::create($request->all());

        return redirect()->route('admin.client-types.index');
    }

    public function edit(ClientType $clientType)
    {
        abort_if(Gate::denies('client_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientTypes.edit', compact('clientType'));
    }

    public function update(UpdateClientTypeRequest $request, ClientType $clientType)
    {
        $clientType->update($request->all());

        return redirect()->route('admin.client-types.index');
    }

    public function show(ClientType $clientType)
    {
        abort_if(Gate::denies('client_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.clientTypes.show', compact('clientType'));
    }

    public function destroy(ClientType $clientType)
    {
        abort_if(Gate::denies('client_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientType->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientTypeRequest $request)
    {
        ClientType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
