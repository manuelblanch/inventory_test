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
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.brandId = id;
            axios.get('' + id)
                .then(function (resp) {
                    app.brand = resp.data;
                })
                .catch(function () {
                    alert("Could not load")
                });
        },
        data: function () {
            return {
                brandId: null,
                brand: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newBrand = app.brand;
                axios.patch('' + app.brandId, newBrand)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create");
                    });
            }
        }
    }
</script>
