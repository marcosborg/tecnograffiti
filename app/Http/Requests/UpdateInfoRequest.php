<?php

namespace App\Http\Requests;

use App\Models\Info;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInfoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('info_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
