import { defineStore } from "pinia";
export const axiosStore = defineStore("axios", {
  state: () => ({
    api: 'http://localhost:8000/api',
  }),
});
