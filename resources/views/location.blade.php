@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Inventory
@endsection


@section('main-content')
    <!-- ========================================================================================================== -->
    <!-- Main content -->
    <section class="content">
        <a href="inventory/create" class="btn btn-primary">Afegir localització a inventari</a>
        <table class="table table-bordered table-responsive" style="margin-top: 20px;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Nom Curt</th>
                <th>Descripció</th>
                <th>Data Entrada</th>
                <th>Ultima actualització</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>1</td>
                <td>Aula 24</td>
                <td>A24</td>
                <td>Classe de informatica</td>
                <td>25-12-2012</td>
                <td>27-12-2018</td>

                <td>
                    <a href="" class="btn btn-success">Editar</a>
                    <a href="" class="btn btn-danger">Esborrar</a>
                </td>
            </tr>

            </tbody>
        </table>

    </section>

@endsection