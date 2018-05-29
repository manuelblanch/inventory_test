import Vue from 'vue'
import VueSweetalert2 from 'vue-sweetalert2';
import App from './App.vue';

Vue.use(VueSweetalert2);

new Vue({
  el: '#app',
  render: h => h(App)
});
