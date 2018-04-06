@extends('adminlte::layouts.app')

@section('htmlheader_title')
    inventary
@endsection
    <!-- Main content -->
    @section('main-content')
    <section class="content">
      <div class="box">
  <div class="box-header">

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">20</div>
                                <div>New Comments!</div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <a href="#">
                       <div class="panel-footer">
                           <span class="pull-left">View Details</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                       </div>
                   </a>
               </div>
           </div>
           <div class="col-lg-3 col-md-6">
               <div class="panel panel-green">
                   <div class="panel-heading">
                       <div class="row">
                           <div class="col-xs-3">
                               <i class="fa fa-tasks fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                               <div class="huge">12</div>
                               <div>New Tasks!</div>
                           </div>
                       </div>
                   </div>
                   <a href="#">
                       <div class="panel-footer">
                           <span class="pull-left">View Details</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                       </div>
                   </a>
               </div>
</div>

<a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">124</div>
                                <div>New Orders!</div>
                            </div>
                        </div>
</div>

<a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div></div>
                            </div>
                        </div>
</div>

<a href="#">
                       <div class="panel-footer">
                           <span class="pull-left">View Details</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                       </div>
                   </a>
               </div>
           </div>
</div>

<!-- /.panel-heading -->
                   <div class="panel-body">
                       <div id="morris-area-chart"></div>
                   </div>
                   <!-- /.panel-body -->
               </div>
               <!-- /.panel -->
               <div class="panel panel-default">
                   <div class="panel-heading">
                       <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                       <div class="pull-right">
                           <div class="btn-group">
                               <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                   Actions
                                   <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu pull-right" role="menu">
                                   <li><a href="#">Action</a>
                                   </li>
                                   <li><a href="#">Another action</a>
                                   </li>
                                   <li><a href="#">Something else here</a>
                                   </li>
                                   <li class="divider"></li>
                                   <li><a href="#">Separated link</a>
                                   </li>
                               </ul>
                           </div>
                       </div>
</div>

<!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3326</td>
                                                <td></td>
                                                <td>3:29 PM</td>
                                                <td>$321.33</td>
                                            </tr>
                                            <tr>
                                                <td>3325</td>
                                                <td></td>
                                                <td>3:20 PM</td>
                                                <td>$234.34</td>
                                            </tr>
                                            <tr>
                                                <td>3324</td>
                                                <td></td>
                                                <td>3:03 PM</td>
                                                <td>$724.17</td>
                                            </tr>
                                            <tr>
                                                <td>3323</td>
                                                <td></td>
                                                <td>3:00 PM</td>
                                                <td>$23.71</td>
                                            </tr>
                                            <tr>
                                                <td>3322</td>
                                                <td></td>
                                                <td>2:49 PM</td>
                                                <td>$8345.23</td>
                                            </tr>
<tr>

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>150</h3>

        <p>Objectes de l'inventari</p>
      </div>
      <div class="icon">
        <i class="ion ion-bag"></i>
      </div>
      <a href="{{ url('inventory-mnt') }}" class="small-box-footer">Acces a la llista<i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
</div>
    <div class="row">
        <div class="col-sm-8">
          <h3 class="box-title">Llista de Test</h3>
        </div>
        <div class="col-sm-4">
          <a class="btn btn-primary" href="{{ route('brand.create') }}">Afegeix</a>
        </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
      <div class="row">
        <div class="col-sm-6"></div>
        <div class="col-sm-6"></div>
      </div>
      <form method="POST" action="{{ route('brand.search') }}">
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
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="brand: activate to sort column ascending">Nom</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="brand: activate to sort column ascending">Nom Curt</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="brand: activate to sort column ascending">Descripció</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="brand: activate to sort column ascending">Data Entrada</th>
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="brand: activate to sort column ascending">Ultima actualització</th>
                <th tabindex="0" aria-controls="example2" rowspan="1" colspan="2" aria-label="Action: activate to sort column ascending">Acció</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($brands as $brand)
                <tr role="row" class="odd">
                  <td>{{ $brand->name }}</td>
                  <td>{{ $brand->shortName }}</td>
                  <td>{{ $brand->description }}</td>
                  <td>{{ $brand->date_entrance }}</td>
                  <td>{{ $brand->last_update }}</td>
                  <td>
                    <form class="row" method="POST" action="{{ route('brand.destroy', ['id' => $brand->id]) }}" onsubmit = "return confirm('Estas segur?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('brand.edit', ['id' => $brand->id]) }}" class="btn btn-success col-sm-12 col-xs-12 btn-margin">
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
                <th width="20%" class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="provider: activate to sort column ascending">Nom</th>
                <th width="20%" rowspan="1" colspan="1">Nom</th>
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
          <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Mostrant 1 a {{count($brands)}} de {{count($brands)}} entrades</div>
        </div>
        <div class="col-sm-7">
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            {{ $brands->links() }}
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

  <script>
      export default {
          data: function () {
              return {
                  brands: []
              }
          },
          mounted() {
              var app = this;
              axios.get('/api/v1/tests')
                  .then(function (resp) {
                      app.tests = resp.data;
                  })
                  .catch(function (resp) {
                      console.log(resp);
                      alert("No es pot carregar");
                  });
          },
          methods: {
              deleteEntry(id, index) {
                  if (confirm("Vols esborrar?")) {
                      var app = this;
                      axios.delete('/api/v1/tests/' + id)
                          .then(function (resp) {
                              app.tests.splice(index, 1);
                          })
                          .catch(function (resp) {
                              alert("No es pot esborrar");
                          });
                  }
              }
          }
      }
  </script>
@endsection
