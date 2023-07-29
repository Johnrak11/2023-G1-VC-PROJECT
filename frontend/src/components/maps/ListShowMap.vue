<template>
    <div style="height: auto; width: 50%" class="rounded ml-5 mr-15 mt-16">
        <v-card-text class="search">
            <v-form @submit.prevent="onClick">
            <v-text-field v-model="kilomate" :loading="loading" density="compact" type="number" variant="solo"
                 :label="t('search distanation')" append-inner-icon="mdi-magnify" single-line hide-details
                @click:append-inner="onClick"></v-text-field>
            </v-form>
        </v-card-text>
        <l-map class="rounded" ref="map" v-model:zoom="zoom" :center="center">
            <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" layer-type="base"
                name="OpenStreetMap"></l-tile-layer>
            <l-marker v-for="event of events.recommendEvent" :key="event.id" :lat-lng="[event.latitude, event.longitude]">
                <l-popup>
                    <MapRecomendCard v-if="event" :event="event"></MapRecomendCard>
                </l-popup>
            </l-marker>
            <l-marker :lat-lng="center">
                <l-icon :icon-anchor="staticAnchor" class-name="someExtraClass">
                    <img :src="currentLocationIcon">
                </l-icon>
                <l-popup>
                    You are here..
                </l-popup>
            </l-marker>
        </l-map>
    </div>
</template>
  
<script setup>

import { useI18n } from 'vue-i18n';
const { t } = useI18n();
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LPopup, LIcon } from "@vue-leaflet/vue-leaflet";
import { ref, computed } from "vue";
import { eventStores } from '@/stores/eventsStore.js'
const events = eventStores()
import MapRecomendCard from "../partials/cards/MapRecomendCard.vue";
import { sessionStore } from "@/stores/session";
const { getSession } = sessionStore()
import currentLocationIcon from '@/assets/placeholder.png'

const zoom = ref(13);
const userLat = ref(getSession('latitude'))
const userLng = ref(getSession('longitude'))
const kilomate = ref('');

const center = computed(() => {
    return [userLat.value, userLng.value];
});

const loading = ref(false);
const onClick = async () => {
    loading.value = true;
    console.log(kilomate.value)
    await events.getRecommendEvent(userLat.value, userLng.value, kilomate.value)
    loading.value = false;
};
const staticAnchor = [16, 37]
</script>


<style scoped>
.search {
    position: absolute;
    top: 13%;
    right: 4%;
    z-index: 1000;
    padding: 8px;
    width: 20%;
}
</style>