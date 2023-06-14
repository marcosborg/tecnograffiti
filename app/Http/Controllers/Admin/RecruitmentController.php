<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRecruitmentRequest;
use App\Http\Requests\StoreRecruitmentRequest;
use App\Http\Requests\UpdateRecruitmentRequest;
use App\Models\Recruitment;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RecruitmentController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('recruitment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recruitments = Recruitment::with(['media'])->get();

        return view('admin.recruitments.index', compact('recruitments'));
    }

    public function create()
    {
        abort_if(Gate::denies('recruitment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.recruitments.create');
    }

    public function store(StoreRecruitmentRequest $request)
    {
        $recruitment = Recruitment::create($request->all());

        if ($request->input('cv', false)) {
            $recruitment->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $recruitment->id]);
        }

        return redirect()->route('admin.recruitments.index');
    }

    public function edit(Recruitment $recruitment)
    {
        abort_if(Gate::denies('recruitment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.recruitments.edit', compact('recruitment'));
    }

    public function update(UpdateRecruitmentRequest $request, Recruitment $recruitment)
    {
        $recruitment->update($request->all());

        if ($request->input('cv', false)) {
            if (! $recruitment->cv || $request->input('cv') !== $recruitment->cv->file_name) {
                if ($recruitment->cv) {
                    $recruitment->cv->delete();
                }
                $recruitment->addMedia(storage_path('tmp/uploads/' . basename($request->input('cv'))))->toMediaCollection('cv');
            }
        } elseif ($recruitment->cv) {
            $recruitment->cv->delete();
        }

        return redirect()->route('admin.recruitments.index');
    }

    public function show(Recruitment $recruitment)
    {
        abort_if(Gate::denies('recruitment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.recruitments.show', compact('recruitment'));
    }

    public function destroy(Recruitment $recruitment)
    {
        abort_if(Gate::denies('recruitment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $recruitment->delete();

        return back();
    }

    public function massDestroy(MassDestroyRecruitmentRequest $request)
    {
        $recruitments = Recruitment::find(request('ids'));

        foreach ($recruitments as $recruitment) {
            $recruitment->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('recruitment_create') && Gate::denies('recruitment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Recruitment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
