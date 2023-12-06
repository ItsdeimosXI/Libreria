import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import Router from './router/routes.ts'
import axios from 'axios'
import VueAxios from 'vue-axios'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import '@fortawesome/fontawesome-free/css/all.min.css'
import 'bootstrap/dist/js/bootstrap'
const app = createApp(App)
app.use(VueAxios, axios)
app.use(Router)
app.mount('#app')
