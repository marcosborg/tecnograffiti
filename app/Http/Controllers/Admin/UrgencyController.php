<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUrgencyRequest;
use App\Http\Requests\StoreUrgencyRequest;
use App\Http\Requests\UpdateUrgencyRequest;
use App\Models\Urgency;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class UrgencyController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('urgency_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Urgency::query()->select(sprintf('%s.*', (new Urgency())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'urgency_show';
                $editGate = 'urgency_edit';
                $deleteGate = 'urgency_delete';
                $crudRoutePart = 'urgencies';

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

        return view('admin.urgencies.index');
    }

    public function create()
    {
        abort_if(Gate::denies('urgency_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.urgencies.create');
    }

    public function store(StoreUrgencyRequest $request)
    {
        $urgency = Urgency::create($request->all());

        return redirect()->route('admin.urgencies.index');
    }

    public function edit(Urgency $urgency)
    {
        abort_if(Gate::denies('urgency_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.urgencies.edit', compact('urgency'));
    }

    public function update(UpdateUrgencyRequest $request, Urgency $urgency)
    {
        $urgency->update($request->all());

        return redirect()->route('admin.urgencies.index');
    }

    public function show(Urgency $urgency)
    {
        abort_if(Gate::denies('urgency_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.urgencies.show', compact('urgency'));
    }

    public function destroy(Urgency $urgency)
    {
        abort_if(Gate::denies('urgency_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $urgency->delete();

        return back();
    }

    public function massDestroy(MassDestroyUrgencyRequest $request)
    {
        Urgency::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
