@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.budgetRequest.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.budget-requests.store") }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('reference') ? 'has-error' : '' }}">
                                    <label class="required" for="reference">{{
                                        trans('cruds.budgetRequest.fields.reference') }}</label>
                                    <input class="form-control" type="text" name="reference" id="reference"
                                        value="{{ old('reference', '') }}" required>
                                    @if($errors->has('reference'))
                                    <span class="help-block" role="alert">{{ $errors->first('reference') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.budgetRequest.fields.reference_helper')
                                        }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('urgency') ? 'has-error' : '' }}">
                                    <label class="required" for="urgency_id">{{
                                        trans('cruds.budgetRequest.fields.urgency') }}</label>
                                    <select class="form-control select2" name="urgency_id" id="urgency_id" required>
                                        @foreach($urgencies as $id => $entry)
                                        <option value="{{ $id }}" {{ old('urgency_id')==$id ? 'selected' : '' }}>{{
                                            $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('urgency'))
                                    <span class="help-block" role="alert">{{ $errors->first('urgency') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.budgetRequest.fields.urgency_helper')
                                        }}</span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group {{ $errors->has('client') ? 'has-error' : '' }}">
                                    <label class="required" for="client_id">{{
                                        trans('cruds.budgetRequest.fields.client') }}</label>
                                    <select class="form-control select2" name="client_id" id="client_id" required>
                                        @foreach($clients as $id => $entry)
                                        <option value="{{ $id }}" {{ old('client_id')==$id ? 'selected' : '' }}>{{
                                            $entry }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('client'))
                                    <span class="help-block" role="alert">{{ $errors->first('client') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.budgetRequest.fields.client_helper')
                                        }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('request') ? 'has-error' : '' }}">
                                                    <div>
                                                        <input type="hidden" name="request" value="0">
                                                        <input type="checkbox" name="request" id="request" value="1" {{
                                                            old('request', 0)==1 ? 'checked' : '' }}>
                                                        <label for="request" style="font-weight: 400">{{
                                                            trans('cruds.budgetRequest.fields.request') }}</label>
                                                    </div>
                                                    @if($errors->has('request'))
                                                    <span class="help-block" role="alert">{{ $errors->first('request')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.request_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('request_date') ? 'has-error' : '' }}">
                                                    <label for="request_date">{{
                                                        trans('cruds.budgetRequest.fields.request_date')
                                                        }}</label>
                                                    <input class="form-control date" type="text" name="request_date"
                                                        id="request_date" value="{{ old('request_date') }}">
                                                    @if($errors->has('request_date'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('request_date')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.request_date_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('request_mode') ? 'has-error' : '' }}">
                                                    <label for="request_mode">{{
                                                        trans('cruds.budgetRequest.fields.request_mode')
                                                        }}</label>
                                                    <input class="form-control" type="text" name="request_mode"
                                                        id="request_mode" value="{{ old('request_mode', '') }}">
                                                    @if($errors->has('request_mode'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('request_mode')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.request_mode_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group {{ $errors->has('sent') ? 'has-error' : '' }}">
                                                    <div>
                                                        <input type="hidden" name="sent" value="0">
                                                        <input type="checkbox" name="sent" id="sent" value="1" {{
                                                            old('sent', 0)==1 ? 'checked' : '' }}>
                                                        <label for="sent" style="font-weight: 400">{{
                                                            trans('cruds.budgetRequest.fields.sent')
                                                            }}</label>
                                                    </div>
                                                    @if($errors->has('sent'))
                                                    <span class="help-block" role="alert">{{ $errors->first('sent')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.sent_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('sent_date') ? 'has-error' : '' }}">
                                                    <label for="sent_date">{{
                                                        trans('cruds.budgetRequest.fields.sent_date') }}</label>
                                                    <input class="form-control date" type="text" name="sent_date"
                                                        id="sent_date" value="{{ old('sent_date') }}">
                                                    @if($errors->has('sent_date'))
                                                    <span class="help-block" role="alert">{{ $errors->first('sent_date')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.sent_date_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('sent_mode') ? 'has-error' : '' }}">
                                                    <label for="sent_mode">{{
                                                        trans('cruds.budgetRequest.fields.sent_mode') }}</label>
                                                    <input class="form-control" type="text" name="sent_mode"
                                                        id="sent_mode" value="{{ old('sent_mode', '') }}">
                                                    @if($errors->has('sent_mode'))
                                                    <span class="help-block" role="alert">{{ $errors->first('sent_mode')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.sent_mode_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('deadline') ? 'has-error' : '' }}">
                                                    <div>
                                                        <input type="hidden" name="deadline" value="0">
                                                        <input type="checkbox" name="deadline" id="deadline" value="1"
                                                            {{ old('deadline', 0)==1 ? 'checked' : '' }}>
                                                        <label for="deadline" style="font-weight: 400">{{
                                                            trans('cruds.budgetRequest.fields.deadline') }}</label>
                                                    </div>
                                                    @if($errors->has('deadline'))
                                                    <span class="help-block" role="alert">{{ $errors->first('deadline')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.deadline_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('deadline_date') ? 'has-error' : '' }}">
                                                    <label for="deadline_date">{{
                                                        trans('cruds.budgetRequest.fields.deadline_date')
                                                        }}</label>
                                                    <input class="form-control date" type="text" name="deadline_date"
                                                        id="deadline_date" value="{{ old('deadline_date') }}">
                                                    @if($errors->has('deadline_date'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('deadline_date') }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.deadline_date_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('deadline_mode') ? 'has-error' : '' }}">
                                                    <label for="deadline_mode">{{
                                                        trans('cruds.budgetRequest.fields.deadline_mode')
                                                        }}</label>
                                                    <input class="form-control" type="text" name="deadline_mode"
                                                        id="deadline_mode" value="{{ old('deadline_mode', '') }}">
                                                    @if($errors->has('deadline_mode'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('deadline_mode') }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.deadline_mode_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('adjudicated') ? 'has-error' : '' }}">
                                                    <div>
                                                        <input type="hidden" name="adjudicated" value="0">
                                                        <input type="checkbox" name="adjudicated" id="adjudicated"
                                                            value="1" {{ old('adjudicated', 0)==1 ? 'checked' : '' }}>
                                                        <label for="adjudicated" style="font-weight: 400">{{
                                                            trans('cruds.budgetRequest.fields.adjudicated') }}</label>
                                                    </div>
                                                    @if($errors->has('adjudicated'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('adjudicated') }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.adjudicated_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('adjudicated_date') ? 'has-error' : '' }}">
                                                    <label for="adjudicated_date">{{
                                                        trans('cruds.budgetRequest.fields.adjudicated_date')
                                                        }}</label>
                                                    <input class="form-control date" type="text" name="adjudicated_date"
                                                        id="adjudicated_date" value="{{ old('adjudicated_date') }}">
                                                    @if($errors->has('adjudicated_date'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('adjudicated_date')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.adjudicated_date_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('adjudicated_mode') ? 'has-error' : '' }}">
                                                    <label for="adjudicated_mode">{{
                                                        trans('cruds.budgetRequest.fields.adjudicated_mode')
                                                        }}</label>
                                                    <input class="form-control" type="text" name="adjudicated_mode"
                                                        id="adjudicated_mode" value="{{ old('adjudicated_mode', '') }}">
                                                    @if($errors->has('adjudicated_mode'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('adjudicated_mode')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.adjudicated_mode_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('concluded') ? 'has-error' : '' }}">
                                                    <div>
                                                        <input type="hidden" name="concluded" value="0">
                                                        <input type="checkbox" name="concluded" id="concluded" value="1"
                                                            {{ old('concluded', 0)==1 ? 'checked' : '' }}>
                                                        <label for="concluded" style="font-weight: 400">{{
                                                            trans('cruds.budgetRequest.fields.concluded') }}</label>
                                                    </div>
                                                    @if($errors->has('concluded'))
                                                    <span class="help-block" role="alert">{{ $errors->first('concluded')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.concluded_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('concluded_date') ? 'has-error' : '' }}">
                                                    <label for="concluded_date">{{
                                                        trans('cruds.budgetRequest.fields.concluded_date')
                                                        }}</label>
                                                    <input class="form-control date" type="text" name="concluded_date"
                                                        id="concluded_date" value="{{ old('concluded_date') }}">
                                                    @if($errors->has('concluded_date'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('concluded_date') }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.concluded_date_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('concluded_mode') ? 'has-error' : '' }}">
                                                    <label for="concluded_mode">{{
                                                        trans('cruds.budgetRequest.fields.concluded_mode')
                                                        }}</label>
                                                    <input class="form-control" type="text" name="concluded_mode"
                                                        id="concluded_mode" value="{{ old('concluded_mode', '') }}">
                                                    @if($errors->has('concluded_mode'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('concluded_mode') }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.concluded_mode_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('invoice') ? 'has-error' : '' }}">
                                                    <div>
                                                        <input type="hidden" name="invoice" value="0">
                                                        <input type="checkbox" name="invoice" id="invoice" value="1" {{
                                                            old('invoice', 0)==1 ? 'checked' : '' }}>
                                                        <label for="invoice" style="font-weight: 400">{{
                                                            trans('cruds.budgetRequest.fields.invoice') }}</label>
                                                    </div>
                                                    @if($errors->has('invoice'))
                                                    <span class="help-block" role="alert">{{ $errors->first('invoice')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.invoice_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
                                                    <label for="invoice_date">{{
                                                        trans('cruds.budgetRequest.fields.invoice_date')
                                                        }}</label>
                                                    <input class="form-control date" type="text" name="invoice_date"
                                                        id="invoice_date" value="{{ old('invoice_date') }}">
                                                    @if($errors->has('invoice_date'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('invoice_date') }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.invoice_date_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('invoice_mode') ? 'has-error' : '' }}">
                                                    <label for="invoice_mode">{{
                                                        trans('cruds.budgetRequest.fields.invoice_mode')
                                                        }}</label>
                                                    <input class="form-control" type="text" name="invoice_mode"
                                                        id="invoice_mode" value="{{ old('invoice_mode', '') }}">
                                                    @if($errors->has('invoice_mode'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('invoice_mode') }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.invoice_mode_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group {{ $errors->has('survey') ? 'has-error' : '' }}">
                                                    <div>
                                                        <input type="hidden" name="survey" value="0">
                                                        <input type="checkbox" name="survey" id="survey" value="1" {{
                                                            old('survey', 0)==1 ? 'checked' : '' }}>
                                                        <label for="survey" style="font-weight: 400">{{
                                                            trans('cruds.budgetRequest.fields.survey') }}</label>
                                                    </div>
                                                    @if($errors->has('survey'))
                                                    <span class="help-block" role="alert">{{ $errors->first('survey')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.survey_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('survey_date') ? 'has-error' : '' }}">
                                                    <label for="survey_date">{{
                                                        trans('cruds.budgetRequest.fields.survey_date')
                                                        }}</label>
                                                    <input class="form-control date" type="text" name="survey_date"
                                                        id="survey_date" value="{{ old('survey_date') }}">
                                                    @if($errors->has('survey_date'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('survey_date')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.survey_date_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div
                                                    class="form-group {{ $errors->has('survey_mode') ? 'has-error' : '' }}">
                                                    <label for="survey_mode">{{
                                                        trans('cruds.budgetRequest.fields.survey_mode')
                                                        }}</label>
                                                    <input class="form-control" type="text" name="survey_mode"
                                                        id="survey_mode" value="{{ old('survey_mode', '') }}">
                                                    @if($errors->has('survey_mode'))
                                                    <span class="help-block" role="alert">{{
                                                        $errors->first('survey_mode')
                                                        }}</span>
                                                    @endif
                                                    <span class="help-block">{{
                                                        trans('cruds.budgetRequest.fields.survey_mode_helper')
                                                        }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                            <label for="address">{{ trans('cruds.budgetRequest.fields.address')
                                                }}</label>
                                            <input class="form-control" type="text" name="address" id="address"
                                                value="{{ old('address', '') }}">
                                            @if($errors->has('address'))
                                            <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.address_helper') }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('location_info') ? 'has-error' : '' }}">
                                            <label for="location_info">{{
                                                trans('cruds.budgetRequest.fields.location_info') }}</label>
                                            <input class="form-control" type="text" name="location_info"
                                                id="location_info" value="{{ old('location_info', '') }}">
                                            @if($errors->has('location_info'))
                                            <span class="help-block" role="alert">{{ $errors->first('location_info')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.location_info_helper')
                                                }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group {{ $errors->has('work_data_1') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_1" value="0">
                                                <input type="checkbox" name="work_data_1" id="work_data_1" value="1" {{
                                                    old('work_data_1', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_1" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_1') }}</label>
                                            </div>
                                            @if($errors->has('work_data_1'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_1')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_1_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_1_1') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_1_1" value="0">
                                                <input type="checkbox" name="work_data_1_1" id="work_data_1_1" value="1"
                                                    {{ old('work_data_1_1', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_1_1" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_1_1') }}</label>
                                            </div>
                                            @if($errors->has('work_data_1_1'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_1_1')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_1_1_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_1_2') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_1_2" value="0">
                                                <input type="checkbox" name="work_data_1_2" id="work_data_1_2" value="1"
                                                    {{ old('work_data_1_2', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_1_2" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_1_2') }}</label>
                                            </div>
                                            @if($errors->has('work_data_1_2'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_1_2')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_1_2_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_2') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_2" value="0">
                                                <input type="checkbox" name="work_data_2" id="work_data_2" value="1" {{
                                                    old('work_data_2', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_2" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_2') }}</label>
                                            </div>
                                            @if($errors->has('work_data_2'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_2')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_2_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_3') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_3" value="0">
                                                <input type="checkbox" name="work_data_3" id="work_data_3" value="1" {{
                                                    old('work_data_3', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_3" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_3') }}</label>
                                            </div>
                                            @if($errors->has('work_data_3'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_3')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_3_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_4') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_4" value="0">
                                                <input type="checkbox" name="work_data_4" id="work_data_4" value="1" {{
                                                    old('work_data_4', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_4" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_4') }}</label>
                                            </div>
                                            @if($errors->has('work_data_4'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_4')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_4_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_5') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_5" value="0">
                                                <input type="checkbox" name="work_data_5" id="work_data_5" value="1" {{
                                                    old('work_data_5', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_5" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_5') }}</label>
                                            </div>
                                            @if($errors->has('work_data_5'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_5')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_5_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_6') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_6" value="0">
                                                <input type="checkbox" name="work_data_6" id="work_data_6" value="1" {{
                                                    old('work_data_6', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_6" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_6') }}</label>
                                            </div>
                                            @if($errors->has('work_data_6'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_6')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_6_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_7') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_7" value="0">
                                                <input type="checkbox" name="work_data_7" id="work_data_7" value="1" {{
                                                    old('work_data_7', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_7" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_7') }}</label>
                                            </div>
                                            @if($errors->has('work_data_7'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_7')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_7_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('work_data_8') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="hidden" name="work_data_8" value="0">
                                                <input type="checkbox" name="work_data_8" id="work_data_8" value="1" {{
                                                    old('work_data_8', 0)==1 ? 'checked' : '' }}>
                                                <label for="work_data_8" style="font-weight: 400">{{
                                                    trans('cruds.budgetRequest.fields.work_data_8') }}</label>
                                            </div>
                                            @if($errors->has('work_data_8'))
                                            <span class="help-block" role="alert">{{ $errors->first('work_data_8')
                                                }}</span>
                                            @endif
                                            <span class="help-block">{{
                                                trans('cruds.budgetRequest.fields.work_data_8_helper')
                                                }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group {{ $errors->has('info') ? 'has-error' : '' }}">
                                            <label for="info_id">{{ trans('cruds.budgetRequest.fields.info') }}</label>
                                            <select class="form-control select2" name="info_id" id="info_id">
                                                @foreach($infos as $id => $entry)
                                                <option value="{{ $id }}" {{ old('info_id')==$id ? 'selected' : '' }}>{{
                                                    $entry }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('info'))
                                            <span class="help-block" role="alert">{{ $errors->first('info') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.info_helper')
                                                }}</span>
                                        </div>
                                        <div class="form-group {{ $errors->has('obs') ? 'has-error' : '' }}">
                                            <label for="obs">{{ trans('cruds.budgetRequest.fields.obs') }}</label>
                                            <input class="form-control" type="text" name="obs" id="obs"
                                                value="{{ old('obs', '') }}">
                                            @if($errors->has('obs'))
                                            <span class="help-block" role="alert">{{ $errors->first('obs') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.obs_helper')
                                                }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                A preencher no ato da orçamentação
                            </div>
                            <div class="panel-body">
                                <div class="form-group {{ $errors->has('surface_types') ? 'has-error' : '' }}">
                                    <label for="surface_types">{{ trans('cruds.budgetRequest.fields.surface_type') }}</label>
                                    <div style="padding-bottom: 4px">
                                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                                    </div>
                                    <select class="form-control select2" name="surface_types[]" id="surface_types" multiple>
                                        @foreach($surface_types as $id => $surface_type)
                                            <option value="{{ $id }}" {{ in_array($id, old('surface_types', [])) ? 'selected' : '' }}>{{ $surface_type }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('surface_types'))
                                        <span class="help-block" role="alert">{{ $errors->first('surface_types') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.budgetRequest.fields.surface_type_helper') }}</span>
                                </div>
                                <p>Duração prevista da obra</p>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('duration_hours') ? 'has-error' : '' }}">
                                            <label for="duration_hours">{{ trans('cruds.budgetRequest.fields.duration_hours') }}</label>
                                            <input class="form-control" type="number" name="duration_hours" id="duration_hours" value="{{ old('duration_hours', '') }}" step="1">
                                            @if($errors->has('duration_hours'))
                                                <span class="help-block" role="alert">{{ $errors->first('duration_hours') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_hours_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('duration_days') ? 'has-error' : '' }}">
                                            <label for="duration_days">{{ trans('cruds.budgetRequest.fields.duration_days') }}</label>
                                            <input class="form-control" type="number" name="duration_days" id="duration_days" value="{{ old('duration_days', '') }}" step="1">
                                            @if($errors->has('duration_days'))
                                                <span class="help-block" role="alert">{{ $errors->first('duration_days') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_days_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('duration_saturdays') ? 'has-error' : '' }}">
                                            <label for="duration_saturdays">{{ trans('cruds.budgetRequest.fields.duration_saturdays') }}</label>
                                            <input class="form-control" type="number" name="duration_saturdays" id="duration_saturdays" value="{{ old('duration_saturdays', '') }}" step="1">
                                            @if($errors->has('duration_saturdays'))
                                                <span class="help-block" role="alert">{{ $errors->first('duration_saturdays') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_saturdays_helper') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group {{ $errors->has('duration_nights') ? 'has-error' : '' }}">
                                            <label for="duration_nights">{{ trans('cruds.budgetRequest.fields.duration_nights') }}</label>
                                            <input class="form-control" type="number" name="duration_nights" id="duration_nights" value="{{ old('duration_nights', '') }}" step="1">
                                            @if($errors->has('duration_nights'))
                                                <span class="help-block" role="alert">{{ $errors->first('duration_nights') }}</span>
                                            @endif
                                            <span class="help-block">{{ trans('cruds.budgetRequest.fields.duration_nights_helper') }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('other_information') ? 'has-error' : '' }}">
                                    <label for="other_information">{{ trans('cruds.budgetRequest.fields.other_information') }}</label>
                                    <textarea class="form-control ckeditor" name="other_information" id="other_information">{!! old('other_information') !!}</textarea>
                                    @if($errors->has('other_information'))
                                        <span class="help-block" role="alert">{{ $errors->first('other_information') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.budgetRequest.fields.other_information_helper') }}</span>
                                </div>
                            </div>
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