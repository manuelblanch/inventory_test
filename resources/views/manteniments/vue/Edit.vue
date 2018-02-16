<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Crea una nova marca</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Nom</label>
                            <input type="text" v-model="brand.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Descripció</label>
                            <input type="text" v-model="brand.description" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Data</label>
                            <input type="text" v-model="brand.date" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Ultima Actualització</label>
                            <input type="text" v-model="brand.update" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Crear</button>
                        </div>
                    </div>
                </form>
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
            axios.get('/api/v1/brand/' + id)
                .then(function (resp) {
                    app.brand = resp.data;
                })
                .catch(function () {
                    alert("No es pot carregar")
                });
        },
        data: function () {
            return {
                brandId: null,
                company: {
                    name: '',
                    description: '',
                    date_entrance: '',
                    update: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newBrand = app.brand;
                axios.patch('/api/v1/brands/' + app.brandId, newBrand)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("No es pot crear");
                    });
            }
        }
    }
</script>
