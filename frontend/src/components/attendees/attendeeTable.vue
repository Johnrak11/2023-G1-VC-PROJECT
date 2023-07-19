<template>
    <v-container class="mt-10">
        <searchAttendee class="mt-16" :export-to-excel="exportToExcel"/>
        <v-table class="tbl_exporttable_to_xls mx-auto mt-1 bg-gray">
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
import * as XLSX from 'xlsx';


const attendees = ref([]);
const eventId = ref(null);
const route = useRoute();
onMounted(async () => {
    try {
        const response = await fetchOwnerTicket();
        attendees.value = response.data.data;
    } catch (error) {
        console.error(error);
        // Display an error message to the user
    }
});
// =====References : https://docs.sheetjs.com/docs/=====
function exportToExcel() {
  const workbook = XLSX.utils.book_new();
  const worksheet = XLSX.utils.json_to_sheet([]);

  // Add header row
  XLSX.utils.sheet_add_aoa(worksheet, [["First Name", "Last Name", "Email", "Phone Number", "Booking Date", "Attended"]], { origin: "A1" });

  // Add data rows
  attendees.value.forEach((attendee, index) => {
    const rowIndex = index + 2;
    XLSX.utils.sheet_add_aoa(worksheet, [[attendee.user.firstname, attendee.user.lastname, attendee.user.email, attendee.user.phone_number, attendee.booking_date, "Ok"]], { origin: `A${rowIndex}` });
  });

  XLSX.utils.book_append_sheet(workbook, worksheet, "Attendees");

  const excelBuffer = XLSX.write(workbook, {
    bookType: "xlsx",
    bookSST: true,
    type: "array",
  });
  const fileName = "attendees.xlsx";
  const blob = new Blob([excelBuffer], { type: "application/octet-stream" });
  const url = window.URL.createObjectURL(blob);

  const link = document.createElement("a");
  link.href = url;
  link.setAttribute("download", fileName);
  document.body.appendChild(link);
  link.click();
  document.body.removeChild(link);
}
async function fetchOwnerTicket() {
    eventId.value = route.params.eventId;
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