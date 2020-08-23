require('./bootstrap');

window.Vue = require('vue');

//Importando  Vue Filter
require('./filter'); 

//Importando progressbar
require('./progressbar'); 

//instalando o módulo custom events 
require('./customEvents'); 

//Importando o View Router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

//Importando  Sweetalert2
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  onOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})
window.Toast = Toast

//Importando o v-from
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

//Rotas
import { routes } from './routes';

//Registrando rotas
const router = new VueRouter({
    routes, 
    mode: 'hash',

})

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router
});