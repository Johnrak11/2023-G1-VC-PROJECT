import { defineStore } from "pinia";
// import Cookies from "js-cookie";

export const userStore = defineStore("user", {
  state: () => ({
    user: {},
    token: "",
  }),
  actions: {
    storeTokenInCookie() {
      const date = new Date();
      date.setTime(date.getTime() + 30 * 24 * 60 * 60 * 1000);
      const expires = `expires=${date.toUTCString()}`;
      document.cookie = `${"token"}=${this.token}; ${expires}; path=/`;
    },
    getCookie(name) {
      const cookies = document.cookie.split("; ");
      for (const cookie of cookies) {
        const [cookieName, cookieValue] = cookie.split("=");
        if (cookieName === name) {
          return cookieValue;
        }
      }
      return "";
    },
    removeCookie(name) {
      document.cookie = `${name}=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;`;
    },
  },
});
