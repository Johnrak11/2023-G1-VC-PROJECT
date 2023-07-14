import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";
import axios from "axios";
export const eventStores = defineStore("event", {
  state: () => ({
    events: [],
    reletedEvent: [],
    localHttp: "http://172.16.0.143:8080",
    pagination: { currentPage: 1, lastPage: 5, links: [] },
  }),
  gatters: {
    showEvents() {
      return this.events.filter((event) => event.name);
    },
  },
  actions: {
    async getDataAxios() {
      await baseAPI
        .get("/events")
        .then((response) => {
          let responeseData = response.data.data;
          console.log(responeseData);
          this.events = responeseData.data;
          this.pagination.currentPage = responeseData.current_page;
          this.pagination.lastPage = responeseData.last_page;
          this.pagination.links = responeseData.links;
        })
        .catch((error) => console.log(error));
      return this.events;
    },
    async getPaginationData() {
      let linkPage = this.pagination.links[this.pagination.currentPage].url;
      await axios
        .get(linkPage)
        .then((response) => {
          let responeseData = response.data.data;
          console.log(responeseData);
          this.events = responeseData.data;
          this.pagination.currentPage = responeseData.current_page;
          this.pagination.lastPage = responeseData.last_page;
          this.pagination.links = responeseData.links;
        })
        .catch((error) => console.log(error));
      return this.events;
    },

    async getDataCategoryAxios(categoryId, eventId) {
      await baseAPI
        .get(`/events/category/${categoryId}/${eventId}`)
        .then((response) => {
          this.reletedEvent = response.data.data;
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
        })
        .catch((error) => console.log(error));
    },
    async getEventPrice(eventId) {
      await baseAPI
        .get(`eventDetail/${eventId}`)
        .then((response) => {
          this.events = response.data.data;
          console.log(this.events);
        })
        .catch((error) => console.log(error));
    },
  },
});
