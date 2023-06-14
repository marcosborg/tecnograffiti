<?php

namespace App\Http\Requests;

use App\Models\Datasheet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDatasheetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('datasheet_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'files' => [
                'array',
            ],
        ];
    }
}
