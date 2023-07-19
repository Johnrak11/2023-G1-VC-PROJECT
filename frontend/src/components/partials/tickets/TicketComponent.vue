<template>
    <div v-if="tickets.tickets.length > 0">
        <v-hover v-slot="{ isHovering, props }" v-for="ticket of tickets.tickets" :key="ticket.id" style="width: 100%;">
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
                        <p>Booking date: {{ ticket.booking_date }}</p>
                    </div>
                </div>
                <div class="mr-10">
                    <p class="mt-2">Ticket code: </p>
                    <h2 style="margin-top: -20%;" class="ml-5">{{ ticket.ticket_code }}</h2>
                </div>
            </div>
        </v-hover>
    </div>
    <div v-else class="d-flex flex-column">
        <div class="d-flex mt-16" style="margin-left: 40%;">
            <img src="https://static.vecteezy.com/system/resources/previews/015/117/356/original/ticket-icon-in-white-colors-voucher-signs-illustration-png.png" alt="" width="200">
        </div>
        <h2 class="text-center text-grey-lighten-1">You don't have any tickets yet !!!</h2>
    </div>
</template>

<script setup>
import ticketStore from '@/stores/ticketStore'
import { onMounted } from "vue";
const tickets = ticketStore();
onMounted(() => {
  tickets.getDataTickets(); 
});
</script>