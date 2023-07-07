
<template>
    <div class="mt-6 ml-16 mr-16">
        <div class="ml-16">
            <h1>Upcoming Events</h1>
            <p>You can chooses to display feature</p>
        </div>
        <div class="ml-4 mr-8 d-flex justify-space-evenly flex-wrap">
            <cardTemplate v-for="event of events.events" :key="event.id" :event="event"></cardTemplate>
        </div>
    </div>
</template>
<script setup>
import cardTemplate from './CardTemplate.vue'

import { onMounted } from 'vue'
import eventStores from '@/stores/eventsStore.js'

const events = eventStores()
onMounted(() => {
    events.getDataAxios()
})
</script>

