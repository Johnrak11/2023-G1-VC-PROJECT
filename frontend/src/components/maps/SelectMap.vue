<!-- npm :   npm i -D @vue-leaflet/vue-leaflet leaflet -->
<!-- references https://github.com/vue-leaflet/vue-leaflet -->

<template>
    <l-map class="map-container rounded" ref="map" @click="getLatLng" v-model:zoom="zoom"
        :center="[addressStorage.latitude, addressStorage.longitude]">
        <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" layer-type="base"
            name="OpenStreetMap"></l-tile-layer>
        <l-marker :lat-lng="[addressStorage.latitude, addressStorage.longitude]"></l-marker>
    </l-map>
</template>
  
<script setup>
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
import { ref } from "vue";
import { addressStore } from '../../stores/address.js'
let addressStorage = addressStore()
const zoom = ref(12);

const getLatLng = (event) => {
    const { lat, lng } = event.latlng;
    addressStorage.latitude = lat
    addressStorage.longitude = lng
    console.log([addressStorage.latitude, addressStorage.longitude])
};


</script>
  
<style>
.map-container {
    height: 500px;
    width: 900px;
}
</style>
  