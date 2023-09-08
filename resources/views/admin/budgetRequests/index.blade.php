@extends('layouts.admin')
@section('content')
<div class="content">
    @can('budget_request_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.budget-requests.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.budgetRequest.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.budgetRequest.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-BudgetRequest">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.reference') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.urgency') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.client') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.phone_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.vat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.contact') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.celphone') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.client.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.billing_client') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.request') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.request_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.reception_mode') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.sent') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.sent_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.adjudicated') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.adjudicated_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.concluded') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.concluded_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.invoice') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.invoice_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.survey') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.survey_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_1') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_3') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_4') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_5') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_6') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_7') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_8') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.work_data_9') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.photos') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.location_info') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.info') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.obs') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.surface_type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_hours') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_days') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_saturdays') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.duration_nights') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($budgetRequests as $key => $budgetRequest)
                                    <tr data-entry-id="{{ $budgetRequest->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $budgetRequest->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->reference ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->urgency->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->client->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->client->phone_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->client->vat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->client->contact ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->client->celphone ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->client->email ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->billing_client->name ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->request ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->request ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $budgetRequest->request_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->reception_mode->name ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->sent ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->sent ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $budgetRequest->sent_date ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->adjudicated ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->adjudicated ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $budgetRequest->adjudicated_date ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->concluded ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->concluded ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $budgetRequest->concluded_date ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->invoice ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->invoice ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $budgetRequest->invoice_date ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->survey ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->survey ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $budgetRequest->survey_date ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_1 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_1 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_2 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_2 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_3 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_3 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_4 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_4 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_5 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_5 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_6 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_6 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_7 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_7 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_8 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_8 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $budgetRequest->work_data_9 ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $budgetRequest->work_data_9 ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @foreach($budgetRequest->photos as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $budgetRequest->address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->location_info ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->info->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->obs ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($budgetRequest->surface_types as $key => $item)
                                                <span class="label label-info label-many">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $budgetRequest->duration_hours ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->duration_days ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->duration_saturdays ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->duration_nights ?? '' }}
                                        </td>
                                        <td>
                                            @can('budget_request_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.budget-requests.show', $budgetRequest->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('budget_request_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.budget-requests.edit', $budgetRequest->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('budget_request_delete')
                                                <form action="{{ route('admin.budget-requests.destroy', $budgetRequest->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('budget_request_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.budget-requests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-BudgetRequest:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection