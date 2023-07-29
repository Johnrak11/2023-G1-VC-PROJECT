<template>
    <!-- <v-card class="bg-white pa-3 mt-4 mr-10 overflow-y-auto" :elevation="2">
        <div class="d-flex justify-space-between">
            <div class="d-flex">
                <img class="rounded" :src="props.eventPreview.image" alt="" width="60" height="60">
                <div>
                    <strong class="ml-6">Title</strong>
                    <p class=" ml-6 mt-2">{{ props.eventPreview.name }}</p>
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
                <p class="mt-2">{{ truncateDescription(props.eventPreview.location, 20) }}</p>
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
                        <v-list-item value="list" v-if="currentpath !== '/dashboard/event'"
                            @click="alert.publicAlert(props.eventPreview.id)">
                            <v-list-item-title>Post</v-list-item-title>
                        </v-list-item>
                        <v-list-item value="list" class='d-flex align-center'>
                            <EditEventDialog :eventId="props.eventPreview.id">
                                Edit
                            </EditEventDialog>
                        </v-list-item>
                        <v-list-item value="list" @click="
                            router.push(`/dashboard/attendees/${props.eventPreview.id}`)
                            " v-if="currentpath === '/dashboard/event'">
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
    </v-card> -->
    <v-table fixed-header height="82vh" style=" margin-right: 10%; border-radius: 5px; width: 97%; overflow-y: hidden;"
        class="list-user">
        <thead class="users">
            <tr>
                <th class="text-left bg-red" style="width: 10%;">
                    Image
                </th>
                <th class="text-left bg-red" style="width: 25%;">
                    Title
                </th>
                <th class="text-left bg-red" style="width: 15%;">
                    Date
                </th>
                <th class="text-left bg-red" style="width: 10%;">
                    Time
                </th>
                <th class="text-left bg-red" style="width: 25%;">
                    Location
                </th>
                <th class="text-left bg-red" style="width: 30%;">
                    Venue
                </th>
                <th class="text-left bg-red" style="width: 10%;">
                    actions
                </th>
            </tr>
        </thead>
        <tbody v-for="eventPreview of eventPreviewStorage.eventPreviews" :key="eventPreview.id"
            :eventPreview="eventPreview">
            <tr style="border: 1px solid black;">
                <td><img :src="eventPreview.image" alt="" width="50" class="mt-2"></td>
                <td>{{ eventPreview.name }}</td>
                <td>{{ eventPreview.date }}</td>
                <td>{{ eventPreview.time }}</td>
                <td>{{ truncateDescription(eventPreview.location) }}</td>
                <td>{{ eventPreview.venue }}</td>
                <td>
                    <div class="mt-3">
                        <v-menu>
                            <template v-slot:activator="{ props }">
                                <v-icon class="mt-2" v-bind="props">mdi-dots-vertical</v-icon>
                            </template>
                            <v-list>
                                <v-list-item value="list" v-if="currentpath !== '/dashboard/event'"
                                    @click="alert.publicAlert(eventPreview.id)">
                                    <v-list-item-title>Post</v-list-item-title>
                                </v-list-item>
                                <v-list-item value="list" class='d-flex align-center'>
                                    <EditEventDialog :eventId="eventPreview.id">
                                        Edit
                                    </EditEventDialog>
                                </v-list-item>
                                <v-list-item value="list" @click="
                                    router.push(`/dashboard/attendees/${eventPreview.id}`)
                                    " v-if="currentpath === '/dashboard/event'">
                                    <v-list-item-title>Attendees</v-list-item-title>
                                </v-list-item>
                                <v-list-item v-else value="list">
                                    <v-list-item-title>Delete</v-list-item-title>
                                </v-list-item>
                                <v-list-item value="list" v-if="currentpath === '/dashboard/event'">
                                    <QrcodeDialog :eventInfor="eventPreview">QR CODE</QrcodeDialog>
                                </v-list-item>
                            </v-list>
                        </v-menu>
                    </div>
                </td>
            </tr>
            <hr>
        </tbody>
    </v-table>
</template>

<script setup>
import EditEventDialog from "@/components/events/editEvents/EditEventDialog.vue";
import { ref } from 'vue';
import { eventCreateStores } from '@/stores/eventCreate.js';
import { eventPreviewStores } from "@/stores/eventPreview.js";
import { sweetAlert } from '@/stores/sweetAlert.js';
const eventPreviewStorage = eventPreviewStores()
const { truncateDescription } = eventCreateStores()
// const props = defineProps({
//     eventPreview: Object
// })
import router from "@/routes/router.js";
import { onMounted } from 'vue'
import QrcodeDialog from '@/components/qrCode/QrCodeDialog.vue'

onMounted(() => {
    eventPreviewStorage.getOrganizerEvent(0)
})
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