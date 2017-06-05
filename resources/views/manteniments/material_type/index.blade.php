@extends('adminlte::layouts.app')

@section('htmlheader_title')
    inventary
@endsection
    <!-- Main content -->
    @section('main-content')
    <!-- Main content -->
    <section class="content">
      <div class="box">
  <div class="box-header">
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Llista de tipus de material</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('material_type.create') }}">Afegeix un nou tipus de material</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('material_type.search') }}">
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
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="material_type: activate to sort column ascending">Nom</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="material_type: activate to sort column ascending">Descripció</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($material_types as $material_type)
                <tr role="row" class="odd">
                  <td>{{ $material_type->name }}</td>
                  <td>{{ $material_type->description }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('material_type.destroy', ['id' => $material_type->id]) }}" onsubmit = "return confirm('Estas segur?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('material_type.edit', ['id' => $material_type->id]) }}" class="btn btn-success">
                          <span class="glyphicon glyphicon-edit"></span>
                        Editar
                        </a>
                        <button type="submit" class="btn btn-danger">
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
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="location: activate to sort column ascending">Nom</th>
                <th width="20%" rowspan="1" colspan="1">Descripció</th>
                <th rowspan="1" colspan="2">Acció</th>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-5">
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Mostrant 1 a {{count($material_types)}} de {{count($material_types)}} entrades</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $material_types->links() }}
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
