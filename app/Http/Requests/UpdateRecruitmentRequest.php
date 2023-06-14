<?php

namespace App\Http\Requests;

use App\Models\Recruitment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRecruitmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('recruitment_edit');
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
                'unique:recruitments,email,' . request()->route('recruitment')->id,
            ],
            'phone' => [
                'string',
                'required',
            ],
        ];
    }
}
