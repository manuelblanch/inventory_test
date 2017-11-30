@extends('adminlte::layouts.app')

@section('htmlheader_title')
    inventary
@endsection
    <!-- Main content -->
    @section('main-content')
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Llista de notificacions</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('moneySource.create') }}">Afegeix una nova notificacio</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('moneySource.search') }}">
         {{ csrf_field() }}
         @component('layouts.search', ['title' => 'Busqueda'])
          @component('layouts.two-cols-search-row', ['items' => ['Name', 'ShortName'],
          'oldVals' => [isset($searchingVals) ? $searchingVals['name'] : '', isset($searchingVals) ? $searchingVals['shortName'] : '']])
          @endcomponent
        @endcomponent
      </form>
    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
        <div class="col-sm-12">
          <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
              <tr role="row">
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="moneySource: activate to sort column ascending">Nom</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="moneySource: activate to sort column ascending">Nom Curt</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="moneySource: activate to sort column ascending">Descripció</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="moneySource: activate to sort column ascending">Data Entrada</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="moneySource: activate to sort column ascending">Ultima actualització</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acció</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($moneySources as $moneySource)
                <tr role="row" class="odd">
                  <td>{{ $moneySource->name }}</td>
                  <td>{{ $moneySource->shortName }}</td>
                  <td>{{ $moneySource->description }}</td>
                  <td>{{ $moneySource->date_entrance }}</td>
                  <td>{{ $moneySource->last_update }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('moneySource.destroy', ['id' => $moneySource->id]) }}" onsubmit = "return confirm('Estas segur?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('moneySource.edit', ['id' => $moneySource->id]) }}" class="btn btn-success col-sm-12 col-xs-12 btn-margin">
                          <span class="glyphicon glyphicon-edit"></span>
                        Editar
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
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="moneySource: activate to sort column ascending">Nom</th>
                <th width="20%" rowspan="1" colspan="1">Nom Curt</th>
                <th width="20%" rowspan="1" colspan="1">Descripció</th>
                <th width="20%" rowspan="1" colspan="1">Data Entrada</th>
                <th width="20%" rowspan="1" colspan="1">Ultima Actualització</th>
                <th rowspan="1" colspan="2">Acció</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Mostrant 1 a {{count($moneySources)}} de {{count($moneySources)}} entrades</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $moneySources->links() }}
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
