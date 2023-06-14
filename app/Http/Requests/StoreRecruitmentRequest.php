<?php

namespace App\Http\Requests;

use App\Models\Recruitment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRecruitmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recruitment_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:recruitments',
            ],
            'phone' => [
                'string',
                'required',
            ],
        ];
    }
}
