<template>
  <div class="container mx-auto d-flex" v-if="event">
    <div class="image w-100">
      <img :src="image" alt="">
    </div>
    <div class="table w-100">
      <h2 class="mt-10 text-center text-red mb-8 mr-10">INFORMATION OF EVENT</h2>
      <div class="infor ml-8">
        <div class="text">
          <h4>NAME: </h4>
          <p>{{ event.name }}</p>
        </div>
        <div class="text">
          <h4>DATE: </h4>
          <p>{{ event.date }}</p>
        </div>
        <div class="text">
          <h4>TIME: </h4>
          <p>{{ time }}</p>
        </div>
        <div class="text">
          <h4>LOCATION: </h4>
          <p>{{ event.location }}</p>
        </div>
        <div class="text">
          <h4>PRICE</h4>
            <p v-if="event.event_detail.length > 0">{{ event.event_detail[0].price }}</p>
            <p v-else>Free</p>
        </div>
        <div class="button w-75 mb-10">
        <payment-form v-if="event.event_detail.length > 0 && event.event_detail[0].price != 'free' && ticket.isRegister"
          class="mt-8 " :eventId="eventId"></payment-form>
        <v-btn v-else-if="event.event_detail.length > 0 && event.event_detail[0].price === 'free' && ticket.isRegister"
          color="red" @click="ticket.createTicket(router.currentRoute.value.params.id)">Register</v-btn>
        <v-btn v-else disabled color="red">Booked</v-btn>
      </div>
      </div>
    </div>
  </div>
</template>
  
<script setup>
import { ticketStore } from "@/stores/ticketStore";
const ticket = ticketStore()

import paymentForm from "../../forms/paymentForm.vue";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import baseAPI from "@/stores/axiosHandle.js";
import router from "@/routes/router";

const route = useRoute();
const eventId = ref(null);
const event = ref();
const response = ref();
const image = ref();
const time = ref();

onMounted(() => {
  fetchEvent();
  getImageOfEvent()
  const currentPath = router.currentRoute.value.params.id;
  ticket.isBooked(currentPath);
});


async function fetchEvent() {
  eventId.value = route.params.id;
  try {
    response.value = await baseAPI.get(`/events/booking/${eventId.value}`);
    event.value = response.value.data.data;
  } catch (error) {
    console.log(error);
  }
}
async function getImageOfEvent() {
  const id = route.params.id;
  try {
    const response = await baseAPI.get(`/events/${id}`);
    image.value = response.data.data.image;
    time.value = response.data.data.time;
  } catch (error) {
    console.log(error);
  }
}
</script>
  

<style scoped>

.button {
  text-align: end;
  margin-top: 10px;
}

.container {
  margin-top: 10%;
}

.image {
  margin-left: 5%;
  height: 63vh;
  box-shadow: 0px 5px 10px 5px rgb(189, 188, 188);
}
img{
  width: 100%;
  height: 63vh;
}
.table{
  height: 63vh;
  margin-right: 5%;
  box-shadow: 5px 5px 10px 5px rgb(189, 188, 188);
}

.text{
  display: flex;
  width: 60%;
  margin-top: 10px;
  margin-left: 15%;
  border-bottom: 1px solid gray;
}
.infor h4 {
  width: 35%; 
  text-align: left;
}.infor p {
  margin: 0;
  padding: 0;
  text-align: right;
}
</style>