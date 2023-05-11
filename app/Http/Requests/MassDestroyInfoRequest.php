<?php

namespace App\Http\Requests;

use App\Models\Info;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyInfoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('info_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:infos,id',
        ];
    }
}
