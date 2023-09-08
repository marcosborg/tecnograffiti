<?php

namespace App\Http\Requests;

use App\Models\ReceptionMode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReceptionModeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reception_mode_create');
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
