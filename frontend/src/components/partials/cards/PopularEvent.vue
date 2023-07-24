<template>
    <div class="mt-6 ml-16 mr-16" id="nav-scroll">
        <slot></slot>
        <div class="ml-4 mr-8 d-flex justify-space-evenly flex-wrap">
            <cardTemplate v-for="event of events.recommendEvent" :key="event.id" :event="event"></cardTemplate>
        </div>
    </div>
</template>
<script setup>
import cardTemplate from './CardTemplate.vue'
import { onMounted } from 'vue'
import { eventStores } from '@/stores/eventsStore.js'
import { sessionStore } from '@/stores/session.js'
const { getSession } = sessionStore()
const events = eventStores()

onMounted(() => {
    let latitude = getSession('latitude')
    let longitude = getSession('longitude')
    let km = 6
    events.getRecommendEvent(latitude, longitude, km)
})
</script>

<style scoped>
.card {
    width: 22%;

}

img {
    width: 100%;
    border-radius: 10px;
}

#booking {
    margin-left: 70%;
}
</style>
