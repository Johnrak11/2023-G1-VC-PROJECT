import { defineStore } from "pinia";
import axios from "axios";
import Swal from "sweetalert2";
import { sessionStore } from "./session.js";
export const addressStore = defineStore("address", {
  state: () => ({
    address: "",
    loading: false,
    isDenied: false,
    latitude: null,
    longitude: null,
    isFresh: false,
  }),
  getters: {},
  actions: {
    getUserCurrentLatLng() {
      const { setSession } = sessionStore();
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            setSession("latitude", position.coords.latitude);
            setSession("longitude", position.coords.longitude);
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

    locaterButtonPressed() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          (position) => {
            this.isFresh = false;
            this.latitude = position.coords.latitude;
            this.longitude = position.coords.longitude;
            this.getAddress(
              position.coords.latitude,
              position.coords.longitude
            );
          },
          (error) => {
            this.isDenied = true;
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

    formatDistance(distance) {
      if (distance >= 1) {
        const roundedDistance = Math.round(distance * 10) / 10;
        return `${roundedDistance} km`;
      } else {
        const meters = Math.round(distance * 1000);
        return `${meters} m`;
      }
    },

    // Reference : https://www.geeksforgeeks.org/program-distance-two-points-earth/
    distance(lat1, lat2, lon1, lon2) {
      // The math module contains a function
      // named toRadians which converts from
      // degrees to radians.
      lon1 = (lon1 * Math.PI) / 180;
      lon2 = (lon2 * Math.PI) / 180;
      lat1 = (lat1 * Math.PI) / 180;
      lat2 = (lat2 * Math.PI) / 180;

      // Haversine formula
      let dlon = lon2 - lon1;
      let dlat = lat2 - lat1;
      let a =
        Math.pow(Math.sin(dlat / 2), 2) +
        Math.cos(lat1) * Math.cos(lat2) * Math.pow(Math.sin(dlon / 2), 2);

      let c = 2 * Math.asin(Math.sqrt(a));

      // Radius of earth in kilometers. Use 3956
      // for miles
      let r = 6371;

      // calculate the result
      return c * r;
    },
  },
});
