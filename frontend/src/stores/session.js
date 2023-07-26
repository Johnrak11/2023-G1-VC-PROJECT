import { defineStore } from "pinia";
export const sessionStore = defineStore("session", {
  state: () => ({}),
  actions: {
    setSession(name, value) {
      sessionStorage.setItem(name, JSON.stringify(value));
    },
    getSession(name) {
      const sessionData = sessionStorage.getItem(name);
      if (sessionData !== null) {
        try {
          return JSON.parse(sessionData);
        } catch (error) {
          console.error("Error parsing session data:", error);
        }
      }
      return null;
    },
    removeSession(name) {
      sessionStorage.removeItem(name);
    },
  },
});
