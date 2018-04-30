@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
<div class="container-fluid spark-screen">

<dashboard-small-box name="tasks"></dashboard-small-box>
<dashboard-small-box name="threads" color="bg-green"></dashboard-small-box>

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

	<ul class="nav navbar-nav navbar-left navbar-top-links">
	                    <li><a href="#"><i class="fa fa-home fa-fw"></i>Web</a></li>
	                </ul>

	                <ul class="nav navbar-right navbar-top-links">
	                    <li class="dropdown navbar-inverse">
	                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
	                        </a>
	                        <ul class="dropdown-menu dropdown-alerts">
	                            <li>
	                                <a href="#">
	                                    <div>
	                                        <i class="fa fa-comment fa-fw"></i>Nou Comentari
	                                        <span class="pull-right text-muted small">4 minutes ago</span>
	                                    </div>
	                                </a>
	                            </li>
	                            <li>
	                                <a href="#">
	                                    <div>
	                                        <i class="fa fa-twitter fa-fw"></i> Nous Seguidors
	                                        <span class="pull-right text-muted small">12 minutes ago</span>
	                                    </div>
	                                </a>
	                            </li>
	                            <li>
	                                <a href="#">
	                                    <div>
	                                        <i class="fa fa-envelope fa-fw"></i> Missatge Enviat
	                                        <span class="pull-right text-muted small">4 minutes ago</span>
	                                    </div>
	                                </a>
	                            </li>
	                            <li>
	                                <a href="#">
	                                    <div>
	                                        <i class="fa fa-tasks fa-fw"></i> Nova Tasca
	                                        <span class="pull-right text-muted small">4 minutes ago</span>
	                                    </div>
	                                </a>
	                            </li>

															<a href="#">
															         <div>
															         		<i class="fa fa-upload fa-fw"></i> Server Rebooted
															               <span class="pull-right text-muted small">4 minutes ago</span>
															         </div>
															                                </a>
															                            </li>
															                            <li class="divider"></li>
															                            <li>
															                                <a class="text-center" href="#">
															                                    <strong>Observa totes les notificacions</strong>
															                                    <i class="fa fa-angle-right"></i>
															                                </a>
															                            </li>
															                        </ul>
															                    </li>
															                    <li class="dropdown">
															                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
															                            <i class="fa fa-user fa-fw"></i>Usuari<b class="caret"></b>
															                        </a>
															                        <ul class="dropdown-menu dropdown-user">
															                            <li><a href="#"><i class="fa fa-user fa-fw"></i>Perfil d'usuari</a>
															                            </li>
															                            <li><a href="#"><i class="fa fa-gear fa-fw"></i>Opcions</a>
															                            </li>
															                            <li class="divider"></li>
															                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
															                            </li>
															                        </ul>
															                    </li>
															</ul>

															<!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
</div>

</li>
                            <li>
                                <a href="index.html" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Flot Charts</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">Morris.js Charts</a>
                                    </li>
</ul>

</li>
													 <li>
															 <a href="tables.html"><i class="fa fa-table fa-fw"></i> Tables</a>
													 </li>
													 <li>
															 <a href="forms.html"><i class="fa fa-edit fa-fw"></i> Forms</a>
													 </li>
													 <li>
															 <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
															 <ul class="nav nav-second-level">
																	 <li>
																			 <a href="panels-wells.html">Panels and Wells</a>
</li>

<li>
                                        <a href="buttons.html">Buttons</a>
                                    </li>
                                    <li>
                                        <a href="notifications.html">Notifications</a>
                                    </li>
                                    <li>
                                        <a href="typography.html">Typography</a>
                                    </li>
                                    <li>
                                        <a href="icons.html"> Icons</a>
                                    </li>
                                    <li>
                                        <a href="grid.html">Grid</a>
                                    </li>
</ul>

<!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Second Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level <span class="fa arrow"></span></a>
                                        <ul class="nav nav-third-level">
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                            <li>
                                                <a href="#">Third Level Item</a>
                                            </li>
                                        </ul>
                                        <!-- /.nav-third-level -->
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
<li>

	<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="blank.html">Blank Page</a>
                                    </li>
                                    <li>
                                        <a href="login.html">Login Page</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        </ul>
                    </div>
                </div>
</nav>

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
                                        <div class="huge">26</div>
                                        <div>Nous Comentaris!</div>
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
