import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
import BookingView from "../views/booking/BookingView.vue";
import paymentDialugue from "../components/forms/paymentForm.vue";
import ExplorePage from "../views/explore/explorePageView.vue";

import DashboardOrganizer from "../views/dashboard/DashboardOrganizer.vue";
import DashboardEventPreview from "../views/dashboard/DashboardEventPreview.vue";
import DetailPage from "../views/detail/DetailView.vue";

import DashboardEvent from "../views/dashboard/DashboardEvent.vue";
import TicketView from "../views/ticket/TicketView.vue";
import NotificationView from "../views/notifications/NotificationView.vue";

const routes = [
  {
    path: "/",
    name: "home",
    component: HomePage,
  },
  {
    path: "/explor",
    name: "explor",
    component: ExplorePage,
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
    path: "/booking/:id",
    name: "booking",
    component: BookingView,
  },
  {
    path: "/payment",
    name: "payment",
    component: paymentDialugue,
  },
  {
    path: "/explore",
    name: "explore",
    component: ExplorePage,
  },
  {
    path: "/detail/:id",
    name: "detail",
    component: DetailPage,
    props: true,
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
    path: "/tickets",
    name: "tickets",
    component: TicketView,
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
