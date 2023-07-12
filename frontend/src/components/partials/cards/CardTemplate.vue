<template>
  <v-card class="card rounded bg-grey-lighten-2 mt-5 ml-5">
    <img
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU"
      alt=""
    />
    <div class="pa-3">
      <div class="d-flex">
        <div class="d-flex" style="margin-top: -5%">
          <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked"
            >mdi-heart</v-icon
          >
          <p>100</p>
        </div>
        <div class="d-flex ml-10">
          <v-col cols="auto">
            <v-dialog transition="dialog-bottom-transition" width="30%">
              <template v-slot:activator="{ props }">
                <div class="d-flex" style="margin-top: -40%">
                  <v-icon
                    icon="mdi-share"
                    size="30"
                    v-bind="props"
                    @click="ClickShare(eventInfor.id)"
                  ></v-icon>
                  <p>100</p>
                </div>
              </template>
              <template v-slot:default="{ isActive }">
                <v-card class="dialog d-flex w-100">
                  <v-toolbar color="red" title="Share"></v-toolbar><br />
                  <div class="d-flex justify-space-evenly">
                    <ShareNetwork
                      network="facebook"
                      :url="httpRequest.api + '/event/'  + eventInfor.id"
                      :title="event.name"
                      :description="event.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You"
                      hashtags="vuejs,vite"
                      class="social-share"
                    >
                      <v-icon left class="ml-2 color" size="50"
                        >mdi-facebook</v-icon
                      >
                      <p class="text-black">Facebook</p>
                    </ShareNetwork>
                    <ShareNetwork
                      network="telegram"
                      :url="httpRequest.api + '/event/'  + eventInfor.id"
                      :title="event.name"
                      :description="event.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You"
                      hashtags="vuejs,vite"
                      class="social-share"
                    >
                      <v-icon left class="ml-2 color" size="50"
                        >mdi-telegram</v-icon
                      >
                      <p class="text-black">Telegram</p>
                    </ShareNetwork>
                    <ShareNetwork
                      network="linkedin"
                      :url="httpRequest.api + '/event/'  + eventInfor.id"
                      :title="event.name"
                      :description="event.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You"
                      hashtags="vuejs,vite"
                      class="social-share"
                    >
                      <v-icon left class="ml-2 color" size="50"
                        >mdi-linkedin</v-icon
                      >
                      <p class="text-black">Linkedin</p>
                    </ShareNetwork>
                    <ShareNetwork
                      network="whatsapp"
                      :url="httpRequest.api + '/event/'  + eventInfor.id"
                      :title="event.name"
                      :description="event.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You"
                      hashtags="vuejs,vite"
                      class="social-share"
                    >
                      <v-icon left class="ml-2 color" size="50"
                        >mdi-whatsapp</v-icon
                      >
                      <p class="text-black">Whatsapp</p>
                    </ShareNetwork>
                  </div>
                  <br />
                  <div
                    class="ml-5 link rounded mr-5 d-flex justify-space-between"
                  >
                    <p>{{ httpRequest.api + "/event/" + eventInfor.id }}</p>
                    <v-icon class="pa-4 copy">mdi-attachment</v-icon>
                  </div>
                  <v-card-actions class="justify-center">
                    <v-btn variant="text" @click="isActive.value = false"
                      >Close</v-btn
                    >
                  </v-card-actions>
                </v-card>
              </template>
            </v-dialog>
          </v-col>
        </div>
      </div>
      <div
        class="caard d-flex flex-column justify-space-between"
        style="height: 18vh; margin-top: -6%"
      >
        <div class="top">
          <h4 style="font-size: 15px">{{ eventInfor.name }}</h4>
          <div class="d-flex">
            <div class="d-flex">
              <v-icon size="17"> mdi-calendar</v-icon>
              <p class="ml-1" style="font-size: 12px">{{ eventInfor.date }}</p>
            </div>
            <div class="d-flex ml-5">
              <v-icon size="17">mdi-map-marker</v-icon>
              <p style="font-size: 12px" class="ml-1">{{ eventInfor.venue }}</p>
            </div>
          </div>
        </div>
        <div class="bottom d-flex justify-end">
          <button
            class="bg-red pa-1 rounded text-"
            id="booking"
            style="font-size: 13px"
          >
            Booking
          </button>
        </div>
      </div>
    </div>
  </v-card>
</template>

<script setup>
import {axiosStore} from "../../../stores/axiosHandle";
const httpRequest = axiosStore();
import { defineProps, ref } from "vue";
const props = defineProps({
  event: Object,
});
const eventInfor = ref(props.event)

const liked = ref(false);

function ClickShare(id) {
  console.log(id);
}
</script>

<style scoped>
.card {
  width: 18%;
  height: 44vh;
  cursor: pointer;
}

img {
  width: 100%;
  height: 20vh;
}

/* #booking {
    margin-left: 75%;
    margin-top: -5%;
} */

.app img {
  width: 60%;
  display: flex;
  margin: auto;
  padding: 10px;
  border-radius: 50%;
  margin-left: -1%;
}

.app img:hover {
  background-color: rgb(205, 205, 205);
  cursor: pointer;
}

.app {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.dialog {
  margin: auto;
  width: 30%;
}

.social {
  width: 25%;
  padding: 5px;
}

.link {
  border: 1px solid black;
  padding: 10px;
}

.copy:hover {
  padding: 4;
  background-color: #adabab;
  border-radius: 50%;
  cursor: pointer;
}
.color:hover {
  color: red;
  cursor: pointer;
}
.social-share {
  text-decoration: none;
}
</style>