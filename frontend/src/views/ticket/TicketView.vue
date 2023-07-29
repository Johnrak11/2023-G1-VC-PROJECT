<template>
    <div>
        <navigation-bar></navigation-bar>
        <div class="d-flex">
            <div class="list " style=" width: 100%; margin-top: 5%; margin-left: 5%;">
                <div class="bg-white">
                    <div class="d-flex justify-space-between mt-5">
                        <div class="ml-10">
                            <h2>All tickets</h2>
                        </div>
                        <div class="d-flex w-50" style="margin-right: 8%;">
                            <v-text-field :loading="loading" density="compact" variant="solo" label="Search tickets..."
                                append-icon="mdi-magnify" single-line hide-details @click:append="searchEventTicket"
                                @keydown.enter="searchEventTicket" style="width: 100%;" v-model="name">
                            </v-text-field>
                        </div>
                    </div>
                </div>
                <div class="pl-10 ticket-card" style="margin-top: 2%;height: 65vh;overflow-y: scroll; margin-right: 8%;">
                    <div v-if="!tickets.tickets || !tickets.tickets.length" class="d-flex flex-column">
                        <div class="d-flex mt-16" style="margin-left: 40%;">
                            <img src="https://static.vecteezy.com/system/resources/previews/015/117/356/original/ticket-icon-in-white-colors-voucher-signs-illustration-png.png"
                                alt="" width="200">
                        </div>
                        <h2 class="text-center text-grey-lighten-1">You don't have a ticket, please purchase a ticket to
                            attend !!!</h2>
                    </div>
                    <div v-else>
                        <TicketComponent></TicketComponent>
                    </div>
                </div>
            </div>
        </div><br>
        <footer-view></footer-view>
    </div>
</template>
<script setup>
import TicketComponent from '../../components/partials/tickets/TicketComponent.vue';
import { ticketStore } from "@/stores/ticketStore";
const tickets = ticketStore();
import { ref } from 'vue';
const loading = ref(false);
const name = ref('');
import { onMounted } from 'vue'

async function searchEventTicket() {
    try {
        loading.value = true;
        await tickets.searchTickets(name.value);
    } finally {
        loading.value = false;
    }
    console.log(name.value);
}
onMounted(() => {
    tickets.getDataTickets()
})

</script>
<style scoped>
.left p {
    margin-top: 5%;
}

.list::-webkit-scrollbar {
    display: none;
}

.hover:hover {
    background: #EEEEEE;
    cursor: pointer;
}

.ticket-card::-webkit-scrollbar {
    display: none;
}
</style>
