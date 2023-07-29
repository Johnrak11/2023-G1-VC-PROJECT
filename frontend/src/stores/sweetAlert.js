import { defineStore } from "pinia";
import Swal from "sweetalert2";
import { eventStores } from "@/stores/eventsStore.js";
import { eventPreviewStores } from "./eventPreview.js";
export const sweetAlert = defineStore("alert", {
  state: () => ({}),
  gatters: {},
  actions: {
    successDelete() {
      Swal.fire("Deleted!", "Your event card has been deleted.", "success");
    },
    unSuccessDelete() {
      Swal.fire(
        "Error!",
        "An error occurred while deleting the event card.",
        "error"
      );
    },

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
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Public",
      }).then((result) => {
        if (result.isConfirmed) {
          const { postPreviewEvent } = eventPreviewStores();
          postPreviewEvent(eventId, 1);
        }
      });
    },

    deleteEventAlert(eventId) {
      const {getOrganizerEvent}  =  eventPreviewStores()
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to undo this post!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#d33",
        confirmButtonColor: "#3085d6",
        confirmButtonText: "Yes Delete",
      }).then((result) => {
        if (result.isConfirmed) {
          const { deleteEvent } = eventStores();
          deleteEvent(eventId);
          getOrganizerEvent(0)
          return true;
        }else{
          return false;
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
