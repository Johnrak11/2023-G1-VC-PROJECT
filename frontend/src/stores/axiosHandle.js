import { defineStore } from "pinia";
export const axiosStore = defineStore("axios", {
  state: () => ({
    api: 'http://127.0.0.1:8000/api',
  }),
});
