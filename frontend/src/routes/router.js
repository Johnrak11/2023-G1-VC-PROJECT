import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
import ExplorePage from "../views/explore/explorePageView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomePage,
  },
  {
    path: "/register",
    name: "register",
    props: true,
    component: RegisterForm,
  },
  {
    path: "/login",
    name: "login",
    component: LoginForm,
  },
  {
    path: "/explore",
    name: "explore",
    component: ExplorePage,
  },
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
