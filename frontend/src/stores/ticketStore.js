import axios from "axios";
import { defineStore } from "pinia";
import baseAPI from "./axiosHandle";

export const ticketStore = defineStore('categories',{
    state: () => ({
        tickets: [],
        httpRequest: '',
        ticketCode: null
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
        generateTicketCode() {
          const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
          let code = "";
          for (let i = 0; i < 8; i++) {
            code += chars.charAt(Math.floor(Math.random() * chars.length));
          }
          return code;
        },
        async createTicket(userId, eventId){
          // const {userId, eventId} = payload;
          const bookingDate = new Date().toISOString().substring(0, 10); 
          const ticketData = {
            ticket_code: this.generateTicketCode(),
            booking_date: bookingDate,
            is_check_in: 0,
            user_id: userId,
            event_id: eventId,
          };
          try {
            const response = await baseAPI.post("/create/tickets", ticketData);
            if (response.status === 200) {
              this.ticketCode = ticketData.ticket_code;
              return true;
            }
          } catch (error) {
            console.log(error);
          }
          return false;
        },
    }

})