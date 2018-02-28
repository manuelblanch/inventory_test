
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
