@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.client.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $client->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $client->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.client_type') }}
                                    </th>
                                    <td>
                                        {{ $client->client_type->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $client->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.shipping_address') }}
                                    </th>
                                    <td>
                                        {{ $client->shipping_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.location') }}
                                    </th>
                                    <td>
                                        {{ $client->location }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.zip') }}
                                    </th>
                                    <td>
                                        {{ $client->zip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.department') }}
                                    </th>
                                    <td>
                                        {{ $client->department }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.phone_1') }}
                                    </th>
                                    <td>
                                        {{ $client->phone_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.phone_2') }}
                                    </th>
                                    <td>
                                        {{ $client->phone_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.vat') }}
                                    </th>
                                    <td>
                                        {{ $client->vat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.contact') }}
                                    </th>
                                    <td>
                                        {{ $client->contact }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.celphone') }}
                                    </th>
                                    <td>
                                        {{ $client->celphone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $client->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.client.fields.website') }}
                                    </th>
                                    <td>
                                        {{ $client->website }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.clients.index') }}">
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