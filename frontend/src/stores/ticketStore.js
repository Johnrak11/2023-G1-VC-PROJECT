import { defineStore } from "pinia";
import baseAPI from "./axiosHandle";
import router from "@/routes/router.js";
export const ticketStore = defineStore("categories", {
  state: () => ({
    tickets: [],
    isRegister: null,
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
    generateTicketCode() {
      const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
      let code = "";
      for (let i = 0; i < 8; i++) {
        code += chars.charAt(Math.floor(Math.random() * chars.length));
      }
      return code;
    },
    async searchTickets(name) {
      await baseAPI
        .get(`/tickets/search/${name}`)
        .then((response) => {
          this.tickets = response.data.data;
          console.log(response.data.data);
        })
        .catch((error) => console.log(error));
    },

    async isBooked(eventId) {
      await baseAPI
        .get(`/tickets/isBooked/${eventId}`)
        .then((response) => {
          console.log(response.data.data);
          this.isRegister = false;
        })
        .catch((error) => {
          this.isRegister = true;
          console.log(error);
        });
    },

    async createTicket(eventId) {
      const bookingDate = new Date().toISOString().substring(0, 10);
      const ticketData = {
        ticket_code: this.generateTicketCode(),
        booking_date: bookingDate,
        is_check_in: 0,
        event_id: eventId,
      };
      try {
        const response = await baseAPI.post("/tickets", ticketData);
        if (response.status === 200) {
          console.log(response.data);
          this.tickets = response.data.data;
          router.push("/tickets");
        }
      } catch (error) {
        console.log(error);
      }
    },
  },
});
