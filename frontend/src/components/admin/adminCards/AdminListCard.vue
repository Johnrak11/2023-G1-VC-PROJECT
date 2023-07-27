<template>
    <v-card class="bg-grey-lighten-2 card-event" style="height: 100vh; overflow-y: scroll">
        <ul class="mt-16 ml-8">
            <li class="d-flex icon mt-2">
                <v-list-item prepend-icon="mdi-calendar" title="Event" value="event"></v-list-item>
            </li>
        </ul>
        <v-card class="bg-white pa-5 mr-10 rounded ml-8" :elevation="5">
            <h3>Event(2)</h3>
            <div>
                <div class="d-flex w-50" style="margin-right: 8%">
                    <v-text-field :loading="loading" density="compact" variant="solo" label="Search tickets..."
                        append-icon="mdi-magnify" single-line hide-details @click:append="searchEventTicket"
                        @keydown.enter="searchEventTicket" style="width: 100%" v-model="name">
                    </v-text-field>
                </div>
            </div>
        </v-card>
        <div class="ml-8 mb-5">
            <AdminCard v-for="event of events.events" :key="event.id" :eventInfor="event" />
        </div>
    </v-card>
</template>

<script setup>
import AdminCard from './AdminCard.vue'
import { onMounted, ref } from "vue";
import { eventStores } from '@/stores/eventsStore.js'
const events = eventStores()
const loading = ref(false);
const name = ref("");
onMounted(() => {
    events.getDataAxios()
})
</script>

<style></style>