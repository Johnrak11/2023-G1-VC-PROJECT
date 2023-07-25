<template>
    <v-card class=" bg-white pa-3 mt-4 mr-10 overflow-y-auto" :elevation="2">
        <div class="d-flex justify-space-between">
            <div class="d-flex">
                <img class="rounded" :src="props.eventPreview.image" alt="" width="125" height="80">
                <div>
                    <h2 class=" ml-6">{{ props.eventPreview.name }}</h2>
                    <div class="d-flex justify-space-between ml-3">
                        <div class="d-flex">
                            <!-- <img src="https://cdn-icons-png.flaticon.com/512/3082/3082383.png" alt="" width="30"> -->
                            <v-icon class="mt-2">mdi-map-marker</v-icon>
                            <div class="text ml-2">
                                <span class="text-grey-lighten-1">Status</span><br>
                                <p class="mt-0">Publish</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- <img src="https://cdn-icons-png.flaticon.com/512/3564/3564808.png" alt="" width="30"> -->
                            <v-icon class="mt-2">mdi-calendar</v-icon>
                            <div class="text ml-3">
                                <span class="text-grey-lighten-1">Start on</span>
                                <p class="mt-0">30 June,2023 7:30AM</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- <img src="https://cdn-icons-png.flaticon.com/512/4406/4406665.png" alt="" width="30"> -->
                            <v-icon class="mt-2">mdi-calendar</v-icon>
                            <div class="text ml-3">
                                <span class="text-grey-lighten-1">Ticket</span>
                                <p class="mt-0">500</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <!-- <img src="https://icons.veryicon.com/png/o/object/material-design-icons-1/tag-24.png" alt="" -->
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
                        <v-list-item value="list">
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