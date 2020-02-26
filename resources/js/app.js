require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
import Vuelidate from 'vuelidate'
import 'bootstrap/dist/css/bootstrap.min.css';

Vue.use(VueRouter)
Vue.use(Vuelidate)

const routes = [
    { path: '/', component: require('./components/HomeComponent.vue').default },
    { path: '/form', component: require('./components/FormComponent.vue').default }
]
  
const router = new VueRouter({
    routes 
})

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
});
