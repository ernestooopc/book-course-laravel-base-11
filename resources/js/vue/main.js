import { createApp } from "vue";
import App from "./App.vue"
import Oruga from '@oruga-ui/oruga-next'
import '@oruga-ui/theme-oruga/dist/oruga.css'
import axios from "axios";
import '@mdi/font/css/materialdesignicons.min.css';



const app = createApp(App);
app.use(Oruga)
app.config.globalProperties.$axios  = axios
window.axios = axios
app.mount("#app")
