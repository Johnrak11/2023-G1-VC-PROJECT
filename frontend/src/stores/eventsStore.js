import axios from "axios";
import { defineStore } from "pinia";
const eventStores = defineStore("event", {
  state: () => ({
    events: [],
    reletedEvent: [],
    httpRequest: "",
  }),
  gatters: {
    showEvents() {
      return this.events.filter((event) => event.name);
    },
  },
  actions: {
    async getDataAxios() {
      await axios
        .get(this.httpRequest + "/events/")
        .then((response) => {
          this.events = response.data.data;
          console.log(response.data)
        }).catch(error => console.log(error));
      return this.events;
    },

    async getDataCategoryAxios(categoryId, eventId) {
      await axios
        .get(this.httpRequest + `/events/category/${categoryId}/${eventId}`)
        .then((response) => {
          this.reletedEvent = response.data.data
          console.log('Event', this.reletedEvent)
        }).catch(error => console.log(error));
    },

    async searchEvents(name, date, category) {
      await axios.get(
        this.httpRequest +
        `/events/search?name=${name}&date=${date}&category_id=${category}`
      ).then(response => {
        this.events = response.data.data
        console.log(this.events)
      }).catch(error => console.log(error))
    },
  },
});
export default eventStores;
