<!DOCTYPE html>
<html>
<head>
    <title>Crud Laravel Vue</title>
    <meta id="token" name="token" value="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css">
</head>
<body>

  <div class="container" id="manage-vue">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Crud Laravel Vue</h2>
                </div>
                <div class="pull-right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create-item">
                    Create Item
                    </button>
                </div>
            </div>
        </div>

        <!-- Item Listing -->
        <table class="table table-bordered">
            <tr>
                <th>Titul</th>
                <th>Descricio</th>
                <th width="200px">Acció</th>
            </tr>
            <tr v-for="item in items">
                <td>@{{ item.title }}</td>
                <td>@{{ item.description }}</td>
                <td>
                    <button class="btn btn-primary" @click.prevent="editItem(item)">Editar</button>
                    <button class="btn btn-danger" @click.prevent="deleteItem(item)">Esborrar</button>
                </td>
            </tr>
        </table>

        <!-- Pagination -->
        <nav>
            <ul class="pagination">
                <li v-if="pagination.current_page > 1">
                    <a href="#" aria-label="Previous"
                       @click.prevent="changePage(pagination.current_page - 1)">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                    <a href="#" @click.prevent="changePage(page)">@{{ page }}</a>
                </li>
                <li v-if="pagination.current_page < pagination.last_page">
                    <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
