// ----- library----
import "animate.css";
import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes/router";
import vuetify from "./plugins/vuetify";
import { loadFonts } from "./plugins/webfontloader";
import vue3GoogleLogin from "vue3-google-login";
// import shareIt from 'vue-share-it';
import VueSocialSharing from 'vue-social-sharing';


import { createPinia } from "pinia";
import VueDatePicker from '@vuepic/vue-datepicker';
import '@vuepic/vue-datepicker/dist/main.css'


// --- components-----

import NavigationBar from "./components/partials/nav/NavigationBar.vue";
import SearchEvent from "./components/partials/base-search/SearchEvent.vue";
import CategoryButton from "./components/partials/category/CategoryButton.vue";
import ListCard from "./components/partials/cards/ListCard.vue";
import PopularEvent from "./components/partials/cards/PopularEvent.vue";
import CardRate from "./components/partials/cards/CardRate.vue";
import FooterView from "./components/partials/footer/FooterView.vue";
import PaginationView from "./components/partials/pagination/PaginationView.vue";
import BannerView from "./components/partials/banner/BannerComponent.vue"

loadFonts();

const pinia = createPinia()
const app = createApp(App);
const CLIENT_ID =
  "789674566579-4bjsq9dlf9gknuq2omokd04bd2ioi96l.apps.googleusercontent.com";

app.use(vue3GoogleLogin, {
  clientId: CLIENT_ID,
});
app.use(pinia);
app.use(router);
app.use(vuetify);
app.use(VueSocialSharing);

app.use(pinia);

app.component("navigation-bar", NavigationBar);
app.component("search-view", SearchEvent);
app.component("category-view", CategoryButton);
app.component("list-card", ListCard);
app.component("popular-event", PopularEvent);
app.component("card-rate", CardRate);
app.component("footer-view", FooterView);
app.component("pagination-view", PaginationView);
app.component("banner-view", BannerView);
app.component("VueDatePicker", VueDatePicker);



app.mount("#app");
