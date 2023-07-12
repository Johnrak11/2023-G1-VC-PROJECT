import { defineStore } from "pinia";
import axios from "axios";
export const userStore = defineStore("user", {
  state: () => ({
    user: {},
    token: "",
    httpRequest: "",
  }),
  actions: {
    storeTokenInCookie() {
      const date = new Date();
      date.setTime(date.getTime() + 30 * 24 * 60 * 60 * 1000);
      const expires = `expires=${date.toUTCString()}`;
      document.cookie = `${"token"}=${this.token}; ${expires}; path=/`;
    },
    getTokenInCookie(name) {
      const cookies = document.cookie.split("; ");
      for (const cookie of cookies) {
        const [cookieName, cookieValue] = cookie.split("=");
        if (cookieName === name) {
          this.token = cookieValue;
          return cookieValue;
        }
      }
      return "";
    },
    removeTokenInCookie(name) {
      document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
      this.token = null;
    },
    async getUserInfor() {
      await axios
        .get(this.httpRequest + "/auth/user", {
          headers: { Authorization: `Bearer ${this.token}` },
        })
        .then((response) => {
          const logoutHandle = response.data;
          if (logoutHandle.success) {
            this.user = logoutHandle.user;
            console.log(this.user);
          }
        })
        .catch((error) => console.log(error));
    },

    async logout() {
      await axios
        .post(this.httpRequest + "/auth/logout", null, {
          headers: { Authorization: `Bearer ${this.token}` },
        })
        .then((response) => {
          const logoutHandle = response.data;
          if (logoutHandle.success) {
            this.removeTokenInCookie("token");
            console.log("success");
          }
        })
        .catch((error) => console.log(error.response.data.message));
    },
  },
});
