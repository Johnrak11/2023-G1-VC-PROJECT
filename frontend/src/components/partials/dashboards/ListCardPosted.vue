<template>
  <v-card class="bg-grey-lighten-2 card-event" style="height: 100vh; overflow-y: scroll;">
    <ul class="mt-16 ml-8">
      <li class="d-flex icon mt-2">
        <v-list-item prepend-icon="mdi-calendar" title="Event" value="event"></v-list-item>
      </li>
    </ul>
    <v-card class="bg-white pa-5 mr-10 rounded ml-8" :elevation="5">
      <h3 v-if="eventPreviewStorage.eventPosteds">Event({{ eventPreviewStorage.eventPosteds?.length }})</h3>
      <h3 v-else> There are no Event public yet</h3>
      <div class="d-flex justify-md-end">
        <div class="w-50">
          <v-text-field variant="solo" label="Search templates" append-inner-icon="mdi-magnify" single-line hide-details
            class="w-50"></v-text-field>
        </div>
        <slot></slot>
      </div>
    </v-card>
    <v-table fixed-header height="82vh" style=" border-radius: 5px; width: 95%; overflow-y: hidden; margin-left: 2%;"
      class="list-user">
      <thead class="users">
        <tr>
          <th class="text-left bg-red" style="width: 10%;">
            Image
          </th>
          <th class="text-left bg-red" style="width: 25%;">
            Title
          </th>
          <th class="text-left bg-red" style="width: 15%;">
            Date
          </th>
          <th class="text-left bg-red" style="width: 10%;">
            Time
          </th>
          <th class="text-left bg-red" style="width: 25%;">
            Location
          </th>
          <th class="text-left bg-red" style="width: 30%;">
            Venue
          </th>
          <th class="text-left bg-red" style="width: 10%;">
            actions
          </th>
        </tr>
      </thead>
      <tbody>
        <CardEventPreview v-for="eventPosted of eventPreviewStorage.eventPosteds" :key="eventPosted.id"
          :eventData="eventPosted" />
      </tbody>
    </v-table>
  </v-card>
</template>
<script setup>

import CardEventPreview from "./CardEventPreview.vue";
import { eventPreviewStores } from "@/stores/eventPreview.js";
import { onMounted } from "vue";
const eventPreviewStorage = eventPreviewStores()

onMounted(() => {
  eventPreviewStorage.getOrganizerEvent(1)
})
</script>
<style scoped>
button {
  border: 1px solid red;
  padding: 0px 15px 0px 15px;
  cursor: pointer;
}

button:hover {
  background-color: red;
  color: white;
}

.card-event::-webkit-scrollbar {
  display: none;
}
</style>