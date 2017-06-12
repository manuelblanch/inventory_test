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
				<h3>150</h3>

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
