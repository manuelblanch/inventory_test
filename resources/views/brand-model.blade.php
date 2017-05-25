@extends('adminlte::layouts.app')

@section('htmlheader_title')
    <h2>Model Brand</h2>
@endsection


@section('main-content')
    <!-- ========================================================================================================== -->
    <!-- Main content -->
    <section class="content">
        <a href="inventory/create" class="btn btn-primary">Afegir model de marca a inventari</a>
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
                <td>Sony</td>
                <td>Toners Impresores</td>
                <td>
                    <a href="" class="btn btn-success">Editar</a>
                    <a href="" class="btn btn-danger">Esborrar</a>
                </td>
            </tr>

            </tbody>
        </table>

    </section>

@endsection