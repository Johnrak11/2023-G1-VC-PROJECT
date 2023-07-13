import axios from "axios";
import { defineStore } from "pinia";
const eventStores = defineStore("event", {
  state: () => ({
    events: [],
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
        .get("http://127.0.0.1:8000/api/eventsNotDeadline")
        .then((response) => {
          this.events = response.data.data;
          console.log(response.data);
        })
        .catch((error) => console.log(error));
      return this.events;
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
