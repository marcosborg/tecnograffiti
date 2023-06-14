<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDatasheetRequest;
use App\Http\Requests\StoreDatasheetRequest;
use App\Http\Requests\UpdateDatasheetRequest;
use App\Models\Datasheet;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DatasheetController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('datasheet_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datasheets = Datasheet::with(['media'])->get();

        return view('admin.datasheets.index', compact('datasheets'));
    }

    public function create()
    {
        abort_if(Gate::denies('datasheet_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datasheets.create');
    }

    public function store(StoreDatasheetRequest $request)
    {
        $datasheet = Datasheet::create($request->all());

        foreach ($request->input('files', []) as $file) {
            $datasheet->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $datasheet->id]);
        }

        return redirect()->route('admin.datasheets.index');
    }

    public function edit(Datasheet $datasheet)
    {
        abort_if(Gate::denies('datasheet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datasheets.edit', compact('datasheet'));
    }

    public function update(UpdateDatasheetRequest $request, Datasheet $datasheet)
    {
        $datasheet->update($request->all());

        if (count($datasheet->files) > 0) {
            foreach ($datasheet->files as $media) {
                if (! in_array($media->file_name, $request->input('files', []))) {
                    $media->delete();
                }
            }
        }
        $media = $datasheet->files->pluck('file_name')->toArray();
        foreach ($request->input('files', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $datasheet->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('files');
            }
        }

        return redirect()->route('admin.datasheets.index');
    }

    public function show(Datasheet $datasheet)
    {
        abort_if(Gate::denies('datasheet_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datasheets.show', compact('datasheet'));
    }

    public function destroy(Datasheet $datasheet)
    {
        abort_if(Gate::denies('datasheet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datasheet->delete();

        return back();
    }

    public function massDestroy(MassDestroyDatasheetRequest $request)
    {
        $datasheets = Datasheet::find(request('ids'));

        foreach ($datasheets as $datasheet) {
            $datasheet->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('datasheet_create') && Gate::denies('datasheet_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Datasheet();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
