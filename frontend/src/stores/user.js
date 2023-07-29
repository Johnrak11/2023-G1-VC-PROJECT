import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";
import { cookieStore } from "./cookies.js";
import { sessionStore } from "./session.js";

export const userStore = defineStore("user", {
  state: () => ({
    userId: "",
    user: {},
    users: [],
    token: "",
  }),
  actions: {
    async getUserInfor() {
      const { setSession, getSession } = sessionStore();
      await baseAPI
        .get("/auth/user")
        .then((response) => {
          const loginHandle = response.data;
          if (loginHandle.success) {
            this.user = loginHandle.user;
            setSession("role", this.user.role);
            console.log(getSession("role"));
          }
        })
        .catch((error) => console.log(error));
    },

    async logout() {
      const { removeSession } = sessionStore();
      const { removeCookie } = cookieStore();
      await baseAPI
        .post("/auth/logout", null)
        .then((response) => {
          const logoutHandle = response.data;
          if (logoutHandle.success) {
            removeCookie("token");
            removeSession("role");
            this.token = "";
            console.log("success");
          }
        })
        .catch((error) => console.log(error.response.data.message));
    },
    async getAllUsers() {
      await baseAPI
        .get("/users")
        .then((response) => {
          this.users = response.data.data;
        })
        .catch((error) => console.log(error));
    },

    async searchUsers(search) {
      await baseAPI.get("/admin/search/users", {
          params: {
            email: search,
          },
        }).then((response) => {
          this.users = response.data.data.data
          console.log(response.data.data.data) ;
        }).catch((error) => console.log(error));
    },
  },
});
