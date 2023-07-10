import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
import BookingView from "../views/booking/BookingView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomePage,
  },
  {
    path: "/register",
    name: "register",
    component: RegisterForm,
  },
  {
    path: "/login",
    name: "login",
    component: LoginForm,
  },
  {
    path: "/booking",
    name: "booking",
    component: BookingView
  }
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
