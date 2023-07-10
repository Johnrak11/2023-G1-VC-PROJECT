import axios from "axios";
import { defineStore } from "pinia";
const eventStores = defineStore("event", {
  state: () => ({
    events: [],
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
          this.events=response.data.data;
          console.log(response.data)
        }).catch(error => console.log(error));
        return this.events;
    },
  },
});
export default eventStores;
