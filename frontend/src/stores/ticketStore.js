import axios from "axios";
import { defineStore } from "pinia";
const ticketStore = defineStore('categories',{
    state: () => ({
        tickets: [],
        httpRequest: ''
    }),
    actions: {
        async getDataTickets() {
          await axios
            .get("http://127.0.0.1:8000/api/tickets")
            .then((response) => {
              this.tickets = response.data.data;
            })
            .catch((error) => console.log(error));
          return this.tickets;
        },
    }
})
export default ticketStore;