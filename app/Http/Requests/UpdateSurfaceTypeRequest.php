<?php

namespace App\Http\Requests;

use App\Models\SurfaceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSurfaceTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('surface_type_edit');
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
