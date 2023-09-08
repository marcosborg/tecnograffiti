@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.budgetRequest.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.budget-requests.update", [$budgetRequest->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('reference') ? 'has-error' : '' }}">
                            <label class="required" for="reference">{{ trans('cruds.budgetRequest.fields.reference') }}</label>
                            <input class="form-control" type="text" name="reference" id="reference" value="{{ old('reference', $budgetRequest->reference) }}" required>
                            @if($errors->has('reference'))
                                <span class="help-block" role="alert">{{ $errors->first('reference') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.reference_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('urgency') ? 'has-error' : '' }}">
                            <label class="required" for="urgency_id">{{ trans('cruds.budgetRequest.fields.urgency') }}</label>
                            <select class="form-control select2" name="urgency_id" id="urgency_id" required>
                                @foreach($urgencies as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('urgency_id') ? old('urgency_id') : $budgetRequest->urgency->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('urgency'))
                                <span class="help-block" role="alert">{{ $errors->first('urgency') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.urgency_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('client') ? 'has-error' : '' }}">
                            <label class="required" for="client_id">{{ trans('cruds.budgetRequest.fields.client') }}</label>
                            <select class="form-control select2" name="client_id" id="client_id" required>
                                @foreach($clients as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('client_id') ? old('client_id') : $budgetRequest->client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client'))
                                <span class="help-block" role="alert">{{ $errors->first('client') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.client_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('billing_client') ? 'has-error' : '' }}">
                            <label for="billing_client_id">{{ trans('cruds.budgetRequest.fields.billing_client') }}</label>
                            <select class="form-control select2" name="billing_client_id" id="billing_client_id">
                                @foreach($billing_clients as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('billing_client_id') ? old('billing_client_id') : $budgetRequest->billing_client->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('billing_client'))
                                <span class="help-block" role="alert">{{ $errors->first('billing_client') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.billing_client_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('request') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="request" value="0">
                                <input type="checkbox" name="request" id="request" value="1" {{ $budgetRequest->request || old('request', 0) === 1 ? 'checked' : '' }}>
                                <label for="request" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.request') }}</label>
                            </div>
                            @if($errors->has('request'))
                                <span class="help-block" role="alert">{{ $errors->first('request') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.request_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('request_date') ? 'has-error' : '' }}">
                            <label for="request_date">{{ trans('cruds.budgetRequest.fields.request_date') }}</label>
                            <input class="form-control date" type="text" name="request_date" id="request_date" value="{{ old('request_date', $budgetRequest->request_date) }}">
                            @if($errors->has('request_date'))
                                <span class="help-block" role="alert">{{ $errors->first('request_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.request_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('reception_mode') ? 'has-error' : '' }}">
                            <label for="reception_mode_id">{{ trans('cruds.budgetRequest.fields.reception_mode') }}</label>
                            <select class="form-control select2" name="reception_mode_id" id="reception_mode_id">
                                @foreach($reception_modes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('reception_mode_id') ? old('reception_mode_id') : $budgetRequest->reception_mode->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reception_mode'))
                                <span class="help-block" role="alert">{{ $errors->first('reception_mode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.reception_mode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sent') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="sent" value="0">
                                <input type="checkbox" name="sent" id="sent" value="1" {{ $budgetRequest->sent || old('sent', 0) === 1 ? 'checked' : '' }}>
                                <label for="sent" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.sent') }}</label>
                            </div>
                            @if($errors->has('sent'))
                                <span class="help-block" role="alert">{{ $errors->first('sent') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.sent_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sent_date') ? 'has-error' : '' }}">
                            <label for="sent_date">{{ trans('cruds.budgetRequest.fields.sent_date') }}</label>
                            <input class="form-control date" type="text" name="sent_date" id="sent_date" value="{{ old('sent_date', $budgetRequest->sent_date) }}">
                            @if($errors->has('sent_date'))
                                <span class="help-block" role="alert">{{ $errors->first('sent_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.sent_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('adjudicated') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="adjudicated" value="0">
                                <input type="checkbox" name="adjudicated" id="adjudicated" value="1" {{ $budgetRequest->adjudicated || old('adjudicated', 0) === 1 ? 'checked' : '' }}>
                                <label for="adjudicated" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.adjudicated') }}</label>
                            </div>
                            @if($errors->has('adjudicated'))
                                <span class="help-block" role="alert">{{ $errors->first('adjudicated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.adjudicated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('adjudicated_date') ? 'has-error' : '' }}">
                            <label for="adjudicated_date">{{ trans('cruds.budgetRequest.fields.adjudicated_date') }}</label>
                            <input class="form-control date" type="text" name="adjudicated_date" id="adjudicated_date" value="{{ old('adjudicated_date', $budgetRequest->adjudicated_date) }}">
                            @if($errors->has('adjudicated_date'))
                                <span class="help-block" role="alert">{{ $errors->first('adjudicated_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.adjudicated_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('concluded') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="concluded" value="0">
                                <input type="checkbox" name="concluded" id="concluded" value="1" {{ $budgetRequest->concluded || old('concluded', 0) === 1 ? 'checked' : '' }}>
                                <label for="concluded" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.concluded') }}</label>
                            </div>
                            @if($errors->has('concluded'))
                                <span class="help-block" role="alert">{{ $errors->first('concluded') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.concluded_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('concluded_date') ? 'has-error' : '' }}">
                            <label for="concluded_date">{{ trans('cruds.budgetRequest.fields.concluded_date') }}</label>
                            <input class="form-control date" type="text" name="concluded_date" id="concluded_date" value="{{ old('concluded_date', $budgetRequest->concluded_date) }}">
                            @if($errors->has('concluded_date'))
                                <span class="help-block" role="alert">{{ $errors->first('concluded_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.concluded_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('invoice') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="invoice" value="0">
                                <input type="checkbox" name="invoice" id="invoice" value="1" {{ $budgetRequest->invoice || old('invoice', 0) === 1 ? 'checked' : '' }}>
                                <label for="invoice" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.invoice') }}</label>
                            </div>
                            @if($errors->has('invoice'))
                                <span class="help-block" role="alert">{{ $errors->first('invoice') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.invoice_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
                            <label for="invoice_date">{{ trans('cruds.budgetRequest.fields.invoice_date') }}</label>
                            <input class="form-control date" type="text" name="invoice_date" id="invoice_date" value="{{ old('invoice_date', $budgetRequest->invoice_date) }}">
                            @if($errors->has('invoice_date'))
                                <span class="help-block" role="alert">{{ $errors->first('invoice_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.invoice_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('survey') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="survey" value="0">
                                <input type="checkbox" name="survey" id="survey" value="1" {{ $budgetRequest->survey || old('survey', 0) === 1 ? 'checked' : '' }}>
                                <label for="survey" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.survey') }}</label>
                            </div>
                            @if($errors->has('survey'))
                                <span class="help-block" role="alert">{{ $errors->first('survey') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.survey_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('survey_date') ? 'has-error' : '' }}">
                            <label for="survey_date">{{ trans('cruds.budgetRequest.fields.survey_date') }}</label>
                            <input class="form-control date" type="text" name="survey_date" id="survey_date" value="{{ old('survey_date', $budgetRequest->survey_date) }}">
                            @if($errors->has('survey_date'))
                                <span class="help-block" role="alert">{{ $errors->first('survey_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.survey_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_1') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_1" value="0">
                                <input type="checkbox" name="work_data_1" id="work_data_1" value="1" {{ $budgetRequest->work_data_1 || old('work_data_1', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_1" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_1') }}</label>
                            </div>
                            @if($errors->has('work_data_1'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_2') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_2" value="0">
                                <input type="checkbox" name="work_data_2" id="work_data_2" value="1" {{ $budgetRequest->work_data_2 || old('work_data_2', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_2" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_2') }}</label>
                            </div>
                            @if($errors->has('work_data_2'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_3') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_3" value="0">
                                <input type="checkbox" name="work_data_3" id="work_data_3" value="1" {{ $budgetRequest->work_data_3 || old('work_data_3', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_3" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_3') }}</label>
                            </div>
                            @if($errors->has('work_data_3'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_4') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_4" value="0">
                                <input type="checkbox" name="work_data_4" id="work_data_4" value="1" {{ $budgetRequest->work_data_4 || old('work_data_4', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_4" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_4') }}</label>
                            </div>
                            @if($errors->has('work_data_4'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_4') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_4_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_5') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_5" value="0">
                                <input type="checkbox" name="work_data_5" id="work_data_5" value="1" {{ $budgetRequest->work_data_5 || old('work_data_5', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_5" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_5') }}</label>
                            </div>
                            @if($errors->has('work_data_5'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_5') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_5_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_6') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_6" value="0">
                                <input type="checkbox" name="work_data_6" id="work_data_6" value="1" {{ $budgetRequest->work_data_6 || old('work_data_6', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_6" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_6') }}</label>
                            </div>
                            @if($errors->has('work_data_6'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_6') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_6_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_7') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_7" value="0">
                                <input type="checkbox" name="work_data_7" id="work_data_7" value="1" {{ $budgetRequest->work_data_7 || old('work_data_7', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_7" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_7') }}</label>
                            </div>
                            @if($errors->has('work_data_7'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_7') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_7_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_8') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_8" value="0">
                                <input type="checkbox" name="work_data_8" id="work_data_8" value="1" {{ $budgetRequest->work_data_8 || old('work_data_8', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_8" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_8') }}</label>
                            </div>
                            @if($errors->has('work_data_8'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_8') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_8_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('work_data_9') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="work_data_9" value="0">
                                <input type="checkbox" name="work_data_9" id="work_data_9" value="1" {{ $budgetRequest->work_data_9 || old('work_data_9', 0) === 1 ? 'checked' : '' }}>
                                <label for="work_data_9" style="font-weight: 400">{{ trans('cruds.budgetRequest.fields.work_data_9') }}</label>
                            </div>
                            @if($errors->has('work_data_9'))
                                <span class="help-block" role="alert">{{ $errors->first('work_data_9') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.work_data_9_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? 'has-error' : '' }}">
                            <label for="photos">{{ trans('cruds.budgetRequest.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <span class="help-block" role="alert">{{ $errors->first('photos') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.budgetRequest.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', $budgetRequest->address) }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('location_info') ? 'has-error' : '' }}">
                            <label for="location_info">{{ trans('cruds.budgetRequest.fields.location_info') }}</label>
                            <input class="form-control" type="text" name="location_info" id="location_info" value="{{ old('location_info', $budgetRequest->location_info) }}">
                            @if($errors->has('location_info'))
                                <span class="help-block" role="alert">{{ $errors->first('location_info') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.location_info_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('info') ? 'has-error' : '' }}">
                            <label for="info_id">{{ trans('cruds.budgetRequest.fields.info') }}</label>
                            <select class="form-control select2" name="info_id" id="info_id">
                                @foreach($infos as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('info_id') ? old('info_id') : $budgetRequest->info->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('info'))
                                <span class="help-block" role="alert">{{ $errors->first('info') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.info_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('obs') ? 'has-error' : '' }}">
                            <label for="obs">{{ trans('cruds.budgetRequest.fields.obs') }}</label>
                            <input class="form-control" type="text" name="obs" id="obs" value="{{ old('obs', $budgetRequest->obs) }}">
                            @if($errors->has('obs'))
                                <span class="help-block" role="alert">{{ $errors->first('obs') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.obs_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('surface_types') ? 'has-error' : '' }}">
                            <label for="surface_types">{{ trans('cruds.budgetRequest.fields.surface_type') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="surface_types[]" id="surface_types" multiple>
                                @foreach($surface_types as $id => $surface_type)
                                    <option value="{{ $id }}" {{ (in_array($id, old('surface_types', [])) || $budgetRequest->surface_types->contains($id)) ? 'selected' : '' }}>{{ $surface_type }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('surface_types'))
                                <span class="help-block" role="alert">{{ $errors->first('surface_types') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.surface_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duration_hours') ? 'has-error' : '' }}">
                            <label for="duration_hours">{{ trans('cruds.budgetRequest.fields.duration_hours') }}</label>
                            <input class="form-control" type="number" name="duration_hours" id="duration_hours" value="{{ old('duration_hours', $budgetRequest->duration_hours) }}" step="1">
                            @if($errors->has('duration_hours'))
                                <span class="help-block" role="alert">{{ $errors->first('duration_hours') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_hours_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duration_days') ? 'has-error' : '' }}">
                            <label for="duration_days">{{ trans('cruds.budgetRequest.fields.duration_days') }}</label>
                            <input class="form-control" type="number" name="duration_days" id="duration_days" value="{{ old('duration_days', $budgetRequest->duration_days) }}" step="1">
                            @if($errors->has('duration_days'))
                                <span class="help-block" role="alert">{{ $errors->first('duration_days') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_days_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duration_saturdays') ? 'has-error' : '' }}">
                            <label for="duration_saturdays">{{ trans('cruds.budgetRequest.fields.duration_saturdays') }}</label>
                            <input class="form-control" type="number" name="duration_saturdays" id="duration_saturdays" value="{{ old('duration_saturdays', $budgetRequest->duration_saturdays) }}" step="1">
                            @if($errors->has('duration_saturdays'))
                                <span class="help-block" role="alert">{{ $errors->first('duration_saturdays') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_saturdays_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('duration_nights') ? 'has-error' : '' }}">
                            <label for="duration_nights">{{ trans('cruds.budgetRequest.fields.duration_nights') }}</label>
                            <input class="form-control" type="number" name="duration_nights" id="duration_nights" value="{{ old('duration_nights', $budgetRequest->duration_nights) }}" step="1">
                            @if($errors->has('duration_nights'))
                                <span class="help-block" role="alert">{{ $errors->first('duration_nights') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_nights_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('other_information') ? 'has-error' : '' }}">
                            <label for="other_information">{{ trans('cruds.budgetRequest.fields.other_information') }}</label>
                            <textarea class="form-control ckeditor" name="other_information" id="other_information">{!! old('other_information', $budgetRequest->other_information) !!}</textarea>
                            @if($errors->has('other_information'))
                                <span class="help-block" role="alert">{{ $errors->first('other_information') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.other_information_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('admin.budget-requests.storeMedia') }}',
    maxFilesize: 8, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 8,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($budgetRequest) && $budgetRequest->photos)
      var files = {!! json_encode($budgetRequest->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.budget-requests.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $budgetRequest->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection