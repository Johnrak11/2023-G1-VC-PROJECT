<template>
  <v-layout class="rounded rounded-md">
    <v-navigation-drawer>
      <v-list>
        <!-- <v-list-item title="Navigation drawer"></v-list-item> -->
        <NavbarDashboard />
      </v-list>
    </v-navigation-drawer>
    <v-app-bar title="Dashboard Management System"></v-app-bar>
    <v-main class="bg-grey-lighten-2 ml-10" style="min-height: 100vh">
      <ListCard />
    </v-main>
  </v-layout>
</template>
  <script setup>
import NavbarDashboard from "../../components/partials/nav/NavbarDashboard.vue";
import ListCard from "../../components/partials/dashboards/ListCard.vue";
</script>
  