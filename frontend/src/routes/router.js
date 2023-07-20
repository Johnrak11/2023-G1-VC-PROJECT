import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
import BookingView from "../views/booking/BookingView.vue";
import ExplorePage from "../views/explore/explorePageView.vue";

import DashboardOrganizer from "../views/dashboard/DashboardOrganizer.vue";
import DashboardEventPreview from "../views/dashboard/DashboardEventPreview.vue";
import DetailPage from "../views/detail/DetailView.vue";
import RedirectPage from "../views/detail/RedirectPage.vue";

import DashboardEvent from "../views/dashboard/DashboardEvent.vue";
import TicketView from "../views/ticket/TicketView.vue";
import NotificationView from "../views/notifications/NotificationView.vue";

import { sessionStore } from "@/stores/session.js";
import { cookieStore } from "@/stores/cookies.js";

function authenticateBeforeEnter() {
  return function (to, from, next) {
    const { getSession } = sessionStore();
    const { getCookie } = cookieStore();
    if (getSession("role") && getCookie("token")) {
      next();
    } else {
      next({ name: "login" });
    }
  };
}

function roleBeforeEnter(listRole) {
  return function (to, from, next) {
    const { getSession } = sessionStore();
    const userRole = getSession("role");
    if (listRole.includes(userRole)) {
      next();
    } else {
      next({ name: "login" });
    }
  };
}

const routes = [
  {
    path: "/",
    name: "home",
    component: HomePage,
  },
  {
    path: "/explore",
    name: "explore",
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
    props: true,
    beforeEnter: authenticateBeforeEnter,
  },
  {
    path: "/detail/:id",
    name: "detail",
    component: DetailPage,
    props: true,
  },
  {
    path: "/eventRaleted/:id",
    name: "eventRelated",
    component: RedirectPage,
    props: true,
  },
  {
    path: "/dashboard",
    name: "dashboard",
    component: DashboardOrganizer,
    beforeEnter: [
      authenticateBeforeEnter,
      roleBeforeEnter(["organizer", "admin"]),
    ],
  },
  {
    path: "/dashboard/event",
    name: "event",
    component: DashboardEvent,
    beforeEnter: [
      authenticateBeforeEnter,
      roleBeforeEnter(["organizer", "admin"]),
    ],
  },
  {
    path: "/tickets",
    name: "tickets",
    component: TicketView,
    beforeEnter: authenticateBeforeEnter,
  },
  {
    path: "/dashboard/preview",
    name: "eventPreview",
    component: DashboardEventPreview,
    beforeEnter: [
      authenticateBeforeEnter,
      roleBeforeEnter(["organizer", "admin"]),
    ],
  },
  {
    path: "/notifications",
    name: "notifications",
    component: NotificationView,
    beforeEnter: authenticateBeforeEnter,
  },
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

export default router;
