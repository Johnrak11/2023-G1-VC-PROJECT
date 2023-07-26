
    <!-- SuccessPage.vue -->

<template>
    <v-container class="success-page">
        <v-row justify="center" v-if="message">
            <v-col cols="12" sm="8" md="6">
                <SuccessCard>
                    <template v-slot:image v-if="isSuccess">
                        <img :src="checkedIcon" alt="" style="width: 60px;">
                        <v-card-title class="text-h5">Success!</v-card-title>
                        <v-card-subtitle class="mb-4">Thank you for joining with us.</v-card-subtitle>
                    </template>
                    <template v-else v-slot:image>
                        <img :src="errorIcon" alt="" style="width: 60px;">
                        <v-card-title class="text-h5">Something Worng!</v-card-title>
                        <v-card-subtitle class="mb-4">Thank you for joining with us.</v-card-subtitle>
                    </template>

                    <template v-slot:title>
                        <v-list-item-title class="text-h8">{{ message }}</v-list-item-title>
                    </template>
                    <template v-slot:content v-if="isSuccess">
                        <v-list-item-content class="d-flex justify-space-between">
                            <v-list-item-title>User name:</v-list-item-title>
                            <v-list-item-title>{{ userName }}</v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-content class="d-flex justify-space-between">
                            <v-list-item-title>Register Date:</v-list-item-title>
                            <v-list-item-title>{{ registerDate }}</v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-content class="d-flex justify-space-between">
                            <v-list-item-title>Event Name:</v-list-item-title>
                            <v-list-item-title>{{ eventName }}</v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-content class="d-flex justify-space-between">
                            <v-list-item-title>Event Start:</v-list-item-title>
                            <v-list-item-title>{{ eventStart }}</v-list-item-title>
                        </v-list-item-content>
                        <v-list-item-content class="d-flex justify-space-between">
                            <v-list-item-title>Ticket Code:</v-list-item-title>
                            <v-list-item-title>{{ ticketCode }}</v-list-item-title>
                        </v-list-item-content>
                    </template>

                </SuccessCard>
            </v-col>
        </v-row>
    </v-container>
</template>

<script setup>
import { onMounted, ref } from "vue";
import baseAPI from "@/stores/axiosHandle";
import router from "@/routes/router";
import SuccessCard from "@/components/comfirmCard/SuccessCard.vue"
import checkedIcon from '@/assets/alertIcon/checked.png'
import errorIcon from '@/assets/alertIcon/cancel.png'
const isSuccess = ref(true)
const userName = ref()
const registerDate = ref()
const eventName = ref()
const eventStart = ref()
const ticketCode = ref()
const message = ref()

async function isCheckIn(eventId) {
    await baseAPI.get(`/tickets/scan/${eventId}`).then(response => {
        let handleResponse = response.data
        isSuccess.value = true;
        userName.value = handleResponse.data.userName
        registerDate.value = handleResponse.data.booking_date
        eventName.value = handleResponse.data.event.name
        eventStart.value = handleResponse.data.event.date
        ticketCode.value = handleResponse.data.ticket_code
        message.value = handleResponse.message
    }).catch(error => {
        console.log(error)
        message.value = error.response.data.message
        isSuccess.value = false;
    })
}

onMounted(() => {
    const currentPageRoute = router.currentRoute.value.params.eventId;
    console.log("router", currentPageRoute);
    isCheckIn(currentPageRoute)
})
</script>


<style scoped>
.success-page {
    padding-top: 80px;
    min-height: 100vh;
}
</style>