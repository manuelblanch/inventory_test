@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Tipus de material
@endsection


@section('main-content')
    <!-- ========================================================================================================== -->
    <!-- Main content -->
    <section class="content">
        <a href="inventory/create" class="btn btn-primary">Afegir tipus de material a inventari</a>
        <table class="table table-bordered table-responsive" style="margin-top: 20px;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>

            <tr>
                <td>1</td>
                <td>cable de coure</td>
                <td>Material informatic</td>
                <td>
                    <a href="" class="btn btn-success">Editar</a>
                    <a href="" class="btn btn-danger">Esborrar</a>
                </td>
            </tr>

            </tbody>
        </table>

    </section>

@endsection