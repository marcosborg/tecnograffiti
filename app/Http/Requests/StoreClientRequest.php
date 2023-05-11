<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'client_type_id' => [
                'required',
                'integer',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'location' => [
                'string',
                'nullable',
            ],
            'zip' => [
                'string',
                'nullable',
            ],
            'department' => [
                'string',
                'nullable',
            ],
            'phone_1' => [
                'string',
                'nullable',
            ],
            'phone_2' => [
                'string',
                'nullable',
            ],
            'vat' => [
                'string',
                'nullable',
            ],
            'contact' => [
                'string',
                'nullable',
            ],
            'celphone' => [
                'string',
                'nullable',
            ],
            'website' => [
                'string',
                'nullable',
            ],
        ];
    }
}
