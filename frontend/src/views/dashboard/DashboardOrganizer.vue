<template>
  <v-card>
    <v-layout>
      <v-main class="bg-grey-lighten-2">
        <CardDashboard />
        <ContainLeftDashboard />
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
import ContainLeftDashboard from "./ContainLeftDashboard.vue";
import CardDashboard from "../../components/partials/dashboards/CardDashboard.vue";
</script>
<style scoped>
.border {
  border: 1px solid black;
}

</style>
