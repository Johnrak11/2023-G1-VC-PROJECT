import axios from "axios";
import { defineStore } from "pinia";
const categoryStore = defineStore('categories',{
    state: () => ({
        categories: [],
        httpRequest: ''
    }),
    actions: {
        async getDataCategories() {
          await axios
            .get("http://127.0.0.1:8000/api/categories")
            .then((response) => {
              this.categories = response.data.data;
            })
            .catch((error) => console.log(error));
          return this.categories;
        },
    }
})
export default categoryStore;