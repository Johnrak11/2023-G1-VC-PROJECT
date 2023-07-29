<template >
  <div class="bg-grey-lighten-2 mt-5" style="width: 43%;">
    <v-hover v-slot="{ isHovering, props }">
      <v-card :elevation="isHovering ? 24 : 2" :class="{ 'on-hover': isHovering }" v-bind="props" class="hover">
        <router-link :to="`/detail/${eventInfor.id}`">
          <v-img class="align-end text-white" height="200" :src="eventInfor.image" cover></v-img>
        </router-link>
        <div class="d-flex justify-space-between">
          <div class="d-flex ml-10 pt-6">
            <v-col cols="auto">
              <v-dialog transition="dialog-bottom-transition" width="30%">
                <template v-slot:activator="{ props }">
                  <div class="d-flex justify-end align-center share-btn" style="margin-top: -35%;">
                    <p class="mt-1">{{ t('cardTemplate.share') }}</p>
                    <v-icon icon="mdi-share-variant" size="23" v-bind="props" @click="ClickShare(eventInfor.id)"></v-icon>
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
                        class="social-share" id="my-iframe" allow-same-origin>
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
          <div class="" style="margin-top: -15%;">
            <div class="top">
              <router-link :to="`/detail/${eventInfor.id}`">
                <div>
                  <div>
                    <v-card-title class="text-black" style="margin-left: -5%;">{{ eventInfor.name }}</v-card-title>
                  </div>
                  <div class="d-flex" style="margin-top: -5%;">
                    <p class="ml-1 mt-2 mb-2" style="font-size: 15px">
                      {{ t('cardTemplate.startDate') + ': ' + eventInfor.date }}
                    </p>
                  </div>
                  <div class="d-flex" style="margin-top: -5%;">
                    <p style="font-size: 15px" class="ml-1 mt-1">
                      {{ t('cardTemplate.venue') + ': ' + eventCreate.truncateDescription(eventInfor.venue, 15) }}
                    </p>
                  </div>
                </div>
              </router-link>
            </div>
          </div>
        </v-card-text>
        <v-card-actions>
          <v-btn color="white" class="bg-red mb-3" @click.prevent="booking" style="width: 100%;">
            {{ t('cardTemplate.booking') }}
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-hover>
  </div>
</template>

<script setup>
import router from "@/routes/router";
import { eventStores } from "@/stores/eventsStore";
import { defineProps, ref } from "vue";
const props = defineProps({
  event: Object,
});
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
const events = eventStores()
const eventInfor = ref(props.event);

import { eventCreateStores } from '@/stores/eventCreate.js'
const eventCreate = eventCreateStores()

function ClickShare(id) {
  console.log(id);
}

function booking() {
  router.push('/booking/' + eventInfor.value.id);
}


</script>

<style scoped>
.card {
  width: 70%;
}

a {
  text-decoration: none;
  color: black;
  /* width: 18%; */
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

.share-btn {
  gap: 5px;
  width: 100%;
  margin-left: -40%;
}
</style>
