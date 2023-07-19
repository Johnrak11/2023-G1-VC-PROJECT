<template>
  <v-layout>
      <v-main class="bg-grey-lighten-2">
        <navBar />
        <attendeeTable/>
        <ContainLeftDashboardVue />
      </v-main>
    </v-layout>
</template>

<script setup>
import navBar from "@/components/partials/nav/NavbarDashboard.vue"
import ContainLeftDashboardVue from "../dashboard/ContainLeftDashboard.vue"
import attendeeTable from "@/components/attendees/attendeeTable.vue";
</script>

<style>

</style>