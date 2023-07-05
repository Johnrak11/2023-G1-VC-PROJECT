import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import { loadFonts } from './plugins/webfontloader'

import HomeView from './views/Home/HomeView.vue'
import NavigationBar from './components/partials/nav/NavigationBar.vue'
import SearchEvent from './components/partials/base-search/SearchEvent.vue'
import CategoryButton from './components/partials/category/CategoryButton.vue'
import ListCard from './components/partials/cards/ListCard.vue'
import PopularEvent from './components/partials/cards/PopularEvent.vue'
import CardRate from './components/partials/cards/CardRate.vue'
import FooterView from './components/partials/footer/FooterView.vue'
loadFonts()

const app = createApp(App);
app.component('navigation-bar', NavigationBar);
app.component('home-view', HomeView);
app.component('search-view', SearchEvent);
app.component('category-view', CategoryButton);
app.component('list-card', ListCard);
app.component('popular-event', PopularEvent);
app.component('card-rate', CardRate);
app.component('footer-view', FooterView);


app.use(router)
app.use(vuetify)
app.mount('#app')
