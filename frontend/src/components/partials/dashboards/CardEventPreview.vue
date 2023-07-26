<template>
    <v-card class=" bg-white pa-3 mt-4 mr-10 overflow-y-auto" :elevation="2" style="border-left: 3px solid red; border-radius: 10px;">
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
                <p class="mt-2">{{ props.eventPreview.location }}</p>
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
                            <v-list-item-title>Edit</v-list-item-title>
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
import { ref, defineProps } from 'vue';
import { sweetAlert } from '@/stores/sweetAlert.js';
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