import { createRouter, createWebHistory } from "vue-router";
import RegisterForm from "../views/register/RegisterForm.vue";
import HomePage from "../views/home/HomeView.vue";
import LoginForm from "../views/login/loginView.vue";
import BookingView from "../views/booking/BookingView.vue";
import ExplorePage from "../views/explore/explorePageView.vue";
import ListMapView from "../views/listMap/ListMapView.vue";
// import DashboardOrganizer from "../views/dashboard/orgznizerInfor/DashboardOrganizer.vue";
import DashboardEventPreview from "../views/dashboard/eventPreview/DashboardEventPreview.vue";
import DetailPage from "../views/detail/DetailView.vue";
import RedirectPage from "../views/detail/RedirectPage.vue";
import ScanPage from "../views/scanAttendee/ScanPage.vue";

import DashboardEvent from "../views/dashboard/eventPosted/DashboardEventPosted.vue";
import TicketView from "../views/ticket/TicketView.vue";
import NotificationView from "../views/notifications/NotificationView.vue";
import Attendee from "@/views/dashboard/attendee/attendeeView.vue";
import ProfileView from "../views/profile/ProfileView.vue";

import { sessionStore } from "@/stores/session.js";
import { cookieStore } from "@/stores/cookies.js";
import { sweetAlert } from "@/stores/sweetAlert.js";

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

function scanAuthenticateBeforeEnter() {
  return function (to, from, next) {
    const { getCookie } = cookieStore();
    if (getCookie("token")) {
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

function listMapBeforeEnter() {
  return function (to, from, next) {
    const { alertMessage } = sweetAlert();
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          console.log(position);
          next();
        },
        (error) => {
          console.log(error);
          alertMessage(
            "warning",
            "Please enable location services to allow this feature to work."
          );
        }
      );
    } else {
      console.log("Your browser does not support geolocation");
    }
  };
}

import ManagermentEvent from "../views/admin/ManagermentEvent.vue";
import ListUsers from "../views/admin/user/ListUsers.vue";

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
    path: "/listMap",
    name: "listMap",
    component: ListMapView,
    beforeEnter: [listMapBeforeEnter()],
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
    beforeEnter: [authenticateBeforeEnter()],
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
    path: "/tickets",
    name: "tickets",
    component: TicketView,
    beforeEnter: [authenticateBeforeEnter()],
  },
  {
    path: "/notifications",
    name: "notifications",
    component: NotificationView,
    beforeEnter: [authenticateBeforeEnter()],
  },
  {
    path: "/dashboard/event",
    name: "eventPosted",
    component: DashboardEvent,
    beforeEnter: [
      authenticateBeforeEnter(),
      roleBeforeEnter(["organizer", "admin"]),
    ],
  },
  {
    path: "/dashboard/preview",
    name: "eventPreview",
    component: DashboardEventPreview,
    beforeEnter: [
      authenticateBeforeEnter(),
      roleBeforeEnter(["organizer", "admin"]),
    ],
  },
  {
    path: "/dashboard/attendees/:eventId",
    name: "attendees",
    component: Attendee,
    props: true,
    beforeEnter: [
      authenticateBeforeEnter(),
      roleBeforeEnter(["organizer", "admin"]),
    ],
  },
  {
    path: "/dashboard/event/delete",
    name: "deleteEvent",
    component: ManagermentEvent,
    beforeEnter: [authenticateBeforeEnter(), roleBeforeEnter(["admin"])],
  },
  {
    path: "/dashboard/listUsers",
    name: "List users",
    component: ListUsers,
    beforeEnter: [authenticateBeforeEnter(), roleBeforeEnter(["admin"])],
  },
  {
    path: "/tickets/scan/:eventId",
    name: "scan",
    component: ScanPage,
    props: true,
    beforeEnter: [scanAuthenticateBeforeEnter()],
  },
  {
    path: "/profile",
    name: "profile",
    component: ProfileView,
    props: true,
    // beforeEnter: [scanAuthenticateBeforeEnter()],
  },
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});

router.beforeEach((to, from, next) => {
  document.title = to.name;
  next();
});

export default router;
