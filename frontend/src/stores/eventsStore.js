import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";

export const eventStores = defineStore("event", {
  state: () => ({
    events: [],
    reletedEvent: [],
    localHttp: "http://172.16.0.143:8080",
  }),
  gatters: {
    showEvents() {
      return this.events.filter((event) => event.name);
    },
  },
  actions: {
    async getDataAxios() {
      await baseAPI
        .get("/events/")
        .then((response) => {
          this.events = response.data.data;
          console.log(response.data);
        })
        .catch((error) => console.log(error));
      return this.events;
    },

    async getDataCategoryAxios(categoryId, eventId) {
      await baseAPI
        .get(`/events/category/${categoryId}/${eventId}`)
        .then((response) => {
          this.reletedEvent = response.data.data;
          console.log("Event", this.reletedEvent);
        })
        .catch((error) => console.log(error));
    },

    async searchEvents(name, date, category) {
      await baseAPI
        .get(
          `/search/customer/events?name=${name}&date=${date}&category_id=${category}`
        )
        .then((response) => {
          this.events = response.data.data;
          console.log(this.events);
        })
        .catch((error) => console.log(error));
    },
    async getEventPrice(eventId) {
      await baseAPI
        .get(
          `eventDetail/${eventId}`
        )
        .then((response) => {
          this.events = response.data.data;
          console.log(this.events);
        })
        .catch((error) => console.log(error));
    },
  },
});
