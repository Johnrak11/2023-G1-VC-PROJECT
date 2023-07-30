import { defineStore } from "pinia";
import baseAPI from "./axiosHandle";
// import router from "@/routes/router.js";
export const profileStore = defineStore("profile", {
  state: () => ({
    profiles: [],
  }),
  actions: {
    async getDataUser() {
      await baseAPI
        .get(`/profile/users`)
        .then((response) => {
          this.profiles = response.data.data;
          console.log(this.profiles);
        })
        .catch((error) => console.log(error));
      return this.profiles;
    },
  },
});
