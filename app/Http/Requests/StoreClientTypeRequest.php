<?php

namespace App\Http\Requests;

use App\Models\ClientType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_type_create');
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
