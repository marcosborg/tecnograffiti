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
{ data: 'actions', name: '{{ trans('global.actions') }}' },
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