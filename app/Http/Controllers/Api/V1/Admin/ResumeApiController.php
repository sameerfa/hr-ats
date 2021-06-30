<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreResumeRequest;
use App\Http\Requests\UpdateResumeRequest;
use App\Http\Resources\Admin\ResumeResource;
use App\Models\Resume;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ResumeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('resume_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResumeResource(Resume::advancedFilter());
    }

    public function store(StoreResumeRequest $request)
    {
        $resume = Resume::create($request->validated());

        if ($media = $request->input('resume', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $resume->id]);
        }

        return (new ResumeResource($resume))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Resume $resume)
    {
        abort_if(Gate::denies('resume_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'title'  => Resume::TITLE_SELECT,
                'status' => Resume::STATUS_SELECT,
            ],
        ]);
    }

    public function show(Resume $resume)
    {
        abort_if(Gate::denies('resume_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ResumeResource($resume);
    }

    public function update(UpdateResumeRequest $request, Resume $resume)
    {
        $resume->update($request->validated());

        $resume->updateMedia($request->input('resume', []), 'resume_resume');

        return (new ResumeResource($resume))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Resume $resume)
    {
        abort_if(Gate::denies('resume_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new ResumeResource($resume),
            'meta' => [
                'title'  => Resume::TITLE_SELECT,
                'status' => Resume::STATUS_SELECT,
            ],
        ]);
    }

    public function destroy(Resume $resume)
    {
        abort_if(Gate::denies('resume_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resume->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['resume_create', 'resume_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new Resume();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}
