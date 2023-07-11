<template>
    <div class="container w-100">
        <img :src=bookingBg alt="" class="w-50">
        <div class="booking-info bg-white w-50 pb-10 pt-10">
            <div class="event-name d-flex justify-space-between w-90 ml-10 mr-10">
                <h3>Event</h3>
                <span>Education</span>
            </div>
            <div class="event-name d-flex justify-space-between w-90 ml-10 mr-10 mt-8">
                <h3>Date</h3>
                <span>2023-07-11</span>
            </div>
            <div class="event-name d-flex justify-space-between w-90 ml-10 mr-10 mt-8">
                <h3>Location</h3>
                <span>AEON</span>
            </div>
            <div class="total-ticket d-flex justify-space-between w-90 ml-10 mr-10 mt-8">
                <h3>Total Ticket</h3>
                <span>1</span>
            </div>
            <div class="total d-flex justify-space-between w-90 ml-10 mr-10 mt-8">
                <h3>Total</h3>
                <span>$5</span>
            </div>
            <!-- <v-btn color="red" class="mt-8 ml-8">Payment</v-btn> -->
            <payment-form class="mt-8"></payment-form>
        </div>
        
    </div>
</template>

<script setup>
import bookingBg from "../../../assets/booking/booking.jpg";
import paymentForm from "../../forms/paymentForm.vue";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
const route = useRoute();

const eventId = ref(null);
onMounted(() => {
    getDataEvent();
  });
async function getDataEvent(){
     eventId.value = route.params.id;
    console.log(eventId.value);
}
</script>

<style>
.booking-info {
    box-shadow: 5px 5px 10px gray;
    margin-left: 25%;
}

img {
    margin-left: 25%;
    margin-top: 5%;
}
</style>