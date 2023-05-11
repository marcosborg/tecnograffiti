<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBudgetRequestRequest;
use App\Http\Requests\StoreBudgetRequestRequest;
use App\Http\Requests\UpdateBudgetRequestRequest;
use App\Models\BudgetRequest;
use App\Models\Client;
use App\Models\Info;
use App\Models\SurfaceType;
use App\Models\Urgency;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class BudgetRequestController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('budget_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BudgetRequest::with(['urgency', 'client', 'info', 'surface_types'])->select(sprintf('%s.*', (new BudgetRequest())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'budget_request_show';
                $editGate = 'budget_request_edit';
                $deleteGate = 'budget_request_delete';
                $crudRoutePart = 'budget-requests';

                return view(
                    'partials.datatablesActions',
                    compact(
                        'viewGate',
                        'editGate',
                        'deleteGate',
                        'crudRoutePart',
                        'row'
                    )
                );
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('reference', function ($row) {
                return $row->reference ? $row->reference : '';
            });
            $table->addColumn('urgency_name', function ($row) {
                return $row->urgency ? $row->urgency->name : '';
            });

            $table->addColumn('client_name', function ($row) {
                return $row->client ? $row->client->name : '';
            });

            $table->editColumn('client.phone_1', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->phone_1) : '';
            });
            $table->editColumn('client.vat', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->vat) : '';
            });
            $table->editColumn('client.contact', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->contact) : '';
            });
            $table->editColumn('client.celphone', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->celphone) : '';
            });
            $table->editColumn('client.email', function ($row) {
                return $row->client ? (is_string($row->client) ? $row->client : $row->client->email) : '';
            });
            $table->editColumn('request', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->request ? 'checked' : null) . '>';
            });

            $table->editColumn('request_mode', function ($row) {
                return $row->request_mode ? $row->request_mode : '';
            });
            $table->editColumn('sent', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->sent ? 'checked' : null) . '>';
            });

            $table->editColumn('sent_mode', function ($row) {
                return $row->sent_mode ? $row->sent_mode : '';
            });
            $table->editColumn('deadline', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->deadline ? 'checked' : null) . '>';
            });

            $table->editColumn('deadline_mode', function ($row) {
                return $row->deadline_mode ? $row->deadline_mode : '';
            });
            $table->editColumn('adjudicated', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->adjudicated ? 'checked' : null) . '>';
            });

            $table->editColumn('adjudicated_mode', function ($row) {
                return $row->adjudicated_mode ? $row->adjudicated_mode : '';
            });
            $table->editColumn('concluded', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->concluded ? 'checked' : null) . '>';
            });

            $table->editColumn('concluded_mode', function ($row) {
                return $row->concluded_mode ? $row->concluded_mode : '';
            });
            $table->editColumn('invoice', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->invoice ? 'checked' : null) . '>';
            });

            $table->editColumn('invoice_mode', function ($row) {
                return $row->invoice_mode ? $row->invoice_mode : '';
            });
            $table->editColumn('survey', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->survey ? 'checked' : null) . '>';
            });

            $table->editColumn('survey_mode', function ($row) {
                return $row->survey_mode ? $row->survey_mode : '';
            });
            $table->editColumn('work_data_1', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_1 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_1_1', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_1_1 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_1_2', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_1_2 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_2', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_2 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_3', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_3 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_4', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_4 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_5', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_5 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_6', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_6 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_7', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_7 ? 'checked' : null) . '>';
            });
            $table->editColumn('work_data_8', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->work_data_8 ? 'checked' : null) . '>';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('location_info', function ($row) {
                return $row->location_info ? $row->location_info : '';
            });
            $table->addColumn('info_name', function ($row) {
                return $row->info ? $row->info->name : '';
            });

            $table->editColumn('obs', function ($row) {
                return $row->obs ? $row->obs : '';
            });
            $table->editColumn('surface_type', function ($row) {
                $labels = [];
                foreach ($row->surface_types as $surface_type) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $surface_type->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('duration_hours', function ($row) {
                return $row->duration_hours ? $row->duration_hours : '';
            });
            $table->editColumn('duration_days', function ($row) {
                return $row->duration_days ? $row->duration_days : '';
            });
            $table->editColumn('duration_saturdays', function ($row) {
                return $row->duration_saturdays ? $row->duration_saturdays : '';
            });
            $table->editColumn('duration_nights', function ($row) {
                return $row->duration_nights ? $row->duration_nights : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'urgency', 'client', 'request', 'sent', 'deadline', 'adjudicated', 'concluded', 'invoice', 'survey', 'work_data_1', 'work_data_1_1', 'work_data_1_2', 'work_data_2', 'work_data_3', 'work_data_4', 'work_data_5', 'work_data_6', 'work_data_7', 'work_data_8', 'info', 'surface_type']);

            return $table->make(true);
        }

        return view('admin.budgetRequests.index');
    }

    public function create()
    {
        abort_if(Gate::denies('budget_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $urgencies = Urgency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $infos = Info::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $surface_types = SurfaceType::pluck('name', 'id');

        return view('admin.budgetRequests.create', compact('clients', 'infos', 'surface_types', 'urgencies'));
    }

    public function store(StoreBudgetRequestRequest $request)
    {
        $budgetRequest = BudgetRequest::create($request->all());
        $budgetRequest->surface_types()->sync($request->input('surface_types', []));
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $budgetRequest->id]);
        }

        return redirect()->route('admin.budget-requests.index');
    }

    public function edit(BudgetRequest $budgetRequest)
    {
        abort_if(Gate::denies('budget_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $urgencies = Urgency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $infos = Info::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $surface_types = SurfaceType::pluck('name', 'id');

        $budgetRequest->load('urgency', 'client', 'info', 'surface_types');

        return view('admin.budgetRequests.edit', compact('budgetRequest', 'clients', 'infos', 'surface_types', 'urgencies'));
    }

    public function update(UpdateBudgetRequestRequest $request, BudgetRequest $budgetRequest)
    {
        $budgetRequest->update($request->all());
        $budgetRequest->surface_types()->sync($request->input('surface_types', []));

        return redirect()->route('admin.budget-requests.index');
    }

    public function show(BudgetRequest $budgetRequest)
    {
        abort_if(Gate::denies('budget_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budgetRequest->load('urgency', 'client', 'info', 'surface_types');

        return view('admin.budgetRequests.show', compact('budgetRequest'));
    }

    public function destroy(BudgetRequest $budgetRequest)
    {
        abort_if(Gate::denies('budget_request_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budgetRequest->delete();

        return back();
    }

    public function massDestroy(MassDestroyBudgetRequestRequest $request)
    {
        $budgetRequests = BudgetRequest::find(request('ids'));

        foreach ($budgetRequests as $budgetRequest) {
            $budgetRequest->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('budget_request_create') && Gate::denies('budget_request_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new BudgetRequest();
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function pdf(Request $request)
    {

        $budgetRequest = BudgetRequest::where('id', $request->id)
            ->with('client.client_type')
            ->with('info')
            ->first();
        //return $budgetRequest;
        $pdf = Pdf::loadView('admin.budgetRequests.pdf', $budgetRequest->toArray());
        return $pdf->stream('invoice.pdf');
        return view('admin.budgetRequests.pdf', $budgetRequest->toArray());
    }
}