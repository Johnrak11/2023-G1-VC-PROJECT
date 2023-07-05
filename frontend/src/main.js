// import { createApp } from 'vue'
// import App from './App.vue'
// import router from './router'
// import vuetify from './plugins/vuetify'
// import { loadFonts } from './plugins/webfontloader'

// loadFonts()

// createApp(App)
//   .use(router)
//   .use(vuetify)
//   .mount('#app')
import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import vue3GoogleLogin from "vue3-google-login";
import vuetify from "./plugins/vuetify";

const CLIENT_ID =
  "789674566579-4bjsq9dlf9gknuq2omokd04bd2ioi96l.apps.googleusercontent.com";
const app = createApp(App);
app.use(vue3GoogleLogin, {
  clientId: CLIENT_ID,
});
app.use(router);
app.use(vuetify)
app.mount("#app");
