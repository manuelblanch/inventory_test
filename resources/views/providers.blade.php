@extends('adminlte::layouts.app')

@section('htmlheader_title')
    <h2>Inventory</h2>
@endsection


@section('main-content')
    <!-- ========================================================================================================== -->
    <!-- Main content -->
    <script src="vue.js"></script>
    <section class="content">
        <a href="inventory/create" class="btn btn-primary">Afegir proveidor a inventari</a>
        <table class="table table-bordered table-responsive" style="margin-top: 20px;">
            <thead>
            <tr>
                <th>Id</th>
                <th>Public_id</th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Tipus de Material</th>
                <th>Marca ID</th>
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


                <td>
                    <a href="" class="btn btn-success">Editar</a>
                    <a href="" class="btn btn-danger">Esborrar</a>
                </td>
            </tr>

            </tbody>
        </table>

        <div id="app" style="padding: 10px">
            <p>Order by:</p>
            <div class="btn-group btn-group-justified" role="group">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" v-on:click="sortBy('city')">Pueblo</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" v-on:click="sortBy('currentLevel')">Nivel</button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-default" @click="sortBy('status')">Status</button>
                </div>
            </div>

        </div>
        <body>
        <h1 id="title">Bienvenido, {{ name }}</h1>
        <input type="text/javascript">

            new Vue({
                el: "body",
                data: {
                    name: "Silence"
                }
        });
        </body>

    </section>

@endsection
