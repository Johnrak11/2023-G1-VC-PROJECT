<template>
    <div style="height: auto; width: 50%" class="rounded ml-5 mr-15 mt-16">
        <v-card-text class="search">
            <v-text-field :loading="loading" density="compact" variant="solo" label="Search templates"
                append-inner-icon="mdi-magnify" single-line hide-details @click:append-inner="onClick"></v-text-field>
        </v-card-text>
        <l-map class="rounded" ref="map" v-model:zoom="zoom" :center="center">
            <l-tile-layer url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png" layer-type="base"
                name="OpenStreetMap"></l-tile-layer>
            <l-marker :lat-lng="markerLatLng">
                <!-- <l-popup>
            <MapShowCard v-if="eventinfor" :event="eventinfor"></MapShowCard>
          </l-popup> -->
            </l-marker>
        </l-map>
    </div>
</template>
  
<script setup>
import "leaflet/dist/leaflet.css";
import { LMap, LTileLayer, LMarker } from "@vue-leaflet/vue-leaflet";
import { ref, computed } from "vue";

const zoom = ref(12);
const markerLatLng = ref([11.570809, 104.922381]);


const center = computed(() => {
    return [11.570809, 104.922381];
});

const loaded = ref(false);
const loading = ref(false);

const onClick = () => {
    loading.value = true;

    setTimeout(() => {
        loading.value = false;
        loaded.value = true;
    }, 2000);
};

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