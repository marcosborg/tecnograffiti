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
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-BudgetRequest">
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
                    </table>
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
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.budget-requests.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.budget-requests.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'reference', name: 'reference' },
{ data: 'urgency_name', name: 'urgency.name' },
{ data: 'client_name', name: 'client.name' },
{ data: 'client.phone_1', name: 'client.phone_1' },
{ data: 'client.vat', name: 'client.vat' },
{ data: 'client.contact', name: 'client.contact' },
{ data: 'client.celphone', name: 'client.celphone' },
{ data: 'client.email', name: 'client.email' },
{ data: 'billing_client_name', name: 'billing_client.name' },
{ data: 'request', name: 'request' },
{ data: 'request_date', name: 'request_date' },
{ data: 'reception_mode_name', name: 'reception_mode.name' },
{ data: 'sent', name: 'sent' },
{ data: 'sent_date', name: 'sent_date' },
{ data: 'adjudicated', name: 'adjudicated' },
{ data: 'adjudicated_date', name: 'adjudicated_date' },
{ data: 'concluded', name: 'concluded' },
{ data: 'concluded_date', name: 'concluded_date' },
{ data: 'invoice', name: 'invoice' },
{ data: 'invoice_date', name: 'invoice_date' },
{ data: 'survey', name: 'survey' },
{ data: 'survey_date', name: 'survey_date' },
{ data: 'work_data_1', name: 'work_data_1' },
{ data: 'work_data_2', name: 'work_data_2' },
{ data: 'work_data_3', name: 'work_data_3' },
{ data: 'work_data_4', name: 'work_data_4' },
{ data: 'work_data_5', name: 'work_data_5' },
{ data: 'work_data_6', name: 'work_data_6' },
{ data: 'work_data_7', name: 'work_data_7' },
{ data: 'work_data_8', name: 'work_data_8' },
{ data: 'work_data_9', name: 'work_data_9' },
{ data: 'photos', name: 'photos', sortable: false, searchable: false },
{ data: 'address', name: 'address' },
{ data: 'location_info', name: 'location_info' },
{ data: 'info_name', name: 'info.name' },
{ data: 'obs', name: 'obs' },
{ data: 'surface_type', name: 'surface_types.name' },
{ data: 'duration_hours', name: 'duration_hours' },
{ data: 'duration_days', name: 'duration_days' },
{ data: 'duration_saturdays', name: 'duration_saturdays' },
{ data: 'duration_nights', name: 'duration_nights' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-BudgetRequest').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection