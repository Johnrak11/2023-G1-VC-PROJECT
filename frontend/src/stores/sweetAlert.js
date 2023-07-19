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

    publicAlert(eventId) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to delete this post!",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Public",
      }).then((result) => {
        if (result.isConfirmed) {
          console.log(eventId);
        }
      });
    },
  },
});
