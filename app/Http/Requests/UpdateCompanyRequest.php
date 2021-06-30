<?php

namespace App\Http\Requests;

use App\Models\Company;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('company_edit');
    }

    public function rules()
    {
        return [
            'company_name' => [
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
            'contact_name' => [
                'string',
                'required',
            ],
            'contact_email' => [
                'required',
            ],
            'contact_mobile' => [
                'string',
                'required',
            ],
            'contact_designation' => [
                'string',
                'nullable',
            ],
            'company_website' => [
                'string',
                'nullable',
            ],
        ];
    }
}
