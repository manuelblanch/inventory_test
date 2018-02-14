
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createBrand'}" class="btn btn-success">Crea una nova marca</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Marques</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Nom Curt</th>
                        <th>Descripció</th>
                        <th>Data Entrada</th>
                        <th>Ultima Actualització</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="brand, index in brands">
                        <td>{{ brand.name }}</td>
                        <td>{{ brand.description }}</td>
                        <td>{{ brand.date }}</td>
                        <td>{{ brand.update }}</td>
                        <td>
                            <router-link :to="{name: 'editBrand', params: {id: brand.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(brand.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                brands: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/brands')
                .then(function (resp) {
                    app.brands = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("No es pot carregar");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Vols esborrar?")) {
                    var app = this;
                    axios.delete('/api/v1/brands/' + id)
                        .then(function (resp) {
                            app.brands.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("No es pot esborrar");
                        });
                }
            }
        }
    }
</script>
