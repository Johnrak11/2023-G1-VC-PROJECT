<template>
    <div style="height:250px; width:540px" v-if="eventinfor.latitude" class="rounded">
        <l-map ref="map" v-model:zoom="zoom" :center="[eventinfor.latitude, eventinfor.longitude]">
            <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" layer-type="base"
                name="OpenStreetMap"></l-tile-layer>
            <l-marker :lat-lng="[eventinfor.latitude, eventinfor.longitude]">
                <l-popup>
                    <MapShowCard v-if="eventinfor" :event="eventinfor"></MapShowCard>
                </l-popup>
            </l-marker>
        </l-map>
    </div>
</template>
  
<script setup>
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker, LPopup } from "@vue-leaflet/vue-leaflet";
import { ref, defineProps } from "vue";
import MapShowCard from '../partials/cards/MapShowCard.vue'

const zoom = ref(12)

const props = defineProps({
    eventInfor: Object
})

const eventinfor = ref(props.eventInfor)
</script>
  
<style></style>