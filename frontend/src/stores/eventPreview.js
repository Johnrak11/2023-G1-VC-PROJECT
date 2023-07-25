import { defineStore } from "pinia";
import baseAPI from "./axiosHandle";
import { sweetAlert } from "./sweetAlert.js";
export const eventPreviewStores = defineStore("eventPreview", {
  state: () => ({
    eventPreviews: [],
    eventPosteds: [],
    pagination: { currentPage: 1, lastPage: 5, links: [], totalPage: 1 },
  }),
  getters: {},
  actions: {
    async getOrganizerEvent(isPublic) {
      await baseAPI
        .get(`/events/previews?isPublic=${isPublic}`)
        .then((response) => {
          let responeseData = response.data.data;
          if (isPublic == 0) {
            this.eventPreviews = responeseData.data;
            console.log("eventPreviews", this.eventPreviews);
          } else {
            this.eventPosteds = responeseData.data;
            console.log("eventPosteds", this.eventPosteds);
          }
          this.pagination.currentPage = responeseData.current_page;
          this.pagination.lastPage = responeseData.last_page;
          this.pagination.links = responeseData.links;
        })
        .catch((error) => console.log(error));
    },
    async postPreviewEvent(eventId, isPublic) {
      const { isConfirmed } = sweetAlert();
      await baseAPI
        .put(`/events/previews/${eventId}/${isPublic}`)
        .then((response) => {
          let responeseData = response.data;
          this.getOrganizerEvent(0);
          isConfirmed("success", responeseData.message);
        })
        .catch((error) => {
          let errorResponse = error.response.data;
          isConfirmed("error", errorResponse.message);
        });
    },
  },
});
