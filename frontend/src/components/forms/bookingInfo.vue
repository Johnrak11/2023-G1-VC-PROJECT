<template>
    components: { divText },<div class="container text center w-100">
        <img :src=bookingBg alt="" class="w-50">
        <div class="booking-info bg-white w-50">
            <div class="total-ticket d-flex justify-space-around w-100 mt-8">
                <h3>Total Ticket</h3>
                <span>1</span>
            </div>
            <div class="total d-flex justify-space-around w-100 mt-8">
                <h3>Total Ticket</h3>
                <span>$5</span>
            </div>
        </div>
    </div>
</template>

<script setup>
import bookingBg from "../../assets/booking/booking.jpg";
</script>

<style>
.booking-info {
    box-shadow: 5px 5px 10px gray;
    margin-left: 25%;
}

img {
    margin-left: 25%;
    margin-top: 10%;
}
</style>