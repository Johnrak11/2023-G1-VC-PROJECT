<template>
    <v-card class="bg-white pa-3 mt-4 mr-10 overflow-y-auto" :elevation="2">
        <div class="d-flex justify-space-between">
            <div class="d-flex">
                <img class="rounded" :src="props.eventPreview.image" alt="" width="125" height="80" />
                <div>
                    <h2 class="ml-6">{{ props.eventPreview.name }}</h2>
                    <div class="d-flex justify-space-between ml-3">
                        <div class="d-flex">
                            <v-icon class="mt-2">mdi-map-marker</v-icon>
                            <div class="text ml-2">
                                <span class="text-grey-lighten-1">Status</span><br />
                                <p class="mt-0">Publish</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <v-icon class="mt-2">mdi-calendar</v-icon>
                            <div class="text ml-3">
                                <span class="text-grey-lighten-1">Start on</span>
                                <p class="mt-0">30 June,2023 7:30AM</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <v-icon class="mt-2">mdi-calendar</v-icon>
                            <div class="text ml-3">
                                <span class="text-grey-lighten-1">Ticket</span>
                                <p class="mt-0">500</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <v-icon class="mt-2">mdi-map</v-icon>
                            <div class="text ml-3">
                                <span class="text-grey-lighten-1">Tickets sold</span>
                                <p class="mt-0">430</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <strong>Date</strong>
                <p class="mt-2">{{ props.eventPreview.date }}</p>
            </div>
            <div>
                <strong>Time</strong>
                <p class="mt-2">{{ props.eventPreview.time }}</p>
            </div>
            <div>
                <strong>Location</strong>
                <p class="mt-2">{{ truncateDescription(props.eventPreview.location,20) }}</p>
            </div>
            <div>
                <strong>Venue</strong>
                <p class="mt-2">{{ props.eventPreview.venue }}</p>
            </div>
            <div class="mt-3">
                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-icon class="mt-2" v-bind="props">mdi-dots-vertical</v-icon>
                    </template>
                    <v-list>
                        <v-list-item value="list" @click="alert.publicAlert(props.eventPreview.id)">
                            <v-list-item-title>Post</v-list-item-title>
                        </v-list-item>
                        <v-list-item value="list">
                            <EditEventDialog :eventId="props.eventPreview.id">Edit</EditEventDialog>
                        </v-list-item>
                        <v-list-item value="list" @click="router.push(`/dashboard/attendees/${props.eventPreview.id}`)"
                            v-if="currentpath === '/dashboard/event'">
                            <v-list-item-title>Attendees</v-list-item-title>
                        </v-list-item>
                        <v-list-item v-else value="list">
                            <v-list-item-title>Delete</v-list-item-title>
                        </v-list-item>
                        <v-list-item value="list" v-if="currentpath === '/dashboard/event'">
                            <QrcodeDialog :eventInfor="props.eventPreview">QR CODE</QrcodeDialog>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </div>
        </div>
    </v-card>
</template>

<script setup>
import EditEventDialog from "@/components/events/editEvents/EditEventDialog.vue";
import { ref, defineProps } from 'vue';
import { sweetAlert } from '@/stores/sweetAlert.js';
import { eventCreateStores } from '@/stores/eventCreate.js';
const {truncateDescription} = eventCreateStores()
const props = defineProps({
    eventPreview: Object
})
import router from "@/routes/router.js";
import { onMounted } from 'vue'
import QrcodeDialog from '@/components/qrCode/QrCodeDialog.vue'

const currentpath = ref('')
onMounted(() => {
    const currentPageRoute = router.currentRoute.value.path;
    currentpath.value = currentPageRoute

})


const alert = sweetAlert()
</script>
<style scoped>
.text {
    font-size: 12px;
}
</style>