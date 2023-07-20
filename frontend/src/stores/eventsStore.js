import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";
export const eventStores = defineStore("event", {
  state: () => ({
    isLoader : true,
    events: [],
    reletedEvent: [],
    localHttp: "http://172.16.0.143:8080",
    pagination: { currentPage: 1, lastPage: 5, links: [], totalPage: 1 },
  }),
  gatters: {
    showEvents() {
      return this.events.filter((event) => event.name);
    },
  },
  actions: {
    async getDataAxios() {
      this.isLoader = true
      await baseAPI
        .get("/events")
        .then((response) => {
          let responeseData = response.data.data;
          // console.log(responeseData);
          this.events = responeseData.data;
          this.pagination.currentPage = responeseData.current_page;
          this.pagination.lastPage = responeseData.last_page;
          this.pagination.links = responeseData.links;
          // this.isLoader = false
        })
        .catch((error) => console.log(error));
      return this.events;
    },

    async getPaginationData(pageNumber) {
      if (history.pushState) {
        var newurl =
          window.location.protocol +
          "//" +
          window.location.host +
          window.location.pathname +
          "?page=" +
          pageNumber;
        this.pagination.currentPage;
        window.history.pushState({ path: newurl }, "", newurl);
      }
      var element = document.getElementById("nav-scroll");
      element.scrollIntoView({ behavior: "smooth" });
      await baseAPI
        .get(`/events?page=${pageNumber}`)
        .then((response) => {
          let responeseData = response.data.data;
          // console.log(responeseData);
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
        .get(`/eventDetail/${eventId}`)
        .then((response) => {
          this.eventDetail = response.data.data;
          console.log(this.eventDetail);
        })
        .catch((error) => console.log(error));
    },
  },
});
