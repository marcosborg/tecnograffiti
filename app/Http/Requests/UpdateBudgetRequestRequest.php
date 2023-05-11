<?php

namespace App\Http\Requests;

use App\Models\BudgetRequest;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBudgetRequestRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('budget_request_edit');
    }

    public function rules()
    {
        return [
            'reference' => [
                'string',
                'required',
            ],
            'urgency_id' => [
                'required',
                'integer',
            ],
            'client_id' => [
                'required',
                'integer',
            ],
            'request_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'request_mode' => [
                'string',
                'nullable',
            ],
            'sent_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'sent_mode' => [
                'string',
                'nullable',
            ],
            'deadline_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'deadline_mode' => [
                'string',
                'nullable',
            ],
            'adjudicated_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'adjudicated_mode' => [
                'string',
                'nullable',
            ],
            'concluded_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'concluded_mode' => [
                'string',
                'nullable',
            ],
            'invoice_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'invoice_mode' => [
                'string',
                'nullable',
            ],
            'survey_date' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'survey_mode' => [
                'string',
                'nullable',
            ],
            'address' => [
                'string',
                'nullable',
            ],
            'location_info' => [
                'string',
                'nullable',
            ],
            'obs' => [
                'string',
                'nullable',
            ],
            'surface_types.*' => [
                'integer',
            ],
            'surface_types' => [
                'array',
            ],
            'duration_hours' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'duration_days' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'duration_saturdays' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'duration_nights' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
