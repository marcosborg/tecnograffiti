<?php

namespace App\Http\Requests;

use App\Models\Datasheet;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyDatasheetRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('datasheet_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:datasheets,id',
        ];
    }
}
