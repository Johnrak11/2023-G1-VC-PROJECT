<template>
    <v-container class="mt-10">
        <searchAttendee class="mt-16" />
        <v-table class=" mx-auto mt-1 bg-gray">
            <thead>
                <tr>
                    <th class="text-left">
                        First Name
                    </th>
                    <th class="text-left">
                        Last Name
                    </th>
                    <th class="text-left">
                        Email
                    </th>
                    <th class="text-left">
                        Phone Number
                    </th>
                    <th class="text-left">
                        Booking Date
                    </th>
                    <th class="text-left">
                        Attended
                    </th>

                </tr>
            </thead>
            <tbody>
                <tr v-for="attendee in attendees" :key="attendee.id">
                    <td>{{ attendee.user.firstname }}</td>
                    <td>{{ attendee.user.lastname }}</td>
                    <td>{{ attendee.user.email }}</td>
                    <td>{{ attendee.user.phone_number }}</td>
                    <td>{{ attendee.booking_date }}</td>
                    <td>Ok</td>
                </tr>
            </tbody>
        </v-table>
    </v-container>
</template>
<script setup>
import searchAttendee from "./searchAttendee.vue";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import baseAPI from "@/stores/axiosHandle.js";

const attendees = ref([]);
const eventId = ref(null);
const route = useRoute();
onMounted(async () => {
    try {
        const response = await fetchOwnerTicket();
        attendees.value = response.data.data;
        console.log(response.data.data);
    } catch (error) {
        console.error(error);
        // Display an error message to the user
    }
});

async function fetchOwnerTicket() {
    eventId.value = route.params.eventId;
    console.log(eventId.value);
    return baseAPI.get(`/ticket/${eventId.value}`);
}

</script>
<style scoped>
.attendee {
    margin-left: 10%;
}
.v-table{
    box-shadow: 5px 5px 5px gray;
}
</style>