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
        .get(this.httpRequest+"/eventsNotDeadline")
        .then((response) => {
          this.events=response.data.data;
          console.log(response.data)
        }).catch(error => console.log(error));
        return this.events;
    },
  },
});
export default eventStores;
