<?php

namespace App\Http\Requests;

use App\Models\Resume;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreResumeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('resume_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'in:' . implode(',', Arr::pluck(Resume::TITLE_SELECT, 'value')),
            ],
            'name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'city' => [
                'string',
                'required',
            ],
            'mobile' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'experience' => [
                'string',
                'required',
            ],
            'education' => [
                'string',
                'required',
            ],
            'skills' => [
                'string',
                'nullable',
            ],
            'current_employer' => [
                'string',
                'nullable',
            ],
            'current_position' => [
                'string',
                'nullable',
            ],
            'resume' => [
                'array',
                'required',
            ],
            'resume.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'status' => [
                'required',
                'in:' . implode(',', Arr::pluck(Resume::STATUS_SELECT, 'value')),
            ],
        ];
    }
}
