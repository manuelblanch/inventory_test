@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Inventory
@endsection


@section('main-content')
    <!-- ========================================================================================================== -->
    <!-- Main content -->
    <section class="content">
        <a href="inventory/create" class="btn btn-primary">Afgir ouya inventari</a>
        <table class="table table-bordered table-responsive" style="margin-top: 20px;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Public_id</th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Tipus de Material</th>
                <th>Marca ID</th>
                <th>Model ID</th>
                <th>Localització</th>
                <th>Quantitat</th>
                <th>Preu</th>
                <th>Procedencia Diners</th>
                <th>Proveidor ID</th>
                <th>Data Entrada</th>
                <th>Ultima Actualització</th>
                <th>Imatge</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td>1</td>
                <td>24</td>
                <td>Impressora</td>
                <td>Impressora</td>
                <td>informatica</td>
                <td>23</td>
                <td>47</td>
                <td>aula 24</td>
                <td>23</td>
                <td>40€</td>
                <td>banc</td>
                <td>4667</td>
                <td>25 març</td>
                <td>12 març</td>
                <td>imatge</td>
                <td>
                    <a href="" class="btn btn-success">Editar</a>
                    <a href="" class="btn btn-danger">Esborrar</a>
                </td>
            </tr>

            </tbody>
        </table>

    </section>

@endsection
