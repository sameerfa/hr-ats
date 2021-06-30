<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Http\Resources\Admin\JobResource;
use App\Models\Company;
use App\Models\Job;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JobsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobResource(Job::with(['company'])->advancedFilter());
    }

    public function store(StoreJobRequest $request)
    {
        $job = Job::create($request->validated());

        return (new JobResource($job))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Job $job)
    {
        abort_if(Gate::denies('job_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'company'  => Company::get(['id', 'company_name']),
                'priority' => Job::PRIORITY_SELECT,
                'status'   => Job::STATUS_SELECT,
            ],
        ]);
    }

    public function show(Job $job)
    {
        abort_if(Gate::denies('job_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JobResource($job->load(['company']));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->validated());

        return (new JobResource($job))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Job $job)
    {
        abort_if(Gate::denies('job_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new JobResource($job->load(['company'])),
            'meta' => [
                'company'  => Company::get(['id', 'company_name']),
                'priority' => Job::PRIORITY_SELECT,
                'status'   => Job::STATUS_SELECT,
            ],
        ]);
    }

    public function destroy(Job $job)
    {
        abort_if(Gate::denies('job_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
