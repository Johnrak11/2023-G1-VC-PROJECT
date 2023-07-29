<template>
    <tr v-if="props.eventData" style="border: 1px solid black;">
        <td><img :src="props.eventData?.image" alt="" width="50" class="mt-2"></td>
        <td>{{ props.eventData.name }}</td>
        <td>{{ truncateDescription(props.eventData.description, 20) }}</td>
        <td>{{ props.eventData.date }}</td>
        <td>{{ props.eventData.time }}</td>
        <td>{{ truncateDescription(props.eventData.location, 20) }}</td>
        <td>{{ props.eventData.venue }}</td>
        <td>
            <div class="mt-3">
                <v-menu>
                    <template v-slot:activator="{ props }">
                        <v-icon class="action" style=" margin-top: -10%; padding: 15px; border-radius: 50%;"
                            v-bind="props">mdi-dots-horizontal</v-icon>
                    </template>
                    <v-list>
                        <v-list-item value="list" v-if="currentpath !== '/dashboard/event'"
                            @click="alert.publicAlert(eventData.id)">
                            <v-list-item-title>Post</v-list-item-title>
                        </v-list-item>
                        <v-list-item value="list" class='d-flex align-center'>
                            <EditEventDialog :eventId="eventData.id">
                                Edit
                            </EditEventDialog>
                        </v-list-item>
                        <v-list-item value="list" @click="
                            router.push(`/dashboard/attendees/${props.eventData.id}`)
                            " v-if="currentpath === '/dashboard/event'">
                            <v-list-item-title>Attendees</v-list-item-title>
                        </v-list-item>
                        <v-list-item v-else value="list" @click="deletePreviewEvent">
                            <v-list-item-title>Delete</v-list-item-title>
                        </v-list-item>
                        <v-list-item value="list" v-if="currentpath === '/dashboard/event'">
                            <QrcodeDialog :eventInfor="props.eventData">QR CODE</QrcodeDialog>
                        </v-list-item>
                    </v-list>
                </v-menu>
            </div>
        </td>
    </tr>
    <hr>

    <!-- </v-table> -->
</template>

<script setup>
import EditEventDialog from "@/components/events/editEvents/EditEventDialog.vue";
import { ref } from 'vue';
import { defineProps } from "vue";
import { eventCreateStores } from '@/stores/eventCreate.js';
import { sweetAlert } from '@/stores/sweetAlert.js';

const { truncateDescription } = eventCreateStores()
const props = defineProps({
    eventData: Object
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

async function deletePreviewEvent() {
    alert.deleteEventAlert(props.eventData.id)
}
</script>
<style scoped>
.action:hover {
    background: rgb(186, 182, 182);
}

.text {
    font-size: 12px;
}
</style>