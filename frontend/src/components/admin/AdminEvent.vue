<template>
  <v-card>
    <v-layout>
      <v-main class="bg-grey-lighten-2">
        <NavbarDashboard/>
        <AdminListCard></AdminListCard>
        <ContainLeftAdmin />
      </v-main>
    </v-layout>
  </v-card>
</template>
<script setup>
import ContainLeftAdmin from "../../views/admin/ContainLeftAdmin.vue";
import NavbarDashboard from "../partials/nav/NavbarDashboard.vue";
import AdminListCard from "./adminCards/AdminListCard.vue";
</script>
<style scoped>
.border {
  border: 1px solid black;
}
</style>
  