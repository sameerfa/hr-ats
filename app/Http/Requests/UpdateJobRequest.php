<?php

namespace App\Http\Requests;

use App\Models\Job;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateJobRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('job_edit');
    }

    public function rules()
    {
        return [
            'job_title' => [
                'string',
                'required',
            ],
            'company_id' => [
                'integer',
                'exists:companies,id',
                'nullable',
            ],
            'expected_experience' => [
                'string',
                'required',
            ],
            'ctc' => [
                'numeric',
                'required',
            ],
            'city' => [
                'string',
                'required',
            ],
            'job_description' => [
                'string',
                'required',
            ],
            'responsibilities' => [
                'string',
                'required',
            ],
            'skills' => [
                'string',
                'required',
            ],
            'priority' => [
                'required',
                'in:' . implode(',', Arr::pluck(Job::PRIORITY_SELECT, 'value')),
            ],
            'status' => [
                'required',
                'in:' . implode(',', Arr::pluck(Job::STATUS_SELECT, 'value')),
            ],
        ];
    }
}
