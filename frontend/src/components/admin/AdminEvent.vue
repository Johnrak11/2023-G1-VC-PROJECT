<template>
  <v-card>
    <v-layout>
      <v-main class="bg-grey-lighten-2">
        <NavbarDashboard/>
        <div class="animate__animated animate__bounceInDown">
          <AdminListCard ></AdminListCard>
        </div>
        <ContainLeftDashboard />
      </v-main>
    </v-layout>
  </v-card>
</template>
<script setup>
import ContainLeftDashboard from '../../views/dashboard/ContainLeftDashboard.vue'
import NavbarDashboard from "../partials/nav/NavbarDashboard.vue";
import AdminListCard from "./adminCards/AdminListCard.vue";
</script>
<style scoped>
.border {
  border: 1px solid black;
}
</style>
  