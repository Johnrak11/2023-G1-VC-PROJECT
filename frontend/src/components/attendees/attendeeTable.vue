<template>
    <v-container class="mt-10" style="height: 92vh; overflow-y: auto;">
        <searchAttendee class="mt-16" :export-to-excel="exportToExcel" />
        <v-table class="tbl_exporttable_to_xls mx-auto mb-12">
            <!-- Table header -->
            <thead>
                <tr>
                    <th class="text-left font-weight-bold">First Name</th>
                    <th class="text-left font-weight-bold">Last Name</th>
                    <th class="text-left font-weight-bold">Email</th>
                    <th class="text-left font-weight-bold">Phone Number</th>
                    <th class="text-left font-weight-bold">Booking Date</th>
                    <th class="text-left font-weight-bold">Attended</th>
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                <tr v-for="attendee in attendees" :key="attendee.id">
                    <!-- Use Vuetify's responsive layout classes to control visibility -->
                    <td class="d-lg-table-cell">{{ attendee.user.firstname }}</td>
                    <td class="d-lg-table-cell">{{ attendee.user.lastname }}</td>
                    <td class="d-lg-table-cell">{{ attendee.user.email }}</td>
                    <td class="d-none d-lg-table-cell">
                        {{ attendee.user.phone_number ? attendee.user.phone_number : 'N/A' }}
                    </td>
                    <td class="d-none d-lg-table-cell">{{ attendee.booking_date }}</td>
                    <td class="d-none d-lg-table-cell">
                        {{ attendee.is_check_in ? 'Present' : 'Absent' }}
                    </td>

                    <!-- Show this for tablet and mobile devices -->
                    <td class="d-table-cell d-lg-none">
                        {{ attendee.user.firstname }} {{ attendee.user.lastname }}
                    </td>
                    <td class="d-table-cell d-lg-none">{{ attendee.user.email }}</td>
                    <td class="d-table-cell d-lg-none">
                        {{ attendee.user.phone_number ? attendee.user.phone_number : 'N/A' }}
                    </td>
                    <td class="d-table-cell d-lg-none">{{ attendee.booking_date }}</td>
                    <td class="d-table-cell d-lg-none">
                        {{ attendee.is_check_in ? 'Present' : 'Absent' }}
                    </td>
                </tr>
            </tbody>
        </v-table>
    </v-container>
</template>
  
<script setup>
import searchAttendee from "./headListAttendee.vue";
import { onMounted, ref } from "vue";
import { useRoute } from "vue-router";
import baseAPI from "@/stores/axiosHandle.js";
import * as XLSX from "xlsx";

const attendees = ref([]);
const eventId = ref(null);
const route = useRoute();

function exportToExcel() {
    const workbook = XLSX.utils.book_new();
    const worksheet = XLSX.utils.json_to_sheet([]);

    // Set column widths
    const columnWidths = [
        { wch: 15 }, // First Name
        { wch: 15 }, // Last Name
        { wch: 25 }, // Email
        { wch: 20 }, // Phone Number
        { wch: 15 }, // Booking Date
        { wch: 15 }, // Attended
    ];

    // Apply column widths to the worksheet
    worksheet["!cols"] = columnWidths;

    // Add header row
    XLSX.utils.sheet_add_aoa(
        worksheet,
        [
            ["First Name", "Last Name", "Email", "Phone Number", "Booking Date", "Attended"],
        ],
        { origin: "A1" }
    );

    // Add data rows
    attendees.value.forEach((attendee, index) => {
        const rowIndex = index + 2;
        XLSX.utils.sheet_add_aoa(
            worksheet,
            [
                [
                    attendee.user.firstname,
                    attendee.user.lastname,
                    attendee.user.email,
                    attendee.user.phone_number ? attendee.user.phone_number : "N/A",
                    attendee.booking_date,
                    attendee.is_check_in ? "Present" : "Absent",
                ],
            ],
            { origin: `A${rowIndex}` }
        );
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
    return baseAPI.get(`/tickets/attendees/${eventId.value}`);
}

onMounted(async () => {
    try {
        const response = await fetchOwnerTicket();
        attendees.value = response.data.data;
    } catch (error) {
        console.error(error);
    }
});

</script>
  
<style scoped>
.attendee {
    margin-left: 10%;
}

.v-table {
    box-shadow: 5px 5px 5px gray;
}

/* Add the following styles to set a fixed header row */
.v-table table {
    table-layout: fixed;
}

.v-table thead tr {
    position: sticky;
    top: 0;
    background-color: #f5f5f5;
}
</style>
  