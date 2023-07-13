<template>
    <navigation-bar></navigation-bar>
    <div class="d-flex">
            <v-card class="w-25 d-flex justify-center" style="height: 100vh;" elevation="7">
                <img src="https://o.remove.bg/downloads/4c580608-c31f-42b5-b151-be5f19b0dc1c/has-removebg-preview.png" alt="" width="300" height="300" style="margin-top: 50%;margin-right: 20%;">
            </v-card>
        <div class=" w-75 list bg-white pl-10" style="margin-top: 5%; height: 89vh; overflow-y: scroll; width: 100%; padding-right: 5%;">
            <div class="d-flex">
                <p class="event w-75">Your Tickets</p>
            </div>
            <hr class="w-100">
            <TicketComponent></TicketComponent>
            </div>
        </div>
</template>
<script setup>
import TicketComponent from '../../components/partials/tickets/TicketComponent.vue';

</script>
<style scoped>
.left p{
    margin-top: 5%;
}
.list::-webkit-scrollbar{
    display: none;
}
</style>
