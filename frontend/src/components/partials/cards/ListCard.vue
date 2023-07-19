<template>
    <div class="mt-6" id="nav-scroll" style="margin-left: 5%;">
        <slot></slot>
        <div class="ml-10 mr-8 d-flex flex-wrap">
            <cardTemplate v-for="event of events.events" :key="event.id" :event="event"></cardTemplate>
        </div>
        <!-- </router-link> -->
    </div>
</template>
<script setup>
import cardTemplate from './CardTemplate.vue'
// import cardLoader from './CardLoader.vue'
import router from "@/routes/router.js";
import { onMounted } from 'vue'
import { eventStores } from '@/stores/eventsStore.js'
const events = eventStores()

onMounted(() => {
    const currentPageRoute = router.currentRoute.value.query.page;
    if (currentPageRoute) {
        events.getPaginationData(currentPageRoute)
        console.log(currentPageRoute)
    } else {
        events.getDataAxios()
    }
})
</script>

<style scoped>

/* img {
    width: 100%;
    border-radius: 10px;
} */

#booking {
    margin-left: 70%;
}
</style>
