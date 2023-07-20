<template>
    <v-card v-if="eventinfor" color="#1F7087" theme="dark">
        <div class="d-flex flex-no-wrap justify-space-between">
            <div>
                <v-card-title class="text-h5">
                    {{ eventinfor.name }}
                </v-card-title>

                <v-card-subtitle>{{ eventinfor.venue }}</v-card-subtitle>

                <v-card-actions>
                    <a class="direction" :href="getGoogleMapsLink(eventinfor.latitude, eventinfor.longitude)"
                        target="_blank">
                        <v-btn class="ms-2" variant="outlined" size="small">
                            Direction
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

const props = defineProps({
    event: Object
})

const eventinfor = ref(props.event)


function getGoogleMapsLink(lat, lng) {
    return `https://www.google.com/maps/search/?api=1&query=${lat},${lng}`;
}
</script>

<style scoped>
.direction {
    text-decoration: none;
    color: white;
}
</style>