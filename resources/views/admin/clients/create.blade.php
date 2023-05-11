@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.client.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.clients.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.client.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('client_type') ? 'has-error' : '' }}">
                            <label class="required" for="client_type_id">{{ trans('cruds.client.fields.client_type') }}</label>
                            <select class="form-control select2" name="client_type_id" id="client_type_id" required>
                                @foreach($client_types as $id => $entry)
                                    <option value="{{ $id }}" {{ old('client_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('client_type'))
                                <span class="help-block" role="alert">{{ $errors->first('client_type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.client_type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.client.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('shipping_address') ? 'has-error' : '' }}">
                            <label for="shipping_address">{{ trans('cruds.client.fields.shipping_address') }}</label>
                            <input class="form-control" type="email" name="shipping_address" id="shipping_address" value="{{ old('shipping_address') }}">
                            @if($errors->has('shipping_address'))
                                <span class="help-block" role="alert">{{ $errors->first('shipping_address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.shipping_address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('location') ? 'has-error' : '' }}">
                            <label for="location">{{ trans('cruds.client.fields.location') }}</label>
                            <input class="form-control" type="text" name="location" id="location" value="{{ old('location', '') }}">
                            @if($errors->has('location'))
                                <span class="help-block" role="alert">{{ $errors->first('location') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.location_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('zip') ? 'has-error' : '' }}">
                            <label for="zip">{{ trans('cruds.client.fields.zip') }}</label>
                            <input class="form-control" type="text" name="zip" id="zip" value="{{ old('zip', '') }}">
                            @if($errors->has('zip'))
                                <span class="help-block" role="alert">{{ $errors->first('zip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.zip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('department') ? 'has-error' : '' }}">
                            <label for="department">{{ trans('cruds.client.fields.department') }}</label>
                            <input class="form-control" type="text" name="department" id="department" value="{{ old('department', '') }}">
                            @if($errors->has('department'))
                                <span class="help-block" role="alert">{{ $errors->first('department') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.department_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_1') ? 'has-error' : '' }}">
                            <label for="phone_1">{{ trans('cruds.client.fields.phone_1') }}</label>
                            <input class="form-control" type="text" name="phone_1" id="phone_1" value="{{ old('phone_1', '') }}">
                            @if($errors->has('phone_1'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.phone_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phone_2') ? 'has-error' : '' }}">
                            <label for="phone_2">{{ trans('cruds.client.fields.phone_2') }}</label>
                            <input class="form-control" type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', '') }}">
                            @if($errors->has('phone_2'))
                                <span class="help-block" role="alert">{{ $errors->first('phone_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.phone_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('vat') ? 'has-error' : '' }}">
                            <label for="vat">{{ trans('cruds.client.fields.vat') }}</label>
                            <input class="form-control" type="text" name="vat" id="vat" value="{{ old('vat', '') }}">
                            @if($errors->has('vat'))
                                <span class="help-block" role="alert">{{ $errors->first('vat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.vat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
                            <label for="contact">{{ trans('cruds.client.fields.contact') }}</label>
                            <input class="form-control" type="text" name="contact" id="contact" value="{{ old('contact', '') }}">
                            @if($errors->has('contact'))
                                <span class="help-block" role="alert">{{ $errors->first('contact') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.contact_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('celphone') ? 'has-error' : '' }}">
                            <label for="celphone">{{ trans('cruds.client.fields.celphone') }}</label>
                            <input class="form-control" type="text" name="celphone" id="celphone" value="{{ old('celphone', '') }}">
                            @if($errors->has('celphone'))
                                <span class="help-block" role="alert">{{ $errors->first('celphone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.celphone_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                            <label for="website">{{ trans('cruds.client.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', '') }}">
                            @if($errors->has('website'))
                                <span class="help-block" role="alert">{{ $errors->first('website') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.client.fields.website_helper') }}</span>
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