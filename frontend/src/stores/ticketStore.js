// import axios from "axios";
import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";
const ticketStore = defineStore('tickets',{
    state: () => ({
        tickets: [],
        httpRequest: ''
    }),
    actions: {
        async getDataTickets() {
          await baseAPI
            .get(`/tickets`)
            .then((response) => {
              this.tickets = response.data.data;
            })
            .catch((error) => console.log(error));
          return this.tickets;
        },
        async searchTickets(user_id, name) {
          await baseAPI
          .get(`/tickets/user_id=${user_id}/name=${name}`)
          .then((response) => {
            this.tickets = response.data.data;
          })
          .catch((error) => console.log(error));
        }
    }
})
export default ticketStore;