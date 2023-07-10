<template>
    <div class="container w-100">
        <img :src=bookingBg alt="" class="w-50">
        <div class="booking-info bg-white w-50 pb-10 pt-10">
            <div class="event-name d-flex justify-space-between w-90 ml-10 mr-10">
                <h3>Event</h3>
                <span>Education</span>
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
            <payment-form></payment-form>
        </div>
        
    </div>
</template>

<script setup>
import bookingBg from "../../assets/booking/booking.jpg";
import paymentForm from "../forms/paymentForm.vue";
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