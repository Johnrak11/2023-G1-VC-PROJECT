<template>
    <v-card v-if="eventinfor">
        <div class="d-flex flex-no-wrap justify-space-between">
            <div>
                <v-card-title class="text-h5">
                    {{ eventinfor.name }}
                </v-card-title>
                <v-card-subtitle>{{ distanationToKm }}</v-card-subtitle>
                <v-card-actions>
                    <a class="direction" :href="getGoogleMapsLink(eventinfor.latitude, eventinfor.longitude)"
                        target="_blank">
                        <v-btn class="ms-2" variant="outlined" size="small">
                            {{ t('showMapCard.direction') }}
                        </v-btn>
                    </a>
                </v-card-actions>
            </div>
            <v-avatar class="ma-3" size="125" rounded="0">
                <v-img :src="eventinfor.image"></v-img>
            </v-avatar>
        </div>
    </v-card>
</template>

<script setup>
import { ref, defineProps } from "vue";
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
const props = defineProps({
    event: Object
})

const eventinfor = ref(props.event)
import { addressStore } from "@/stores/address.js";
const { distance, formatDistance } = addressStore()
import { sessionStore } from "@/stores/session";
const { getSession } = sessionStore()
const userLat = ref(getSession('latitude'))
const userLng = ref(getSession('longitude'))
const distanation = distance(userLat.value, eventinfor.value.latitude, userLng.value, eventinfor.value.longitude)
const distanationToKm = formatDistance(distanation)


function getGoogleMapsLink(lat, lng) {
    return `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
}
</script>

<style scoped>
.direction {
    text-decoration: none;
    color: red;
}
</style>