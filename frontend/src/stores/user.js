import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";
import { cookieStore } from "./cookies.js";

export const userStore = defineStore("user", {
  state: () => ({
    user: {},
    token: "",
  }),
  actions: {
    async getUserInfor() {
      await baseAPI
        .get("/auth/user")
        .then((response) => {
          const loginHandle = response.data;
          if (loginHandle.success) {
            this.user = loginHandle.user;
          }
        })
        .catch((error) => console.log(error));
    },

    async logout() {
      const { removeCookie } = cookieStore();
      await baseAPI
        .post("/auth/logout", null)
        .then((response) => {
          const logoutHandle = response.data;
          if (logoutHandle.success) {
            removeCookie("token");
            this.token = "";
            console.log("success");
          }
        })
        .catch((error) => console.log(error.response.data.message));
    },
  },
});
