<template>
    <div v-if="tickets.lenght == 0">
        <div class="d-flex mt-10" style="margin-left: 15%;" >
            <img src="https://o.remove.bg/downloads/4ee5f78b-85ba-4566-a6a2-fca7bc21679d/download-removebg-preview.png" alt="">
        </div>
        <h2 class="text-center text-grey-lighten-1">You don't have ticket yet, please booking an event!!!</h2>
    </div>
    <div>
        <v-hover v-slot="{ isHovering, props }" v-for="ticket of tickets.tickets" :key="ticket" style="width: 100%;">
            <div 
            v-bind="props"
            :class="`elevation-${isHovering }`"
            class="pa-3 mt-5 d-flex rounded-lg bg-grey-lighten-3 justify-space-between"
            style="border-left: 5px solid red; height: 13vh; cursor: pointer;"
            >
                <div class="d-flex ">
                    <div>
                        <img class="rounded-xl" src="https://wheninphnompenh.com/wp-content/uploads/2023/05/DSC_0078-1024x1024.jpg" width="70" alt="">
                    </div>
                    <div class="ml-5">
                        <h3>{{ ticket.event.name }}</h3><br>
                        <p>{{ ticket.event.date }} {{ ticket.event.time }}</p>
                    </div>
                </div>
                <div class="mt-5">
                    <p><span class="bold">Location:</span> {{ ticket.event.location }}</p>
                    <p>Venue: {{ ticket.event.venue }}</p>
                </div>
                <div class="d-flex ">
                    <div class="mt-8">
                        <!-- <p>Ticket Number: {{ticket.ticket_code}}</p> -->
                        <p>Booking date: {{ ticket.booking_date }}</p>
                    </div>
                </div>
                <h1 class="mt-3 mr-10" >{{ ticket.ticket_code }}</h1>
            </div>
        </v-hover>
    </div>
</template>
<script setup>
import TicketStore from '@/stores/ticketStore'
import { onMounted } from "vue";
const tickets = TicketStore();
onMounted(async () => {
  await tickets.getDataTickets(2); 
});
</script>