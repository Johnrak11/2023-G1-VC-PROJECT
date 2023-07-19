<template>
  <v-card>
    <v-layout>
      <v-main class="bg-grey-lighten-2">
        <v-card
          class="bg-grey-lighten-2 card-event"
          style="height: 100vh; overflow-y: scroll"
        >
          <ul class="mt-16 ml-8">
            <li class="d-flex icon mt-2">
              <v-list-item
                prepend-icon="mdi-calendar"
                title="Event"
                value="event"
              ></v-list-item>
            </li>
          </ul>
          <v-card class="bg-white pa-5 mr-10 rounded ml-8" :elevation="5">
            <h3>Event(2)</h3>
            <div>
              <div class="w-50 d-flex">
                <v-text-field
                  variant="solo"
                  label="Search templates"
                  single-line
                  hide-details
                  class="w-50 mr-3"
                ></v-text-field>
                <v-text-field
                  variant="solo"
                  label="Search templates"
                  append-inner-icon="mdi-magnify"
                  single-line
                  hide-details
                  class="w-50"
                ></v-text-field>
              </div>
            </div>
          </v-card>
          <div class="ml-8 mb-5">
            <admin-card v-for="n in 2" :key="n" />
          </div>
        </v-card>
        <ContainLeftDashboard />
      </v-main>
    </v-layout>
  </v-card>
</template>
  <script setup>
import ContainLeftDashboard from "../dashboard/ContainLeftDashboard.vue";
import AdminCard from "./AdminCard.vue";
</script>
  <style scoped>
.border {
  border: 1px solid black;
}
</style>
  