import { defineStore } from "pinia";
import Swal from "sweetalert2";
import { eventPreviewStores } from "./eventPreview.js";
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
        timer: 2000,
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
          const { postPreviewEvent } = eventPreviewStores();
          postPreviewEvent(eventId, 1);
        }
      });
    },

    isConfirmed(icon, message) {
      console.log(message);
      const Toast = Swal.mixin({
        toast: true,
        position: "top",
        showConfirmButton: false,
        timer: 1800,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener("mouseenter", Swal.stopTimer);
          toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
      });
      Toast.fire({
        icon: icon,
        title: message,
      });
    },
  },
});
