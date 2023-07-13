<template>
    <div>
        <div class="d-flex mt-10" style="margin-left: 15%;" >
            <img src="https://o.remove.bg/downloads/4ee5f78b-85ba-4566-a6a2-fca7bc21679d/download-removebg-preview.png" alt="">
        </div>
        <h2 class="text-center text-grey-lighten-1">You don't have ticket yet, please booking an event!!!</h2>
    </div>
    <!-- <v-hover v-slot="{ isHovering, props }" v-for="ticket of tickets.tickets" :key="ticket" class="ticket-card" style="width: 100%;">
        <div 
        v-bind="props"
        :class="`elevation-${isHovering ? 24 : 6}`"
        class="pa-3 mt-5 d-flex rounded-lg"
        style="border-left: 5px solid red; height: 18vh; cursor: pointer;"
        >
            <div class="d-flex w-75">
                <div>
                    <img class="rounded-xl" src="https://wheninphnompenh.com/wp-content/uploads/2023/05/DSC_0078-1024x1024.jpg" width="100" alt="">
                </div>
                <div class=" ml-9">
                    <h3>{{ ticket.event.name }}</h3>
                    <p>{{ ticket.event.location }}</p>
                    <p>{{ ticket.event.venue }}</p>
                    <p>{{ ticket.event.date }} {{ ticket.event.time }}</p>
                </div>
            </div>
            <div class="d-flex w-25 justify-space-between" style="margin-left: -15%;">
                <div class="mt-5">
                    <p>Ticket Number: {{ticket.ticket_code}}</p>
                    <p>Booking date: {{ ticket.booking_date }}</p>
                </div>
                <h1 class="mt-5" style="margin-right: -40%;">{{ ticket.event.price }}</h1>
            </div>
        </div>
    </v-hover> -->
</template>
<script setup>
import TicketStore from '@/stores/ticketStore'
// import eventStores from "@/stores/eventsStore.js";
// import { axiosStore } from "@/stores/axiosHandle.js";
import { onMounted } from "vue";
const tickets = TicketStore();
onMounted(() => {
    tickets.getDataTickets();
  console.log(tickets);
});
</script>