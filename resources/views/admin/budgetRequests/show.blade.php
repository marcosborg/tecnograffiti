@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.budgetRequest.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.budget-requests.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.budget-requests.pdf', [$budgetRequest->id]) }}">
                                PDF
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.reference') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->reference }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.urgency') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->urgency->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.client') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->client->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.request') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->request ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.request_date') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->request_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.request_mode') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->request_mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.sent') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->sent ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.sent_date') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->sent_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.sent_mode') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->sent_mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.deadline') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->deadline ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.deadline_date') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->deadline_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.deadline_mode') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->deadline_mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.adjudicated') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->adjudicated ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.adjudicated_date') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->adjudicated_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.adjudicated_mode') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->adjudicated_mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.concluded') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->concluded ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.concluded_date') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->concluded_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.concluded_mode') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->concluded_mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.invoice') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->invoice ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.invoice_date') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->invoice_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.invoice_mode') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->invoice_mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.survey') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->survey ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.survey_date') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->survey_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.survey_mode') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->survey_mode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_1') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_1 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_1_1') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_1_1 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_1_2') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_1_2 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_2') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_2 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_3') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_3 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_4') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_4 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_5') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_5 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_6') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_6 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_7') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_7 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_8') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_8 ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.location_info') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->location_info }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.info') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->info->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.obs') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->obs }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.surface_type') }}
                                    </th>
                                    <td>
                                        @foreach($budgetRequest->surface_types as $key => $surface_type)
                                            <span class="label label-info">{{ $surface_type->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_hours') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->duration_hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_days') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->duration_days }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_saturdays') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->duration_saturdays }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_nights') }}
                                    </th>
                                    <td>
                                        {{ $budgetRequest->duration_nights }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.other_information') }}
                                    </th>
                                    <td>
                                        {!! $budgetRequest->other_information !!}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.budget-requests.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection