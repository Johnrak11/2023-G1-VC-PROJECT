import { defineStore } from "pinia";
import axios from "axios";
import Swal from "sweetalert2";
export const addressStore = defineStore("address", {
  state: () => ({
    address: "",
    loading: false,
  }),
  getters: {},
  actions: {
    locaterButtonPressed() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            this.getAddress(
              position.coords.latitude,
              position.coords.longitude
            );
          },
          (error) => {
            console.log(error.message);
            this.isConfirmed("warning", "Please turn on the location");
          }
        );
      } else {
        console.log("Your browser does not support geolocation");
      }
    },
    getAddress(lat, lng) {
      this.loading = true;
      console.log(lat, lng);
      const apiUrl = `https://api.geoapify.com/v1/geocode/reverse?lat=${lat}&lon=${lng}&apiKey=9a47333d4051458d9442f2e5538ce2cd`;
      axios
        .get(apiUrl)
        .then((response) => {
          this.address = response.data.features[0].properties.formatted;
          console.log(this.address);
          this.loading = false;
        })
        .catch((error) => console.log(error));
    },
    isConfirmed(icon, message) {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-start",
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
