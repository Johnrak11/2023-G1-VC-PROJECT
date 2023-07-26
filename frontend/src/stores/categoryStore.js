import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";

export const categoryStore = defineStore("categories", {
  state: () => ({
    categories: [],
    categoriesItem: [],
  }),
  actions: {
    async getDataCategories() {
      await baseAPI
        .get("/categories")
        .then((response) => {
          let categoriesResponse = response.data.data;
          this.categories = categoriesResponse;
          for (let item of categoriesResponse) {
            this.categoriesItem.push(item.name);
          }
        })
        .catch((error) => console.log(error));
    },
  },
});
