import { defineStore } from "pinia";
import Swal from "sweetalert2";
export const sweetAlert = defineStore("alert", {
  state: () => ({}),
  gatters: {},
  actions: {
    alertMessage(incon, message) {
      Swal.fire({
        position: "center",
        icon: incon,
        title: message,
        showConfirmButton: false,
        timer: 1000,
      });
    },
  },
});
