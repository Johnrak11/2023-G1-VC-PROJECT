<template>
  <!-- <v-card > -->
    <v-layout>
      <v-main class="bg-grey-lighten-3">
        <attendeeTable />
        <ContainLeftDashboardVue />
      </v-main>
    </v-layout>
  <!-- </v-card> -->
</template>
<script setup>
import ContainLeftDashboardVue from "../ContainLeftDashboard.vue"
import attendeeTable from "@/components/attendees/attendeeTable.vue";
</script>

<style></style>