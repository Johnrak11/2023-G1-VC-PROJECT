<template>
    <div class="d-flex">
        <navigation-bar></navigation-bar>
        <!-- <div style="margin-right: 50%;">
        </div> -->
        <v-card style="width: 20%; margin-top: 5%;">
          <v-list-item prepend-icon="mdi-home-city" title="Tickets" value="ticket" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="History" value="history" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="Dashboard" value="dashboard" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="Dashboard" value="dashboard" class="hover"></v-list-item>
          <v-list-item prepend-icon="mdi-home-city" title="Dashboard" value="dashboard" class="hover"></v-list-item>

        </v-card>
        <div class="list bg-grey-lighten-3"
        style=" height: 89vh; overflow-y: scroll; width: 100%; margin-top: 5%;">
            <div style="position: fixed; width: 100%;" class="bg-grey-lighten-3">
                <div  class="d-flex justify-space-between mt-5">
                    <div class="ml-10">
                        <h2>All tickets</h2>
                    </div>
                    <div class="d-flex w-50" style="margin-right: 20%;">
                        <v-text-field :loading="loading" density="compact" variant="solo" label="Search tickets..."
                            append-inner-icon="mdi-magnify" single-line hide-details
                            @click:append-inner="onClick" style="width: 100%;">
                        </v-text-field>
                        <img src="https://o.remove.bg/downloads/04cd30b5-5e24-4e78-84fd-1a27650778dc/335-3355441_ticket-icon-white-png-removebg-preview.png" alt="" width="70">
                    </div>
                </div>
            </div>
            <div  class="pl-10 mr-10" style="margin-top: 7%;">
                <TicketComponent></TicketComponent>
            </div>
        </div>
    </div>
</template>
<script setup>
import TicketComponent from '../../components/partials/tickets/TicketComponent.vue';
import { ref } from 'vue'

const loaded = ref(false)
const loading = ref(false)

const onClick = () => {
loading.value = true

setTimeout(() => {
    loading.value = false
    loaded.value = true
}, 2000)
}
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
</style>
