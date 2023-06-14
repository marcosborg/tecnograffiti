<?php

namespace App\Http\Requests;

use App\Models\Datasheet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDatasheetRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('datasheet_create');
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
