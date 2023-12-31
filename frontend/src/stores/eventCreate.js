import { storage } from "@/firebase";
import {
  ref,
  uploadBytes,
  deleteObject,
  getDownloadURL,
} from "firebase/storage";
import { defineStore } from "pinia";
import baseAPI from "./axiosHandle";
import { eventPreviewStores } from "@/stores/eventPreview.js";
export const eventCreateStores = defineStore("eventCreate", {
  state: () => ({
    eventName: "",
    eventCategories: "",
    eventDate: "",
    eventPoster: "",
    eventDescription: "",
    eventAddress: "",
    eventLongitude: "",
    eventLatitude: "",
    eventVenue: "",

    ticket: {},
    discount: {},
    agendas: [],
    imagePath: "",
    isLoadingDialog: false,
    imagePreview: "https://placehold.co/600x400/png",
    isSubmit: false,
    isCreate: false,
  }),
  getters: {},
  actions: {
    async fireUploadImage(file) {
      if (this.eventPoster != "") {
        this.fireDeleteImage();
      }
      this.isLoadingDialog = true;
      const imageName = this.generateRandomName(file);
      const storageRef = ref(storage, `event/${imageName}`);

      try {
        await uploadBytes(storageRef, file);
        const downloadURL = await getDownloadURL(storageRef);
        this.eventPoster = downloadURL;
        this.imagePath = storageRef.fullPath;
        this.imagePreview = downloadURL;
        this.isLoadingDialog = false;
      } catch (error) {
        console.error("Error uploading image:", error);
        this.isLoadingDialog = false;
      }
    },
    generateRandomName(file) {
      const timestamp = new Date().getTime();
      const extension = file.name.split(".").pop();
      const randomString = Math.random().toString(36).substring(2, 8);
      const uniqueName = `${randomString}_${timestamp}.${extension}`;
      return uniqueName;
    },

    async fireDeleteImage() {
      const imageRef = ref(storage, this.imagePath);
      try {
        await deleteObject(imageRef);
        this.imagePreview = "https://placehold.co/600x400/png";
        this.eventPoster = "";
        console.log("deleted");
      } catch (error) {
        console.error("Error deleting image:", error);
      }
    },
    formatDate(date) {
      const options = {
        year: "numeric",
        month: "2-digit",
        day: "2-digit",
        hour: "2-digit",
        minute: "2-digit",
      };

      const formattedDate = new Date(date).toLocaleString("en-US", options);
      return formattedDate.replace(",", "");
    },

    datebaseFormatDate(inputDate) {
      const date = new Date(inputDate);
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, "0");
      const day = String(date.getDate()).padStart(2, "0");
      const hours = String(date.getHours()).padStart(2, "0");
      const minutes = String(date.getMinutes()).padStart(2, "0");
      const seconds = String(date.getSeconds()).padStart(2, "0");
      const formattedDate = `${year}-${month}-${day}`;
      const formattedTime = `${hours}:${minutes}:${seconds}`;
      return `${formattedDate} ${formattedTime}`;
    },

    async createEvent() {
      const { getOrganizerEvent } = eventPreviewStores();
      this.isCreate = true;
      let dateTimeFormat = this.convertDateTimeFormat(this.eventDate);
      let newEvent = {
        name: this.eventName,
        description: this.eventDescription,
        date: dateTimeFormat[0],
        time: dateTimeFormat[1],
        location: this.eventAddress,
        longitude: this.eventLongitude,
        latitude: this.eventLatitude,
        image: this.eventPoster,
        category_id: this.eventCategories,
        venue: this.eventVenue,
      };
      let createRequest = {
        event: newEvent,
        ticket: this.ticket,
        discount: this.discount,
        agendas: this.agendas,
      };
      await baseAPI
        .post("/events", createRequest)
        .then((response) => {
          console.log(response);
          getOrganizerEvent(0);
          this.isCreate = false;
        })
        .catch((error) => {
          console.log(error);
          this.isCreate = false;
        });
    },

    convertDateTimeFormat(inputDate) {
      const date = new Date(inputDate);
      const year = date.getFullYear();
      const month = String(date.getMonth() + 1).padStart(2, "0");
      const day = String(date.getDate()).padStart(2, "0");
      const hours = String(date.getHours()).padStart(2, "0");
      const minutes = String(date.getMinutes()).padStart(2, "0");
      const seconds = String(date.getSeconds()).padStart(2, "0");
      const formattedDate = `${year}-${month}-${day}`;
      const formattedTime = `${hours}:${minutes}:${seconds}`;
      return [formattedDate, formattedTime];
    },

    truncateDescription(description, textLength) {
      const maxLength = textLength; // Maximum characters to display
      if (description.length <= maxLength) {
        return description;
      } else {
        return description.substring(0, maxLength) + "...";
      }
    },
  },
});
