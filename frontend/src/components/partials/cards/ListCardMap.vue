<template>
    <div id="card-scroll" class="overflow-y-auto mt-15" v-scroll.self="onScroll" style="width: 50%;height: 100vh">
        <slot></slot>
        <div class="ml-12 mt-5 mb-5 d-flex justify-space-evenly flex-wrap">
            <CardMapTemplate v-for="event of events.recommendEvent" :key="event.id" :event="event"></CardMapTemplate>
            <div v-if="events.recommendEvent.length === 0" class="not-found d-flex flex-column align-center"
                style="margin-top: 38%;">
                <img :src="searchGif" style="width: 90px">
                <h2>There are no upcoming Events in your area..</h2>
            </div>
        </div>
    </div>
</template>
<script setup>
import CardMapTemplate from './CardMapTemplate.vue'
import { ref, onMounted } from 'vue'
import searchGif from '@/assets/iconSearch.gif'
import { sessionStore } from '@/stores/session.js'
const { getSession } = sessionStore()
import { eventStores } from '@/stores/eventsStore.js'
const events = eventStores()

const scrollInvoked = ref(0)
function onScroll() {
    scrollInvoked.value++
}

onMounted(() => {
    let latitude = getSession('latitude')
    let longitude = getSession('longitude')
    let km = 5
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

#card-scroll::-webkit-scrollbar {
    display: none;
}
</style>
