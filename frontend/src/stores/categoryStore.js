import axios from "axios";
import { defineStore } from "pinia";
import { axiosStore } from "./axiosHandle";
const httpRequest = axiosStore.api;
const categoryStore = defineStore('categories',{
    state: () => ({
        categories: [],
        httpRequest: ''
    }),
    actions: {
        async getDataCategories() {
          await axios
            .get(httpRequest+"/categories")
            .then((response) => {
              this.categories = response.data.data;
            })
            .catch((error) => console.log(error));
          return this.categories;
        },
    }
})
export default categoryStore;