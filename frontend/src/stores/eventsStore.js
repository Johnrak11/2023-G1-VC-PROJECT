import axios from "axios";
import { defineStore } from "pinia";
const eventStores = defineStore("event", {
  state: () => ({
    events: [],
    reletedEvent: []
  }),
  gatters: {
    showEvents() {
      return this.events.filter((event) => event.name);
    },
  },
  actions: {
    async getDataAxios() {
      await axios
        .get("http://127.0.0.1:8000/api/events/")
        .then((response) => {
          this.events = response.data.data;
          console.log(response.data)
        }).catch(error => console.log(error));
      return this.events;
    },

    async getDataCategoryAxios(categoryId, eventId) {
      await axios
        .get(`http://127.0.0.1:8000/api/events/category/${categoryId}/${eventId}`)
        .then((response) => {
          this.reletedEvent = response.data.data
          console.log('Event',this.reletedEvent)
        }).catch(error => console.log(error));
    },
  },
});
export default eventStores;
