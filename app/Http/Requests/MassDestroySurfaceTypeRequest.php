<?php

namespace App\Http\Requests;

use App\Models\SurfaceType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySurfaceTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('surface_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:surface_types,id',
        ];
    }
}
