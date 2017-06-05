@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')
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
@endsection
