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
use App\Models\ReceptionMode;
use App\Models\SurfaceType;
use App\Models\Urgency;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class BudgetRequestController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('budget_request_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budgetRequests = BudgetRequest::with(['urgency', 'client', 'billing_client', 'reception_mode', 'info', 'surface_types', 'media'])->get();

        return view('admin.budgetRequests.index', compact('budgetRequests'));
    }

    public function pdf($budget_request_id)
    {

        phpinfo();

        $budgetRequest = BudgetRequest::find($budget_request_id)->load([
            'client.client_type',
            'billing_client',
            'urgency',
            'surface_types'
        ]);

        $pdf = Pdf::loadView('admin.budgetRequests.pdf', [
            'budgetRequest' => $budgetRequest,
        ])->setOption([
                'isRemoteEnabled' => true,
                'enable_html5_parser' => true,
            ]);

        return view('admin.budgetRequests.pdf', compact('budgetRequest'));

        //return $pdf->download($budgetRequest->created_at . '.pdf');

        return $pdf->stream();
    }

    public function create()
    {
        abort_if(Gate::denies('budget_request_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $urgencies = Urgency::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $billing_clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reception_modes = ReceptionMode::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $infos = Info::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $surface_types = SurfaceType::pluck('name', 'id');

        return view('admin.budgetRequests.create', compact('billing_clients', 'clients', 'infos', 'reception_modes', 'surface_types', 'urgencies'));
    }

    public function store(StoreBudgetRequestRequest $request)
    {
        $budgetRequest = BudgetRequest::create($request->all());
        $budgetRequest->surface_types()->sync($request->input('surface_types', []));
        foreach ($request->input('photos', []) as $file) {
            $budgetRequest->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
        }

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

        $billing_clients = Client::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reception_modes = ReceptionMode::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $infos = Info::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $surface_types = SurfaceType::pluck('name', 'id');

        $budgetRequest->load('urgency', 'client', 'billing_client', 'reception_mode', 'info', 'surface_types');

        return view('admin.budgetRequests.edit', compact('billing_clients', 'budgetRequest', 'clients', 'infos', 'reception_modes', 'surface_types', 'urgencies'));
    }

    public function update(UpdateBudgetRequestRequest $request, BudgetRequest $budgetRequest)
    {
        $budgetRequest->update($request->all());
        $budgetRequest->surface_types()->sync($request->input('surface_types', []));
        if (count($budgetRequest->photos) > 0) {
            foreach ($budgetRequest->photos as $media) {
                if (! in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $budgetRequest->photos->pluck('file_name')->toArray();
        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $budgetRequest->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photos');
            }
        }

        return redirect()->route('admin.budget-requests.index');
    }

    public function show(BudgetRequest $budgetRequest)
    {
        abort_if(Gate::denies('budget_request_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $budgetRequest->load('urgency', 'client', 'billing_client', 'reception_mode', 'info', 'surface_types');

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

        $model         = new BudgetRequest();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
