<template>
  <div class="container w-100 mt-10 mx-auto" v-if="event">
    <img :src="bookingBg" alt="" class="w-50">
    <v-table class="w-50 pb-10 pt-10">
      <tbody>
        <tr>
          <td>EVENT</td>
          <td>{{ event.name }}</td>
        </tr>
        <tr>
          <td>DATE</td>
          <td>{{ event.date }}</td>
        </tr>
        <tr>
          <td>LOCATION</td>
          <td>{{ event.location }}</td>
        </tr>
        <tr>
          <td>PRICE</td>
          <td v-if="event.event_detail.length > 0">{{ event.event_detail[0].price }}</td>
          <td v-else>Free</td>
        </tr>
      </tbody>
    </v-table>
    <div class="button w-50 mb-10">
      <payment-form v-if="event.event_detail.length > 0 && event.event_detail[0].price != 'free' && ticket.isRegister" class="mt-8 "
        :eventId="eventId"></payment-form>
      <v-btn v-else-if="event.event_detail.length > 0 && event.event_detail[0].price === 'free' && ticket.isRegister" color="red" @click="ticket.createTicket(router.currentRoute.value.params.id)">Register</v-btn>
      <v-btn v-else disabled color="red">Booked</v-btn>
    </div>
  </div>
</template>
  
<script setup>
import { ticketStore } from "@/stores/ticketStore";
const ticket = ticketStore()

import bookingBg from "../../../assets/booking/booking.jpg";
import paymentForm from "../../forms/paymentForm.vue";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import baseAPI from "@/stores/axiosHandle.js";
import router from "@/routes/router";

const route = useRoute();
const eventId = ref(null);
const event = ref();
const response = ref();

onMounted(() => {
  fetchEvent();
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
</script>
  

<style scoped>
.v-table {
  /* margin-left: 2%; */
  box-shadow: 5px 5px 10px gray;
}
.button{
  text-align: end;
  margin-top: 10px;
}

div {
  margin-left: 25%;
}

img {
  margin-left: 25%;
  margin-top: 5%;
}
</style>