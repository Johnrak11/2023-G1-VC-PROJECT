<template>
  <v-sheet class="bg-grey-lighten-2" elevation="8" width="100%">
    <v-slide-group v-model="model" class="pa-4" center-active show-arrows>
      <v-slide-group-item class="group-card ml-5" v-for="(event, index) in eventStore.reletedEvent" :key="index"
        v-slot="{ isSelected, toggle }">
        <v-hover v-slot="{ isHovering, props }" class="card">
          <v-card :elevation="isHovering ? 24 : 2" :class="{ 'on-hover': isHovering }" v-bind="props"
            class="card ml-5 hover" :color="isSelected ? 'red' : 'grey-lighten-1'" @click="toggle">
            <router-link :to="`/eventRaleted/${event.id}`">
              <v-img class="align-end text-white" height="50%" max-width="100vh" :src="event.image" cover></v-img>
            </router-link>
            <div class="d-flex">
              <div class="d-flex pt-6">
                <v-col cols="auto">
                  <v-dialog transition="dialog-bottom-transition" width="30%">
                    <template v-slot:activator="{ props }">
                      <div class="d-flex justify-end align-center share-btn" style="margin-top: -45%">
                        <p class="mt-2">{{t('cardTemplate.share')}}</p>
                        <v-icon icon="mdi-share-variant" class="mt-2" size="23" v-bind="props"
                          @click="ClickShare(eventInfor.id)"></v-icon>
                      </div>
                    </template>
                    <template v-slot:default="{ isActive }">
                      <v-card class="dialog d-flex w-100" style="overflow-y: hidden">
                        <v-toolbar color="red" title="Share"></v-toolbar><br />
                        <div class="d-flex justify-space-evenly" style="height: 10vh" v-if="event">
                          <ShareNetwork network="facebook" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="eventInfor.name" :description="eventInfor.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 mt-3 color-icon" color="blue" size="50"
                              style="height: 5vh">mdi-facebook</v-icon>
                            <p class="text-black mt-5">Facebook</p>
                          </ShareNetwork>
                          <ShareNetwork network="telegram" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="eventInfor.name" :description="eventInfor.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share" id="my-iframe" allow-same-origin>
                            <img :src="event.img" alt="" />
                            <!-- <v-icon left class="ml-2 color-icon" color="blue" size="50">mdi-telegram</v-icon> -->
                            <img
                              src="https://static.vecteezy.com/system/resources/previews/018/930/479/original/telegram-logo-telegram-icon-transparent-free-png.png"
                              alt="" width="67" />
                            <p class="text-black" style="margin-top: -20%">
                              Telegram
                            </p>
                          </ShareNetwork>
                          <ShareNetwork network="linkedin" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="eventInfor.name" :description="eventInfor.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 color-icon" color="blue" size="50">mdi-linkedin</v-icon>
                            <p class="text-black mt-2">Linkedin</p>
                          </ShareNetwork>
                          <ShareNetwork network="whatsapp" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="eventInfor.name" :description="eventInfor.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 color-icon" color="green" size="50">mdi-whatsapp</v-icon>
                            <p class="text-black mt-2">Whatsapp</p>
                          </ShareNetwork>
                        </div>
                        <br />
                        <v-card-actions class="justify-center">
                          <v-btn variant="text" @click="isActive.value = false" style="width: 100%">Close</v-btn>
                        </v-card-actions>
                      </v-card>
                    </template>
                  </v-dialog>
                </v-col>
              </div>
            </div>
            <v-card-text>
              <div class="caard" style="margin-top: -15%">
                <div class="top">
                  <router-link :to="`/eventRaleted/${event.id}`">
                    <div>
                      <div>
                        <v-card-title class="text-black" style="margin-left: -8%">{{ event.name }}</v-card-title>
                      </div>
                      <div class="d-flex" style="margin-left: -2%">
                        
                        <p class="ml-1" style="font-size: 15px">
                          {{t('cardTemplate.startDate')}}:
                          {{ event.date }}
                        </p>
                      </div>

                      <div class="d-flex" style="margin-top: -5%; margin-left: -2%">
                        <!-- <v-icon size="17">mdi-map-marker</v-icon> -->
                        <p style="font-size: 15px" class="ml-1 mt-4">
                          {{t('cardTemplate.venue')}}:
                          {{ eventCreate.truncateDescription(event.venue, 10) }}
                        </p>
                      </div>
                    </div>
                  </router-link>
                </div>
              </div>
            </v-card-text>
            <v-card-actions>
              <v-btn color="white" class="bg-red mb-3" @click.prevent="booking(event.id)" style="width: 100%">
                Booking
              </v-btn>
            </v-card-actions>
          </v-card>
        </v-hover>
      </v-slide-group-item>
    </v-slide-group>
  </v-sheet>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
import { ref, onMounted } from "vue";
import router from "@/routes/router";
import { eventStores } from "@/stores/eventsStore.js";
import { defineProps } from "vue";
import { eventCreateStores } from "@/stores/eventCreate.js";
const eventCreate = eventCreateStores();

const eventStore = eventStores();

function ClickShare(id) {
  console.log(id);
}
const model = ref(null);
const props = defineProps({
  eventInfor: Object,
});

function booking(id) {
  router.push("/booking/" + id);
  // console.log(eventInfor.value.id);
}

onMounted(() => {
  eventStore.getDataCategoryAxios(
    props.eventInfor.category_id,
    props.eventInfor.id
  );
});
</script>
<style scoped>
.card {
  width: 25%;
  height: 65vh;

  flex-direction: column;
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

.btn {
  position: absolute;
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
</style>
