import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
import DetailPage from "../views/detail/DetailView.vue"
// import ExplorePage from "../views/explore/explorePageView.vue";
// import ContainLeftDashboard from "../views/dashboard/ContainLeftDashboard.vue";
import DashboardOrganizer from "../views/dashboard/DashboardOrganizer.vue"
// import CardDashboard from "../components/partials/dashboards/CardDashboard.vue"
// import DashboardEvent from "../components/partials/dashboards/ListCard.vue"
import DashboardEvent from "../views/dashboard/DashboardEvent.vue";
import NotificationView from "../views/notifications/NotificationView.vue"

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
    path: "/detail/:id",
    name: "detail",
    component: DetailPage,
    props: true
  },
  
  {
    path: "/dashboard",
    name: "dashboard",
    component: DashboardOrganizer,
  },
  {
    path: "/events",
    name: "events",
    component: DashboardEvent,
  },
  {
    path: "/notifications",
    name: "notifications",
    component: NotificationView,
  },
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
