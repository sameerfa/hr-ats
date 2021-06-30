<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInterviewRequest;
use App\Http\Requests\UpdateInterviewRequest;
use App\Http\Resources\Admin\InterviewResource;
use App\Models\Interview;
use App\Models\Job;
use App\Models\Resume;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InterviewsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('interview_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InterviewResource(Interview::with(['job', 'resume'])->advancedFilter());
    }

    public function store(StoreInterviewRequest $request)
    {
        $interview = Interview::create($request->validated());

        return (new InterviewResource($interview))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Interview $interview)
    {
        abort_if(Gate::denies('interview_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'job'    => Job::get(['id', 'job_title']),
                'resume' => Resume::get(['id', 'name']),
                'status' => Interview::STATUS_SELECT,
            ],
        ]);
    }

    public function show(Interview $interview)
    {
        abort_if(Gate::denies('interview_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new InterviewResource($interview->load(['job', 'resume']));
    }

    public function update(UpdateInterviewRequest $request, Interview $interview)
    {
        $interview->update($request->validated());

        return (new InterviewResource($interview))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Interview $interview)
    {
        abort_if(Gate::denies('interview_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new InterviewResource($interview->load(['job', 'resume'])),
            'meta' => [
                'job'    => Job::get(['id', 'job_title']),
                'resume' => Resume::get(['id', 'name']),
                'status' => Interview::STATUS_SELECT,
            ],
        ]);
    }

    public function destroy(Interview $interview)
    {
        abort_if(Gate::denies('interview_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $interview->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
