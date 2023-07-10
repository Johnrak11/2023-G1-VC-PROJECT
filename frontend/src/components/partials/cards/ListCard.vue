
<template>
    
    <div class="mt-6 ml-16 mr-16">
        <slot></slot>
        <div class="ml-4 mr-8 d-flex justify-space-evenly flex-wrap">
            <cardTemplate v-for="event of events.events" :key="event.id" :event="event"></cardTemplate>
        </div>
        <!-- </router-link> -->
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
<style scoped>
    .card{
        width: 22%;
        
    }
    img{
        width: 100%;
        border-radius: 10px;
    }
    #booking{
        margin-left: 70%;
    }
</style>
