<template>
  <div id="app">
    <div class="heading">
      <h1>Cruds</h1>
    </div>
    <crud-component
      v-for="crud in cruds"
      v-bind="crud"
      :key="crud.id"
      @update="update"
      @delete="del"
    ></crud-component>
    <div>
      <button @click="create()">Afegeix</button>
    </div>
  </div>
</template>

<script>
  function Crud({ id, color, name}) {
    this.id = id;
    this.color = color;
    this.name = name;
  }

  import CrudComponent from './CrudComponent.vue';
export default {
  data() {
    return {
      cruds: []
    }
  },
  methods: {
    create() {
      windows.axios.get('/api/cruds/create').then(( {data} )) => {
        this.cruds.push(new Crud(data));
      }),
    },
    read() {
    window.axios.get('/api/cruds').then(({ data }) => {
      data.forEach(crud => {
        this.cruds.push(new Crud(crud));
      });
    });
  },
},
...
