<template>
<<<<<<< HEAD
    <div id="card-scroll" class="overflow-y-auto mt-15" v-scroll.self="onScroll" style="width: 50%;height: 100vh;">
        <slot></slot>
        <div class="ml-12 mt-5 mb-5 d-flex justify-space-evenly flex-wrap">
            <CardMapTemplate v-for="event of events.recommendEvent" :key="event.id" :event="event"></CardMapTemplate>
=======
    <div id="card-scroll" class="overflow-y-auto mt-15" v-scroll.self="onScroll" style="width: 50%;height: 100vh">
        <slot></slot>
        <div class="ml-12 mt-5 mb-5 d-flex justify-space-evenly flex-wrap">
            <CardMapTemplate v-for="event of events.recommendEvent" :key="event.id" :event="event"></CardMapTemplate>
            <div v-if="events.recommendEvent.length === 0" class="not-found d-flex flex-column align-center"
                style="margin-top: 38%;">
                <img :src="searchGif" style="width: 90px">
                <h2>There are no upcoming Events in your area..</h2>
            </div>
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
        </div>
    </div>
</template>
<script setup>
import CardMapTemplate from './CardMapTemplate.vue'
import { ref, onMounted } from 'vue'
<<<<<<< HEAD

=======
import searchGif from '@/assets/iconSearch.gif'
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
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
<<<<<<< HEAD
    let km = 10
=======
    let km = 5
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
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
<<<<<<< HEAD


<!-- <template>
    <v-card v-scroll.self="onScroll" class="overflow-y-auto" max-height="400">
        <v-banner class="justify-center text-h5 font-weight-light" sticky>
            Scroll Me - Method invoked
            <span class="font-weight-bold" v-text="scrollInvoked"></span>
            times
        </v-banner>

        <v-card-text>
            <div v-for="n in 12" :key="n" class="mb-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi commodi earum tenetur. Asperiores dolorem
                placeat ab nobis iusto culpa, autem molestias molestiae quidem pariatur. Debitis beatae expedita nam facere
                perspiciatis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus ducimus cupiditate rerum
                officiis consequuntur laborum doloremque quaerat ipsa voluptates, nobis nam quis nulla ullam at corporis,
                similique ratione quasi illo!
            </div>
        </v-card-text>
    </v-card>
</template>
<script>
export default {
    data: () => ({
        scrollInvoked: 0,
    }),

    methods: {
        onScroll() {
            this.scrollInvoked++
        },
    },
}
</script> -->
=======
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
