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
                                        {{ trans('cruds.budgetRequest.fields.billing_client') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.budgetRequest.fields.request_date') }}
                                    </th>
                                    <th>
                                        Fotografias
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
                                            {{ $budgetRequest->billing_client->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $budgetRequest->request_date ?? '' }}
                                        </td>
                                        <td>
                                            @foreach($budgetRequest->photos as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl() }}" width="50">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            @can('budget_request_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.budget-requests.pdf', $budgetRequest->id) }}">
                                                    PDF
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