<template>
  <v-card class="bg-grey-lighten-2">
    <ul class="mt-16 ml-8">
      <li class="d-flex icon mt-2">
        <img
          src="https://o.remove.bg/downloads/ffd91972-7e30-427b-9230-7ad638c9dbc9/calendar-date-date-notes-business-office-event-icon-template-black-color-editable-calendar-date-symbol-flat-illustration-for-graphic-and-web-design-free-vector-removebg-preview.png"
          alt=""
          width="50"
        />
        <h3 class="ml-3 mt-1">Events</h3>
      </li>
    </ul>
    <v-card class="bg-white pa-5 mr-10 rounded ml-8" :elevation="5">
      <h3>Event(2)</h3>
      <br />
      <div class="d-flex justify-md-end">
        <div class="w-50">
          <v-text-field
            variant="solo"
            label="Search templates"
            append-inner-icon="mdi-magnify"
            single-line
            hide-details
            class="w-50"
          ></v-text-field>
        </div>
        <div class="w-50 d-flex justify-md-end mt-3">
          <v-btn class="mr-5 rounded" style="width: 30%">All Events</v-btn>
          <v-btn class="mr-5 rounded" style="width: 30%">Online Events</v-btn>
          <v-btn class="rounded" style="width: 30%">Venue Events</v-btn>
        </div>
      </div>
    </v-card>
    <div class="ml-8 mb-5">
      <CardEvent v-for="n in 3" :key="n" />
    </div>
  </v-card>
</template>
<script setup>
import CardEvent from "./CardEvent.vue";
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
</style>