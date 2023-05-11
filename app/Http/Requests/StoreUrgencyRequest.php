<?php

namespace App\Http\Requests;

use App\Models\Urgency;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUrgencyRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('urgency_create');
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
