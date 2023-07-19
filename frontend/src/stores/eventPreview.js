import { defineStore } from "pinia";
import baseAPI from "./axiosHandle";
import { sweetAlert } from "./sweetAlert.js";
export const eventPreviewStores = defineStore("eventPreview", {
  state: () => ({
    eventsPreviews: [],
    pagination: { currentPage: 1, lastPage: 5, links: [], totalPage: 1 },
  }),
  getters: {},
  actions: {
    async getPreviewEvent() {
      await baseAPI
        .get("/events/previews")
        .then((response) => {
          let responeseData = response.data.data;
          console.log(responeseData);
          this.eventsPreviews = responeseData.data;
          this.pagination.currentPage = responeseData.current_page;
          this.pagination.lastPage = responeseData.last_page;
          this.pagination.links = responeseData.links;
        })
        .catch((error) => console.log(error));
      return this.eventsPreviews;
    },

    async postPreviewEvent(eventId, isPublic) {
      const { isConfirmed } = sweetAlert();
      await baseAPI
        .put(`/events/previews/${eventId}/${isPublic}`)
        .then((response) => {
          let responeseData = response.data;
          this.getPreviewEvent();
          isConfirmed("success", responeseData.message);
        })
        .catch((error) => {
          let errorResponse = error.response.data;
          isConfirmed("error", errorResponse.message);
        });
    },
  },
});
