<template>
  <v-card class="bg-grey-lighten-2 card-event" style="height: 100vh; overflow-y: scroll;">
    <ul class="mt-16 ml-8">
      <li class="d-flex icon mt-2">
        <v-list-item prepend-icon="mdi-calendar" title="List all events already posted." value="event"></v-list-item>
      </li>
    </ul>
    <div class="mr-10 ml-8">
      <p v-if="eventPreviewStorage.eventPosteds">Number of events: {{ eventPreviewStorage.eventPosteds?.length }}</p>
      <!-- <div class="d-flex justify-md-end">
        <div class="w-50">
          <v-text-field variant="solo" label="Search templates" append-inner-icon="mdi-magnify" single-line hide-details
            class="w-50"></v-text-field>
        </div>
        <slot></slot>
      </div> -->
    </div>
    <v-table fixed-header height="80vh" style=" border-radius: 5px; width: 95%; overflow-y: hidden; margin-left: 2%;"
      class="list-user">
      <thead class="users">
        <tr>
          <th class="text-left bg-red" style="width: 10%;">
            Image
          </th>
          <th class="text-left bg-red" style="width: 15%;">
            Title
          </th>
          <th class="text-left bg-red" style="width: 20%;">
            Description
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
      <tbody v-if="eventPreviewStorage.eventPosteds != null ">
        <CardEventPreview v-for="eventPosted of eventPreviewStorage.eventPosteds" :key="eventPosted.id"
          :eventData="eventPosted" />
      </tbody>
    </v-table>
    <h2 v-if="eventPreviewStorage.eventPosteds == null " class="d-flex justify-center text-red" style="margin-top: -20%;">There are no events public yet</h2>
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