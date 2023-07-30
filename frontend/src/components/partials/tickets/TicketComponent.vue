<template>
    <v-card style=" margin-right: 8%;" class="mt-3 pa-3" :elevation="5" v-for="ticket of tickets.tickets" :key="ticket.id">
        <ul class="d-flex justify-space-between" >
            <li><img :src="ticket.event.image" alt="" style="width: 150px;"></li>
            <li style="margin-left: -5%;" class="mt-5">{{truncateDescription(ticket.event.name, 10)}}</li>
            <li style="margin-left: -5%;" class="mt-5">{{ ticket.event.date }}</li>
            <li style="margin-left: -3%;" class="mt-5">{{ ticket.event.time }}</li>
            <li style="margin-left: -5%;" class="mt-5">{{ truncateDescription(ticket.event.location, 10) }}</li>
            <li style="margin-left: -5%;" class="mt-5">{{ truncateDescription(ticket.event.venue, 10) }}</li>
            <li style="margin-left: -3%;" class="mt-5">{{ ticket.booking_date }}</li>
            <li style="margin-left: -2%;" class="mt-5">{{ ticket.ticket_code }}</li>
            <li v-if="ticket.is_check_in == 0" class="text-red mt-5" style="">Not yet</li>
            <li v-if="ticket.is_check_in == 1" class="text-green mt-5" style="">Done</li>
        </ul>
    </v-card>
</template>

<script setup>
import { ticketStore } from '@/stores/ticketStore.js'
import { onMounted } from "vue";
import { eventCreateStores } from '@/stores/eventCreate.js';

const { truncateDescription } = eventCreateStores()
const tickets = ticketStore();
onMounted(() => {
    tickets.getDataTickets();
});
</script>
<style scoped>
ul li{
    list-style: none;
}
</style>