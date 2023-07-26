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
// import { event } from "jquery";

export const eventEditStores = defineStore("eventEdit", {
  state: () => ({
    eventId: "", // add eventId to store the ID of the event to be edited
    eventEditInfor: {},
    imagePath: "",
    isLoadingDialog: false,
    imagePreview: "https://placehold.co/600x400/png",
    isSubmit: false,
    isEdit: false, // change isCreate to isEdit
  }),
  getters: {},
  actions: {
    async fetchEditEvent(eventId) {
      await baseAPI
        .get(`/events/edits/infor/${eventId}`)
        .then((response) => {
          let handleResponse = response.data;
          this.eventEditInfor = handleResponse.data;
        })
        .catch((error) => console.log(error));
    },

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

    async editEvent() {
      const {getOrganizerEvent} = eventPreviewStores()
      console.log("final submit", this.eventEditInfor);

      // date: dateTimeFormat[0],
      // time: dateTimeFormat[1],
      // let dateTimeFormat = this.convertDateTimeFormat(this.eventDate);

      try {
        const response = await baseAPI.put(
          `/events/update`,
          this.eventEditInfor
        ).then((response) => {
          console.log(response)
          getOrganizerEvent(0)
          this.isEdit = false;
        });
        console.log(response.data);
      } catch (error) {
        console.log(error);
      }
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

    setEventData(event) {
      // set the event data to the store when editing an event
      this.eventId = event.id;
      this.eventName = event.name;
      this.eventCategories = event.category_id;
      this.eventDate = new Date(`${event.date}T${event.time}`);
      this.eventPoster = event.image;
      this.eventDescription = event.description;
      this.eventAddress = event.location;
      this.eventLongitude = event.longitude;
      this.eventLatitude = event.latitude;
      this.eventVenue = event.venue;
      this.ticket = event.ticket;
      this.discount = event.discount;
      this.agendas = event.agendas;
      this.imagePreview = event.image;
    },
  },
});
