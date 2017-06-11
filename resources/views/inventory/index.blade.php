@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Inventory
@endsection
@section('main-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Inventari</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('inventory.create') }}">Afegeix nou item</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('inventory.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Busqueda'])
          @component('layouts.two-cols-search-row', ['items' => ['Name'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Picture</th>
                <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nom</th>
                <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Descripció</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Material_type: activate to sort column ascending">Tipus Material</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Material_type: activate to sort column ascending">Marca</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending">Model</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Provider: activate to sort column ascending">Localització</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Quantitat</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending">Preu</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Procedencia Monetaria</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Date_entrance: activate to sort column ascending">Proveidor</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Last_Update: activate to sort column ascending">Data Entrada</th>
                <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Last_Update: activate to sort column ascending">Última Actualització</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acció</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($inventories as $inventory)
                <tr role="row" class="odd">
                  <td><img src="../{{$inventory->picture }}" width="50px" height="50px"/></td>
                  <td class="hidden-xs">{{ $inventory->name }}</td>
                  <td class="hidden-xs">{{ $inventory->description }}</td>
                  <td class="hidden.xs">{{ $inventory->material_type_name}}</td>
                  <td class="hidden.xs">{{ $inventory->brand_name}}</td>
                  <td class="hidden.xs">{{ $inventory->brand_model_name}}</td>
                  <td class="hidden.xs">{{ $inventory->location_name}}</td>
                  <td class="hidden.xs">{{ $inventory->quantity}}</td>
                  <td class="hidden.xs">{{ $inventory->price}}</td>
                  <td class="hidden.xs">{{ $inventory->moneySource_name}}</td>
                  <td class="hidden.xs">{{ $inventory->provider_name}}</td>
                  <td class="hidden.xs">{{ $inventory->date_entrance}}</td>
                  <td class="hidden.xs">{{ $inventory->last_update}}</td>

                  <td>
                    <form class="row" method="POST" action="{{ route('inventory.destroy', ['id' => $inventory->id]) }}" onsubmit = "return confirm('Estas segur?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('inventory.edit', ['id' => $inventory->id]) }}" class="btn btn-success col-sm-12 col-xs-12 btn-margin">
                          <span class="glyphicon glyphicon-edit"></span>
                        Actualitzar
                        </a>
                         <button type="submit" class="btn btn-danger col-sm-12 col-xs-12 btn-margin">
                           <span class="glyphicon glyphicon-trash"></span>
                          Esborrar
                        </button>
                    </form>
                  </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
              <tr>
                <tr role="row">
                  <th width="8%" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Picture: activate to sort column descending" aria-sort="ascending">Picture</th>
                  <th width="10%" class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">Nom</th>
                  <th width="12%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Brand: activate to sort column ascending">Descripció</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Model: activate to sort column ascending">Tipus Material</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Material_type: activate to sort column ascending">Marca</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Location: activate to sort column ascending">Model</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Provider: activate to sort column ascending">Localització</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending">Quantitat</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Quantity: activate to sort column ascending">Preu</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Procedencia Monetaria</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Proveidor</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Date_entrance: activate to sort column ascending">Data Entrada</th>
                  <th width="8%" class="sorting hidden-xs" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Last_Update: activate to sort column ascending">Última Actualització</th>
                  <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acció</th>
                </tr>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Mostrant 1 a {{count($inventories)}} de {{count($inventories)}} entrades</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $inventories->links() }}
          </div>
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
