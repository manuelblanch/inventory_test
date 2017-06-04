@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Inventory
@endsection


@section('main-content')
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-4">
          <h3 class="box-title">Llista de inventari</h3>
        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('export.excel') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['from']}}" name="from" />
                <input type="hidden" value="{{$searchingVals['to']}}" name="to" />
                <button type="submit" class="btn btn-primary">
                  Export to Excel
                </button>
            </form>
        </div>
        <div class="col-sm-4">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('export.pdf') }}">
                {{ csrf_field() }}
                <input type="hidden" value="{{$searchingVals['from']}}" name="from" />
                <input type="hidden" value="{{$searchingVals['to']}}" name="to" />
                <button type="submit" class="btn btn-info">
                  Export to PDF
                </button>
            </form>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('export.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Search'])
          @component('layouts.two-cols-date-search-row', ['items' => ['From', 'To'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['from'] : '', isset($searchingVals) ? $searchingVals['to'] : '']])
          @endcomponent
         @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Nom</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Descripció</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Tipus de material</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Quantitat</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Preu</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Data entrada</th>
                <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Ultima Actualització</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($inventories as $inventory)
                <tr role="row" class="odd">
                  <td class="hidden-xs">{{ $inventory->name }}</td>
                  <td class="hidden-xs">{{ $inventory->description }}</td>
                  <td class="hidden.xs">{{ $inventory->material_type_name}}</td>
                  <td class="hidden.xs">{{ $inventory->quantity }}</td>
                  <td class="hidden.xs">{{ $inventory->price }}</td>
                  <td class="hidden.xs">{{ $inventory->date_entrance }}</td>
                  <td class="hidden.xs">{{ $inventory->last_update }}</td>

              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr role="row">
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending">Nom</th>
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Descripció</th>
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Quantitat</th>
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Preu</th>
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Data entrada</th>
                  <th width = "20%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Birthday: activate to sort column ascending">Ultima Actualització</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to {{count($inventories)}} of {{count($inventories)}} entries</div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
    </section>
    <!-- /.content -->
  </div>
@endsection
