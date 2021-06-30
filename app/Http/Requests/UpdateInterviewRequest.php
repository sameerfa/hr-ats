<?php

namespace App\Http\Requests;

use App\Models\Interview;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class UpdateInterviewRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('interview_edit');
    }

    public function rules()
    {
        return [
            'job_id' => [
                'integer',
                'exists:jobs,id',
                'required',
            ],
            'resume_id' => [
                'integer',
                'exists:resumes,id',
                'required',
            ],
            'review' => [
                'string',
                'required',
            ],
            'status' => [
                'required',
                'in:' . implode(',', Arr::pluck(Interview::STATUS_SELECT, 'value')),
            ],
        ];
    }
}
