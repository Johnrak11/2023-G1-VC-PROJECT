<template>
  <v-card>
    <v-layout>
      <v-main class="bg-grey-lighten-2" >
        <ListCard/>
        <ContainLeftDashboard/>
      </v-main>
    </v-layout>
  </v-card>
</template>

<script setup>
import ContainLeftDashboard from "./ContainLeftDashboard.vue";
import ListCard from "../../components/partials/dashboards/ListCard.vue";
</script>
<style scoped>
.border {
  border: 1px solid black;
}

</style>
