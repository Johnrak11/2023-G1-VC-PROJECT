<template>
  <v-card>
    <v-layout>
      <v-main class="bg-grey-lighten-2">
        <ListCard>
            <div class="w-50 d-flex justify-md-end mt-3">
              <v-btn class="mr-5 rounded" style="width: 30%">All Events</v-btn>
              <v-btn class="mr-5 rounded" style="width: 30%">Online Events</v-btn>
              <v-btn class="rounded" style="width: 30%">Venue Events</v-btn>
            </div>
        </ListCard>
        <ContainLeftDashboard />
      </v-main>
    </v-layout>
  </v-card>
</template>
<script setup>
import ContainLeftDashboard from "./ContainLeftDashboard.vue";
import ListCard from "../../components/partials/dashboards/ListCardPreview.vue";
</script>
<style scoped>
.border {
  border: 1px solid black;
}
</style>
