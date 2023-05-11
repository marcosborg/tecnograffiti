@extends('layouts.admin')
@section('content')
<div class="content">
    @can('client_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.clients.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.client.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.client.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Client">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.client_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.address') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.shipping_address') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.location') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.zip') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.department') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.phone_1') }}
                                </th>
                                <th>
                                    {{ trans('cruds.client.fields.phone_2') }}
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
                                    {{ trans('cruds.client.fields.website') }}
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
@can('client_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.clients.massDestroy') }}",
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
    ajax: "{{ route('admin.clients.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'name', name: 'name' },
{ data: 'client_type_name', name: 'client_type.name' },
{ data: 'address', name: 'address' },
{ data: 'shipping_address', name: 'shipping_address' },
{ data: 'location', name: 'location' },
{ data: 'zip', name: 'zip' },
{ data: 'department', name: 'department' },
{ data: 'phone_1', name: 'phone_1' },
{ data: 'phone_2', name: 'phone_2' },
{ data: 'vat', name: 'vat' },
{ data: 'contact', name: 'contact' },
{ data: 'celphone', name: 'celphone' },
{ data: 'email', name: 'email' },
{ data: 'website', name: 'website' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Client').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection