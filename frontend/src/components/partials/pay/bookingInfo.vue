<template>
    <div class="container w-100 mt-10">
        <img :src=bookingBg alt="" class="w-50">
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
                    <td>{{ "$"+event.price}}</td>
                </tr>
            </tbody>
        </v-table>
        <div class="div w-50 mb-10">
            <payment-form class="mt-8"></payment-form>
        </div>
    </div>
</template>

<script setup>
import bookingBg from "../../../assets/booking/booking.jpg";
import paymentForm from "../../forms/paymentForm.vue";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";
import { axiosStore } from '@/stores/axiosHandle.js'

const route = useRoute();
const eventId = ref(null);
const httpRequest = axiosStore();
const event = ref({});

onMounted(() => {
    getDataEvent();
});
async function getDataEvent() {
    eventId.value = route.params.id;
    console.log(route.params.id);
    axios.get(httpRequest.api + '/eventsNotDeadline').then(response => event.value = response.data.data[eventId.value - 1]);
}
</script>

<style scoped>
.v-table {
    margin-left: 25%;
    box-shadow: 5px 5px 10px gray;
}
.div{
    margin-left: 29%;
}
img {
    margin-left: 25%;
    margin-top: 5%;
}
</style>