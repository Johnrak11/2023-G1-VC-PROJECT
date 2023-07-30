<template>
  <img id="top-detail" class="img1 mt-10"
    src="https://edgefieldconcerts.com/wp-content/uploads/2022/07/rex-orange-county-2022-ecotl.jpg" alt="" />

  <v-btn icon class="bg-red back-btn">
    <v-icon>mdi-arrow-left</v-icon>
  </v-btn>
  <div class="container d-flex flex-column">
    <div class="detail">
      <div class="row bg-white d-flex pa-6 flex-column" style="margin-top: -5%">
        <div id="row1" class="col-md-6">
          <img v-if="event" class="img" :src="event.image" alt="Image" />
          <div class="d-flex mt-2 justify-space-between">
            <div class="icon-left d-flex">
              <div class="d-flex">
                <v-icon icon="mdi-ticket" size="30"></v-icon>
                <h3 class="tic mt-1 ml-2" v-if="eventDetail">
                  {{ eventDetail.available_ticket }}
                </h3>
              </div>
            </div>
            <div class="icon-right">
              <div class="d-flex ml-10 pt-6">
                <v-col cols="auto">
                  <v-dialog transition="dialog-bottom-transition" width="30%">
                    <template v-slot:activator="{ props }">
                      <div class="d-flex" style="margin-top: -45%">
                        <v-icon icon="mdi-share-variant" size="30" v-bind="props" @click="ClickShare(event.id)"></v-icon>
                        <p class="mt-1 ml-2">100</p>
                      </div>
                    </template>
                    <template v-slot:default="{ isActive }">
                      <v-card class="dialog d-flex w-100" style="overflow-y: hidden">
                        <v-toolbar color="red" title="Share"></v-toolbar><br />
                        <div class="d-flex justify-space-evenly" style="height: 10vh" v-if="event">
                          <ShareNetwork network="facebook" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="event.name" :description="event.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 mt-3 color-icon" color="blue" size="50"
                              style="height: 5vh">mdi-facebook</v-icon>
                            <p class="text-black mt-5">Facebook</p>
                          </ShareNetwork>
                          <ShareNetwork network="telegram" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="event.name" :description="event.description"
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
                            :title="event.name" :description="event.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 color-icon" color="blue" size="50">mdi-linkedin</v-icon>
                            <p class="text-black mt-2">Linkedin</p>
                          </ShareNetwork>
                          <ShareNetwork network="whatsapp" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="event.name" :description="event.description"
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
          </div>
          <br />
        </div>
        <div class="col-md-6">
          <h1 v-if="event" style="margin-top: -3%;">{{ event.name }}</h1>
          <p class="mt-5" v-if="event">
            {{ event.description }}
          </p>
          <div class="contact d-flex justify-space-between">
            <div class="icons mt-3 d-flex flex-column justify-space-between">
              <div class="d-flex">
                <v-icon color="grey" class="icon1"> mdi-calendar</v-icon>
                <p class="ml-4" v-if="event">{{ event.date }}</p>
              </div>
              <div class="d-flex g-icon">
                <v-icon color="grey" class="icon1"> mdi-map-clock</v-icon>
                <p class="ml-4" v-if="event">{{ event.time }}</p>
              </div>
              <div class="d-flex g-icon">
                <v-icon color="grey" class="icon1">mdi-map-marker-radius</v-icon>
                <p class="ml-4 location-text" v-if="event">
                  {{ event.location }}
                </p>
              </div>
              <div class="d-flex g-icon align-center">
                <v-icon color="grey" class="icon1" size="26">mdi-cash</v-icon>
                <h2 class="ml-3 text-red" v-if="eventDetail && eventDetail.price">
                  {{ eventDetail.price }}
                </h2>
              </div>
              <br />
            </div>
            <div class="map">
              <ShowMap v-if="event" :eventInfor="event"></ShowMap>
              <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.678901234567!2d-122.4324!3d37.7897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDU4JzU0LjQiTiAxMjLCsDM1JzQ5LjIiVw!5e0!3m2!1sen!2sus!4v1625706808123!5m2!1sen!2sus"
                width="455" height="200" style="border: 0" allowfullscreen="" loading="lazy"></iframe> -->
            </div>
          </div>
          <div class="d-flex justify-end button mt-6">
            <button class="free bg-red pa-1 rounded" v-if="!eventDetail || eventDetail.price === 'free'"
              @click.prevent="booking(event.id)">
              {{ t('cardTemplate.free') }}
            </button>
            <button class="free bg-red pa-1 rounded" v-else @click.prevent="booking(event.id)">
              {{ t('cardTemplate.booking') }}
            </button>
          </div>
        </div>
        <agendaComponent></agendaComponent>
      </div>
    </div>
    <listCard v-if="event" :event="event"></listCard>
  </div>
</template>
<script setup>
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
import router from "@/routes/router";
import { ref, onMounted } from "vue";
import agendaComponent from "./AgendaComponent.vue";
import ShowMap from "../maps/ShowMap.vue";
import { eventStores } from "@/stores/eventsStore.js";
import listCard from "./ListCardDetail.vue";
import baseAPI from "@/stores/axiosHandle.js";
import { useRoute } from "vue-router";
const event = ref(null);
const eventDetail = ref(null);
const eventStore = eventStores();

const fetchEvent = async () => {
  const route = useRoute();
  const eventId = route.params.id;
  try {
    const response = await baseAPI.get(`/events/detail/${eventId}`);
    event.value = response.data.data;
  } catch (error) {
    console.log(error);
  }
};

const fetchEventDetail = async () => {
  const route = useRoute();
  const eventId = route.params.id;
  try {
    const response = await baseAPI.get(`/eventDetail/${eventId}`);
    eventDetail.value = response.data.data;
  } catch (error) {
    console.log(error);
  }
};

onMounted(() => {
  var element = document.getElementById("top-detail");
  element.scrollIntoView({ behavior: "smooth" });
  fetchEvent();
  fetchEventDetail();
});
function ClickShare(id) {
  console.log(id);
}

const booking = (id) => {
  router.push("/booking/" + id);
};
</script>
<style scoped>
.container {
  margin-top: -15%;
  margin-bottom: 30px;
}

.back-btn {
  position: absolute;
  top: 5%;
}

.detail {
  margin-left: 22px;
  max-width: 1300px;
  padding: 70px;
}

.free {
  font-size: 18px;
  width: 8%;
}

.img1 {
  width: 100%;
  height: 47vh;
  object-fit: cover;
}

.location-text {
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 500px;
  /* Adjust the max-width as needed */
}

.img {
  position: relative;
  width: 100%;
  height: 55vh;
  object-fit: cover;
}

h1 {
  font-size: 35px;
  font-weight: bold;
  margin-bottom: 20px;
}

.tic {
  color: red;
}

.g-icon {
  margin-top: -16vh;
}

.detail p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.social-share {
  text-decoration: none;
}
</style>
