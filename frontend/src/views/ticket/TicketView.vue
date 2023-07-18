<template>
    <navigation-bar></navigation-bar>
    <div class="d-flex">
        <!-- <div style="margin-right: 50%;">
        </div> -->
        <!-- <v-card style="width: 20%; margin-top: 5%;">
          <v-list-item prepend-icon="mdi-home-city" title="Tickets" value="ticket" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="History" value="history" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="Dashboard" value="dashboard" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="Dashboard" value="dashboard" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="Dashboard" value="dashboard" class="hover"></v-list-item>
          

        </v-card> -->
        <div class="list "
        style=" width: 100%; margin-top: 5%; margin-left: 5%;">
            <div class="bg-white">
                <div  class="d-flex justify-space-between mt-5">
                    <div class="ml-10">
                        <h2>All tickets</h2>
                    </div>
                    <div class="d-flex w-50" style="margin-right: 4%;">
                        <v-text-field :loading="loading" density="compact" variant="solo" label="Search tickets..."
                            append-inner-icon="mdi-magnify" single-line hide-details
                            @click:append-inner="searchEventTicket" style="width: 100%;" v-model="searchName">
                        </v-text-field>
                        <img src="https://o.remove.bg/downloads/04cd30b5-5e24-4e78-84fd-1a27650778dc/335-3355441_ticket-icon-white-png-removebg-preview.png" alt="" width="70">
                    </div>
                </div>
            </div>
            <div  class="pl-10 ticket-card" style="margin-top: 2%;height: 65vh;overflow-y: scroll; margin-right: 8%;">
                <TicketComponent></TicketComponent>
            </div>
        </div>
    </div><br>
    <footer-view></footer-view>
</template>
<script setup>
import TicketComponent from '../../components/partials/tickets/TicketComponent.vue';
// import { ticketStores } from "@/stores/ticketStore";
// import { ref } from 'vue'

// const searchName = ref("");
// const tickets = ticketStores();
// function searchEventTicket() {
//     tickets.searchTickets(searchName.value);
// }



</script>
<style scoped>
.left p {
    margin-top: 5%;
}

.list::-webkit-scrollbar {
    display: none;
}
.hover:hover{
    background: #EEEEEE;
    cursor: pointer;
}
.ticket-card::-webkit-scrollbar{
    display: none;
}
</style>
