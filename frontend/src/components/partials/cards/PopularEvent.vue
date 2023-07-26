<template>
    <div class="mt-6 ml-16 mr-16" id="nav-scroll">
        <slot></slot>
        <div class="ml-4 mr-8 d-flex justify-space-evenly flex-wrap">
<<<<<<< HEAD
            <cardTemplate v-for="event of events.recommendEvent" :key="event.id" :event="event"></cardTemplate>
=======
            <cardTemplate v-for="event of events.recommendEventLimit" :key="event.id" :event="event"></cardTemplate>
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
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
<<<<<<< HEAD
    let km = 6
=======
    let km = 10
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
    events.getRecommendEvent(latitude, longitude, km)
})
</script>

<style scoped>
.card {
    width: 22%;
<<<<<<< HEAD

=======
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
}

img {
    width: 100%;
    border-radius: 10px;
}

#booking {
    margin-left: 70%;
}
</style>
