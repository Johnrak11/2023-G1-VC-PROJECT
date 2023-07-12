<template>
    <navigation-bar></navigation-bar>
    <div class="d-flex">
            <v-card class="w-25" style="height: 100vh; padding-top: 5%;" elevation="7">
                <div class="ml-7 left" style="overflow-y: auto;">
                    <h1>My account</h1>
                    <div class="mt-5">
                        <p>Cart</p>
                        <p>Cart</p>
                        <p>Cart</p>
                        <p>Cart</p>
                        <p>Cart</p>
                        <p>Cart</p>
                        <p>Cart</p>
                    </div>
                </div>
            </v-card>
        <div class=" w-75 list bg-white pl-10" style="margin-top: 5%; height: 89vh; overflow-y: scroll; width: 100%; padding-right: 5%;">
            <div class="d-flex">
                <p class="event w-75">Event</p>
                <div class="d-flex w-25 justify-space-between">
                    <p>Venue</p>
                    <p>Price</p>
                </div>
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
