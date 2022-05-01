import Vue from 'vue'
import App from './App.vue'
import './registerServiceWorker'
import router from './router'
import store from './store'
import '@/assets/tailwind.css'
import axios from 'axios'
import 'flowbite';
axios.defaults.baseURL = process.env.VUE_APP_BACKEND;
Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
