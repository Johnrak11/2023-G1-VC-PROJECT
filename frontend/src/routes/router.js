import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
import DashboardOrganizer from "../views/dashboard/DashboardOrganizer.vue"
import CardDashboard from "../views/dashboard/DashboardOrganizer.vue"
import DashboardEvent from "../views/dashboard/DashboardEvent.vue"

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
    path: "/dashboard",
    name: "dashboard",
    component: DashboardOrganizer,
  },
  {
    path: "/dashboard/dashboards",
    name: "dashboards",
    component: CardDashboard,
  },
  {
    path: "/events",
    name: "events",
    component: DashboardEvent,
  },
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
