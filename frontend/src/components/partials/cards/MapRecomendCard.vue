<template>
    <v-card v-if="eventinfor" class="mx-auto" style="width: 200px;">
        <v-img :src="eventinfor.image" height="150" cover></v-img>

        <v-card-title>
            {{ eventinfor.name }}
        </v-card-title>

        <v-card-subtitle>
            {{ t('listShowMapCard.distanation') + ': ' + distanationToKm }}
        </v-card-subtitle>

        <v-card-subtitle>
            {{ t('listShowMapCard.start date') + ': ' + eventinfor.date }}
        </v-card-subtitle>

        <v-card-actions>
            <router-link :to="`detail/${eventinfor.id}`">
                <v-btn color="red" variant="text">
                    {{ t('listShowMapCard.more detail') }}
                </v-btn>
            </router-link>
        </v-card-actions>
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


</script>

<style scoped>
.direction {
    text-decoration: none;
    color: red;
}
</style>