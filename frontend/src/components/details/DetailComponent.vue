<template>
  <img id="top-detail" class="img1 mt-10" src="https://edgefieldconcerts.com/wp-content/uploads/2022/07/rex-orange-county-2022-ecotl.jpg"
    alt="" />

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
                <v-icon class="mt-1" :color="liked ? 'grey' : 'red'" @click="liked = !liked">mdi-heart</v-icon>
                <p class="mt-1 ml-2">100</p>
              </div>
              <div class="d-flex ml-10">
                <v-icon icon="mdi-share" size="30"></v-icon>
                <p class="mt-1 ml-2">100</p>
              </div>
            </div>
            <div class="icon-right">
              <div class="d-flex">
                <v-icon class="mr-2" icon="mdi-ticket" size="30"></v-icon>
                <h3 class="tic mt-1 ml-2" v-if="eventDetail">{{ eventDetail.available_ticket }}</h3>
              </div>
            </div>
          </div>
          <br />
        </div>
        <div class="col-md-6">
          <h1 v-if="event">{{ event.name }}</h1>
          <p class="mt-5" v-if="event">
            {{ event.description }}
          </p>
          <div class="contact d-flex justify-space-between">
            <div class="icons mt-3 d-flex flex-column justify-space-between">
              <div class="d-flex">
                <v-icon class="icon1"> mdi-calendar</v-icon>
                <p class="ml-4" v-if="event">{{ event.date }}</p>
              </div>
              <div class="d-flex g-icon">
                <v-icon class="icon1"> mdi-map-clock</v-icon>
                <p class="ml-4" v-if="event">{{ event.time }}</p>
              </div>
              <div class="d-flex g-icon">
                <v-icon class="icon1">mdi-map-marker</v-icon>
                <p class="ml-4 location-text" v-if="event">{{ event.location }}</p>
              </div>
              <div class="d-flex g-icon align-center">
                <v-icon class="icon1" size="26">mdi-cash</v-icon>
                <h2 class="ml-3 text-red" v-if="eventDetail && eventDetail.price">
                  {{ eventDetail.price }}
                </h2>
              </div>
              <br />
            </div>
            <div class="map">
              <ShowMap v-if="event" :eventInfor="event" ></ShowMap>
              <!-- <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.678901234567!2d-122.4324!3d37.7897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDU4JzU0LjQiTiAxMjLCsDM1JzQ5LjIiVw!5e0!3m2!1sen!2sus!4v1625706808123!5m2!1sen!2sus"
                width="455" height="200" style="border: 0" allowfullscreen="" loading="lazy"></iframe> -->
            </div>
          </div>
          <div class="d-flex justify-end button mt-6">
            <button class="free bg-red pa-1 rounded" v-if="!eventDetail || !eventDetail.price">
              Register
            </button>
            <button class="free bg-red pa-1 rounded" @click.prevent="booking(event.id)" v-else>
              Booking
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
import router from "@/routes/router";
import { ref, onMounted } from "vue";
import agendaComponent from "./AgendaComponent.vue";
import ShowMap from "../maps/ShowMap.vue";
import listCard from "./ListCardDetail.vue";
import baseAPI from "@/stores/axiosHandle.js";
import { useRoute } from "vue-router";

const liked = ref(false);
const event = ref(null);
const eventDetail = ref(null);

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
  margin-top: -8%;
}


.detail p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
}</style>
