import baseAPI from "./axiosHandle.js";
import { defineStore } from "pinia";
export const ticketStore = defineStore("tickets", {
  state: () => ({
    tickets: [],
    httpRequest: "",
  }),
  actions: {
    
    async getDataTickets() {
      await baseAPI
        .get("/tickets")
        .then((response) => {
          this.tickets = response.data.data;
        })
        .catch((error) => console.log(error));
      return this.tickets;
    },
  },
});
