<?php

namespace App\Http\Requests;

use App\Models\ReceptionMode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReceptionModeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reception_mode_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reception_modes,id',
        ];
    }
}
