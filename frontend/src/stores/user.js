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
  },
});
