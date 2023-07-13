import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
// import ExplorePage from "../views/explore/explorePageView.vue";
import DetailPage from "../views/detail/DetailView.vue";
import DashboardOrganizer from "../views/dashboard/DashboardOrganizer.vue";
import DashboardEventPreview from "../views/dashboard/DashboardEventPreview.vue";
import DetailPage from "../views/detail/DetailView.vue"


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
    path: "/dashboard/event",
    name: "event",
    component: DashboardEvent,
  },
  {
    path: "/dashboard/preview",
    name: "eventPreview",
    component: DashboardEventPreview,
  },
  // {
  //   path: "/dashboard/event/create",
  //   name: "createEvent",
  //   component: DashboardEventPreview,
  // },
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
