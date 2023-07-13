<template>
   <v-hover
        v-slot="{ isHovering, props }"
        open-delay="200"
      >
    <v-card class="card rounded bg-grey-lighten-2 mt-5 ml-5" 
      :elevation="isHovering ? 20 : 2"
      :class="{ 'on-hover': isHovering }"
      height="350"
      max-width="350"
      v-bind="props"
    >
      <router-link :to="`/detail/${eventInfor.id}`">
        <img src=" https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU"
          alt="" />
      </router-link>
      <div class="pa-3">
        <div class="d-flex">
          <div class="d-flex" style="margin-top: -4%">
            <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked">mdi-heart</v-icon>
            <p class="mt-0">100</p>
          </div>
          <div class="d-flex ml-10">
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
                    <!-- <div class="ml-5 link rounded mr-5 d-flex justify-space-between">
          <p>{{ httpRequest.api + "/event/" + eventInfor.id }}</p>
          <v-icon class="pa-4 copy">mdi-attachment</v-icon>
        </div> -->
                    <v-card-actions class="justify-center">
                      <v-btn variant="text" @click="isActive.value = false">Close</v-btn>
                    </v-card-actions>
                  </v-card>
                </template>
              </v-dialog>
            </v-col>
          </div>
        </div>
        <div class="caard d-flex flex-column justify-space-between" style="height: 17vh; margin-top: -6%">
          <div class="top">
            <router-link :to="`/detail/${eventInfor.id}`">
              <h4 style="font-size: 15px">{{ eventInfor.name }}</h4>
              <div class="d-flex">
                <div class="d-flex">
                  <v-icon size="17"> mdi-calendar</v-icon>
                  <p class="ml-1 mt-0" style="font-size: 12px">
                    {{ eventInfor.date }}
                  </p>
                </div>
                <div class="d-flex ml-5">
                  <v-icon size="17">mdi-map-marker</v-icon>
                  <p style="font-size: 12px" class="ml-1 mt-0">
                    {{ eventInfor.venue }}
                  </p>
                </div>
              </div>
            </router-link>
          </div>
          <div class="bottom d-flex justify-end">
            <button class="bg-red pa-1 rounded" style="font-size: 13px">
              Booking
            </button>
          </div>
        </div>
      </div>
      
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
  width: 18%;
  height: 50vh;
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
