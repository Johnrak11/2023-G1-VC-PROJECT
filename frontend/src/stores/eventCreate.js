import { storage } from "@/firebase";
import {
  ref,
  uploadBytes,
  deleteObject,
  getDownloadURL,
} from "firebase/storage";
import { defineStore } from "pinia";

const eventCreateStores = defineStore("eventCreate", {
  state: () => ({
    eventName: "",
    eventCategories: '',
    eventDate: "",
    eventPoster: "",
    eventDescription: "",
    eventAddress: "",
    eventVenue: "",
    ticketPrice: "",
    ticketAvailable: 0,
    ticketRestriction: 0,
    ticketDescription: "",
    imagePath: "",
    isLoadingDialog: false,
    imagePreview: "https://placehold.co/600x400/png",
    isSubmit: false,
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
  },
});

export default eventCreateStores;
