import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";
import { sweetAlert } from "./sweetAlert.js";
export const eventStores = defineStore("event", {
  state: () => ({
    isLoader: true,
    events: [],
    recommendEvent: [],
    recommendEventLimit: [],
    reletedEvent: [],
    localHttp: "http://172.16.0.187:8080",
    localHttpScan: "http://localhost:8080",
    pagination: { currentPage: 1, lastPage: 5, links: [], totalPage: 1 },
    isSearch: false,
    errorMessage: "",
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
          this.events = responeseData.data;
          this.pagination.currentPage = responeseData.current_page;
          this.pagination.lastPage = responeseData.last_page;
          this.pagination.links = responeseData.links;
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
          this.events = responeseData.data;
          this.pagination.currentPage = responeseData.current_page;
          this.pagination.lastPage = responeseData.last_page;
          this.pagination.links = responeseData.links;
        })
        .catch((error) => console.log(error));
      return this.events;
    },

    async getRecommendEvent(lat, lng, km) {
      await baseAPI
        .get(`/events/recommend/${lat}/${lng}/${km}`)
        .then((response) => {
          let responseData = response.data;
          this.recommendEvent = responseData;
          if (responseData.length > 8) {
            console.log(responseData.length);
            this.recommendEventLimit = responseData.slice(0, 8);
          } else {
            this.recommendEventLimit = responseData;
          }
        })
        .catch((error) => console.log(error));
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
      this.isSearch = true;
      console.log(name, date, category);
      await baseAPI
        .get(
          `/search/customer/events?name=${name}&date=${date}&category_id=${category}`
        )
        .then((response) => {
          this.events = response.data.data;
          this.isSearch = false;
          var element = document.getElementById("nav-scroll");
          element.scrollIntoView({ behavior: "smooth" });
        })
        .catch((error) => {
          this.isSearch = false;
          console.log(error);
        });
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

    async searchEventsByAdmin(name, email) {
      this.isSearch = true;
      console.log(name, email);
      await baseAPI
        .get(`/search/admin/searchEvent?name=${name}&email=${email}`)
        .then((response) => {
          this.events = response.data.data;
          this.isSearch = false;
        })
        .catch((error) => {
          this.events = [];
          this.isSearch = false;
          this.errorMessage = error.response.data.message;
        });
    },

    async deleteEvent(eventId) {
      const { unSuccessDelete, successDelete } = sweetAlert();
      await baseAPI
        .delete(`/events/${eventId}`)
        .then((response) => {
          this.getDataAxios();
          console.log(response.data);
          successDelete();
        })
        .catch((error) => {
          console.log(error);
          unSuccessDelete();
        });
    },
  },
});
