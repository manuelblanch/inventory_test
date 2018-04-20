<!DOCTYPE html>
<html>
<head>
    <title>Crud Laravel Test Vue</title>
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
                <th>Descripció</th>
                <th width="200px">Acció</th>
            </tr>
            <tr v-for="item in items">
                <td>@{{ brand.title }}</td>
                <td>@{{ brand.description }}</td>
                <td>@{{ brand.name }}</td>
                <td>@{{ brand.shortName }}</td>
                <td>@{{ brand.description }}</td>
                <td>@{{ brand.date_entrance }}</td>
                <td>@{{ brand.last_update }}</td>
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

        <!-- Create Item Modal -->
        <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Afegeix Objectes</h4>
                </div>
                <div class="modal-body">
                    <!-- Form-->
                    <form method="POST" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                        <div class="form-group">
                            <label for="title">Titol:</label>
                            <input type="text" name="title" class="form-control" v-model="newItem.title" />
                            <span v-if="formErrors['title']" class="error text-danger">@{{ formErrors['title'] }}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Descripció:</label>
                            <textarea name="description" class="form-control" v-model="newItem.description"></textarea>
                            <span v-if="formErrors['description']" class="error text-danger">@{{ formErrors['description'] }}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Nom:</label>
                            <textarea name="name" class="form-control" v-model="newItem.name"></textarea>
                            <span v-if="formErrors['name']" class="error text-danger">@{{ formErrors['name'] }}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Nom Curt:</label>
                            <textarea name="shortName" class="form-control" v-model="newItem.shortName"></textarea>
                            <span v-if="formErrors['shortName']" class="error text-danger">@{{ formErrors['shortName'] }}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Data_Entrada:</label>
                            <textarea name="date_entrance" class="form-control" v-model="newItem.date_entrance"></textarea>
                            <span v-if="formErrors['date_entrance']" class="error text-danger">@{{ formErrors['date_entrance'] }}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Ultima_Entrada:</label>
                            <textarea name="last_update" class="form-control" v-model="newItem.last_update"></textarea>
                            <span v-if="formErrors['last_update']" class="error text-danger">@{{ formErrors['last_update'] }}</span>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Afegeix</button>
                        </div>
                    </form>
                </div>
            </div>
          </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>

    <script type="text/javascript" src="/js/item.js"></script>

</body>
</html>
