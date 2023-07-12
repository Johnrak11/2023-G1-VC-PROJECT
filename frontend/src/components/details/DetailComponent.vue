<template>
  <img
    class="img1 mt-10"
    src="https://edgefieldconcerts.com/wp-content/uploads/2022/07/rex-orange-county-2022-ecotl.jpg"
    alt=""
  />
  <div class="container d-flex flex-column">
    <div class="detail">
      <div class="row bg-white d-flex pa-6 flex-column">
        <div id="row1" class="col-md-6">
          <img v-if="event"
            class="img"
            :src="event.image"
            alt="Image"
          />
          <div class="d-flex mt-2 justify-space-between">
            <div class="icon-left d-flex">
              <div class="d-flex">
                <v-icon
                  class="mt-1"
                  :color="liked ? 'grey' : 'red'"
                  @click="liked = !liked"
                  >mdi-heart</v-icon
                >
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
                <p class="mt-1 ml-2">300</p>
              </div>
            </div>
          </div>
          <br />
        </div>
        <div class="col-md-6 ml-6">
          <h1 v-if="event">{{ event.name }}</h1>
          <p class="mt-5" v-if="event">
            {{ event.description }}
          </p>
          <div class="contact d-flex justify-space-between">
            <div class="icons">
              <div class="d-flex">
                <v-icon> mdi-calendar</v-icon>
                <p class="ml-4 mt-1" v-if="event">{{ event.date }}</p>
              </div>
              <div class="d-flex">
                <v-icon> mdi-calendar</v-icon>
                <p class="ml-4 mt-1" v-if="event">{{ event.time }}</p>
              </div>
              <div class="d-flex">
                <v-icon>mdi-map</v-icon>
                <p class="ml-4 mt-1" v-if="event">{{ event.location }}</p>
              </div>
              <br />
            </div>
            <div class="map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.678901234567!2d-122.4324!3d37.7897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDU4JzU0LjQiTiAxMjLCsDM1JzQ5LjIiVw!5e0!3m2!1sen!2sus!4v1625706808123!5m2!1sen!2sus"
                width="455"
                height="200"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
          </div>
          <div class="button mt-6">
            <button class="free bg-red pa-1 rounded">Free</button>
          </div>
        </div>
        <agendaComponent></agendaComponent>
      </div>
    </div>
    <listCard></listCard>
  </div>
</template>
<script>
// import defineStore from '../../stores/eventsStore.js'
import axios from "axios";
import agendaComponent from "./AgendaComponent.vue";
import listCardDetail from "./ListCardDetail.vue";
export default {
  components: {
    agendaComponent: agendaComponent,
    listCard: listCardDetail,
  },
  data: () => ({
    liked: false,
    event: null,
  }),
  mounted() {
    this.fetchEvent(); // fetch event data when the component is mounted
  },
  provide() {
    return {
      event:this.event
    }
  },
  methods: {
    async fetchEvent() {
      const eventId = this.$route.params.id;
      console.log(eventId);
      await axios
        .get(`http://127.0.0.1:8000/api/events/${eventId}`)
        .then((response) => {
          console.log((this.event = response.data.data)); // store the event data in the event property
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.container {
  margin-top: -15%;
  margin-bottom: 30px;
}

.detail {
  margin-left: 2%;
  max-width: 1300px;
  padding: 70px;
}

.free {
  font-size: 20px;
  width: 8%;
}


.img1,
.img {
  width: 100%;
  height: 45vh;
  object-fit: cover;
}

h1 {
  font-size: 35px;
  font-weight: bold;
  margin-bottom: 20px;
}

.detail p {
  font-size: 18px;
  line-height: 1.5;
  margin-bottom: 20px;
}
</style>
