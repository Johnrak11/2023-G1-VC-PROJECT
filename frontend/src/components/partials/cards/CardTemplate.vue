<template>
  <v-hover v-slot="{ isHovering, props }" class="card">
    <v-card :elevation="isHovering ? 24 : 2" :class="{ 'on-hover': isHovering }" v-bind="props"
      class="card  bg-grey-lighten-2 mt-5 ml-5 hover">
      <router-link :to="`/detail/${eventInfor.id}`">
        <v-img class="align-end text-white" height="200" src="https://cdn.vuetifyjs.com/images/cards/docks.jpg" cover>
          <v-card-title>{{ eventInfor.name }}</v-card-title>
        </v-img>
      </router-link>
      <div class="d-flex justify-space-between">
        <v-card-subtitle class="pt-4 d-flex">
          <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked">mdi-heart</v-icon>
          <p class="mt-0">100</p>
        </v-card-subtitle>
        <div class="d-flex ml-10 pt-6">
          <v-col cols="auto">
            <v-dialog transition="dialog-bottom-transition" width="30%">
              <template v-slot:activator="{ props }">
                <div class="d-flex" style="margin-top: -45%">
                  <v-icon icon="mdi-share" size="30" v-bind="props" @click="ClickShare(eventInfor.id)"></v-icon>
                  <p class="mt-1">100</p>
                </div>
              </template>
              <template v-slot:default="{ isActive }">
                <v-card class="dialog d-flex w-100" style="overflow-y: hidden">
                  <v-toolbar color="red" title="Share"></v-toolbar><br />
                  <div class="d-flex justify-space-evenly" style="height: 10vh">
                    <ShareNetwork network="facebook" :url="events.localHttp + '/detail/' + eventInfor.id"
                      :title="eventInfor.name" :description="eventInfor.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                      class="social-share">
                      <v-icon left class="ml-2 color-icon" size="50" style="height: 5vh">mdi-facebook</v-icon>
                      <p class="text-black mt-5">Facebook</p>
                    </ShareNetwork>
                    <ShareNetwork network="telegram" :url="events.localHttp + '/detail/' + eventInfor.id"
                      :title="eventInfor.name" :description="eventInfor.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                      class="social-share">
                      <v-icon left class="ml-2 color-icon" size="50">mdi-telegram</v-icon>
                      <p class="text-black mt-2">Telegram</p>
                    </ShareNetwork>
                    <ShareNetwork network="linkedin" :url="events.localHttp + '/detail/' + eventInfor.id"
                      :title="eventInfor.name" :description="eventInfor.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                      class="social-share">
                      <v-icon left class="ml-2 color-icon" size="50">mdi-linkedin</v-icon>
                      <p class="text-black mt-2">Linkedin</p>
                    </ShareNetwork>
                    <ShareNetwork network="whatsapp" :url="events.localHttp + '/detail/' + eventInfor.id"
                      :title="eventInfor.name" :description="eventInfor.description"
                      quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                      class="social-share">
                      <v-icon left class="ml-2 color-icon" size="50">mdi-whatsapp</v-icon>
                      <p class="text-black mt-2">Whatsapp</p>
                    </ShareNetwork>
                  </div>
                  <br />
                  <v-card-actions class="justify-center">
                    <v-btn variant="text" @click="isActive.value = false">Close</v-btn>
                  </v-card-actions>
                </v-card>
              </template>
            </v-dialog>
          </v-col>
        </div>
      </div>

      <v-card-text>
        <div class="caard" style="margin-top: -15%;">
          <div class="top">
            <router-link :to="`/detail/${eventInfor.id}`">
              <div>
                <!-- <p>{{ eventInfor.description }}</p> -->
                <div class="d-flex mt-2">
                  <!-- <v-icon size="17"> mdi-calendar</v-icon> -->
                  <p class="ml-1 mt-0" style="font-size: 15px">Date:
                    {{ eventInfor.date }}
                  </p>
                </div>
                <div class="d-flex" style="margin-top: -5%;">
                  <!-- <v-icon size="17">mdi-map-marker</v-icon> -->
                  <p style="font-size: 15px" class="ml-1 mt-0">Venue:
                    {{ eventInfor.venue }}
                  </p>
                </div>
              </div>
            </router-link>
          </div>
        </div>
      </v-card-text>

      <v-card-actions>
        <v-btn color="white" class="ml-3 bg-red mb-5">
          Booking
        </v-btn>
      </v-card-actions>
    </v-card>
  </v-hover>
</template>

<script setup>
import { eventStores } from "@/stores/eventsStore";
import { defineProps, ref } from "vue";
const props = defineProps({
  event: Object,
});
const events = eventStores()
const eventInfor = ref(props.event);

const liked = ref(false);

function ClickShare(id) {
  console.log(id);
}
</script>

<style scoped>
.card {
  width: 23%;
}

a {
  text-decoration: none;
  color: black;
  width: 18%;
  height: 44vh;
  cursor: pointer;
}

img {
  width: 100%;
}

#booking {
  margin-left: 75%;
  height: 20vh;
}

.app img {
  width: 60%;
  display: flex;
  margin: auto;
  padding: 10px;
  /* border-radius: 50%; */
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

.color-icon:hover {
  color: red;
  cursor: pointer;
}

.social-share {
  text-decoration: none;
}
</style>
