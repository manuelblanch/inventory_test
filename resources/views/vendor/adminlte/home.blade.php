@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="container-fluid spark-screen">

<dashboard-small-box name="tasks"></dashboard-small-box>
<dashboard-small-box name="threads" color="bg-green"></dashboard-small-box>

<div class="row">
		<div class="col-lg-3 col-md-6">
				<div class="panel panel-primary">
						<div class="panel-heading">
								<div class="row">
										<div class="col-xs-3">
												<i class="fa fa-comments fa-5x"></i>
										</div>
										<div class="col-xs-9 text-right">
												<div class="huge">26</div>
												<div>Objectes de l'inventari</div>
										</div>
								</div>
						</div>
						<a href="#">
								<div class="panel-footer">
										<span class="pull-left">Acces a la llista</span>
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
												<div>Localitzacions</div>
										</div>
								</div>
						</div>
						<a href="#">
								<div class="panel-footer">
										<span class="pull-left">Acces a la localització</span>
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
												<div>Proveidors</div>
										</div>
								</div>
						</div>
						<a href="#">
								<div class="panel-footer">
										<span class="pull-left">Acces als proveidors</span>
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
												<div>Marques</div>
										</div>
								</div>
						</div>
						<a href="#">
								<div class="panel-footer">
										<span class="pull-left">Acces a marques</span>
										<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

										<div class="clearfix"></div>
								</div>
						</a>
				</div>
		</div>
</div>

<div class="row">
									 <div class="col-lg-8">
											 <div class="panel panel-default">
													 <div class="panel-heading">
															 <i class="fa fa-bar-chart-o fa-fw"></i> Mostra de chart
															 <div class="pull-right">
																	 <div class="btn-group">
																			 <button type="button" class="btn btn-default btn-xs dropdown-toggle"
																							 data-toggle="dropdown">
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
                                <div id="morris-area-chart"></div>
                            </div>
                            <!-- /.panel-body -->
</div>


</div>
</div>
</div>

<section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">CPU Traffic</span>
              <span class="info-box-number">90<small>%</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Ventes</span>
              <span class="info-box-number">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nous Usuaris</span>
              <span class="info-box-number">2,000</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->


<div class="row">

	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>200</h3>

				<p>Objectes de l'inventari</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="{{ url('inventory-mnt') }}" class="small-box-footer">Acces a la llista<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>





	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>65</h3>

				<p>Localitzacions</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="{{ url('mnt/location') }}" class="small-box-footer">Acces a la llista<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>23</h3>

				<p>Proveidors</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="{{ url('mnt/provider') }}" class="small-box-footer">Acces a la llista<i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>44</h3>

				<p>Registres d'usuaris</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
		</div>
	</div>
	<!-- ./col -->

	<!-- ./col -->
</div>
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Pagina Inicial</h3><br><br>
					Benvingut a la pagina inicial de l'inventari adminlte, pots accedir a la secció que vulguis desde aquesta pàgina o amb el sidebar que hi ha a la esquerra.
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
								<i class="fa fa-times"></i></button>

						</div>
					</div>
					<div class="box-body">
						<center><h4>Acces a Inventari</h4></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('inventory-mnt') }}';" value="Inventari" /></center>

					</div>
					<div class="box-body">
						<center><h4>Acces a Manteniments</h4></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('mnt/provider') }}';" value="Manteniment Proveidors" /></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('mnt/location') }}';" value="Manteniment Localització" /></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('mnt/material_type') }}';" value="Manteniment Tipus de Material" /></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('mnt/brand') }}';" value="Manteniment Marques" /></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('mnt/brand_model') }}';" value="Manteniment Model Marca" /></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('mnt/moneySource') }}';" value="Manteniment Procedencia Monetaria" /></center><br>

					<!-- /.box-body -->

						<center><h4>Exportar inventari a pdf o excel</h4></center><br>
						<center><input type="submit" class="btn btn-info" onclick="location.href='{{ url('mnt-export') }}';" value="Exportar Inventari" /></center><br>
					</div>
					<!-- /.box-footer-->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
</div>

@endsection
