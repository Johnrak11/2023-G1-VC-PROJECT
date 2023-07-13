import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";

export const categoryStore = defineStore("categories", {
  state: () => ({
    categories: [],
  }),
  actions: {
    async getDataCategories() {
      await baseAPI
        .get("/categories")
        .then((response) => {
          this.categories = response.data.data;
        })
        .catch((error) => console.log(error));
    },
  },
});
