<template>
  <div class='ui centered card'>
    // Todo shown when we are not in editing mode.
    <div class="content" v-show="!isEditing">
      <div class='header'>
          {{ todo.title }}
      </div>
      <div class='meta'>
          {{ todo.project }}
      </div>
      <div class='extra content'>
          <span class='right floated edit icon' v-on:click="showForm">
          <i class='edit icon'></i>
        </span>
      </div>
    </div>
    // form is visible when we are in editing mode
    <div class="content" v-show="isEditing">
      <div class='ui form'>
        <div class='field'>
          <label></label>
          <input type='text' v-model="todo.title" >
        </div>
        <div class='field'>
          <label></label>
          <input type='text' v-model="todo.project" >
        </div>
        <div class='ui two button attached buttons'>
          <button class='ui basic blue button' v-on:click="hideForm">
            Close X
          </button>
        </div>
      </div>
    </div>
    <div class='ui bottom attached green basic button' v-show="!isEditing &&todo.done" disabled>
        Completed
    </div>
    <div class='ui bottom attached red basic button' v-show="!isEditing && !todo.done">
        Pending
    </div>
  </div>
</template>
</template>

<script>
export default {
  props: ['todo'],
  data() {
    return {
      isEditing: false,
    };
  },
  methods: {
    showForm() {
      this.isEditing = true;
    },
    hideForm() {
      this.isEditing = false;
    },
  },
};
</script>

<script>
    export default {
        data: function () {
            return {
                brands: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/tests')
                .then(function (resp) {
                    app.tests = resp.data;
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
                    axios.delete('/api/v1/tests/' + id)
                        .then(function (resp) {
                            app.tests.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("No es pot esborrar");
                        });
                }
            }
        }
    }
</script>
