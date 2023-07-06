<template>
  <ul>
    <li class="d-flex icon mt-2">
      <img
        src="https://o.remove.bg/downloads/d483965a-bf2b-4fb3-927f-8dac03a2b990/calendar-date-date-notes-business-office-event-icon-template-black-color-editable-calendar-date-symbol-flat-illustration-for-graphic-and-web-design-free-vector-removebg-preview.png"
        alt=""
        width="50"
      />
      <h1 class="ml-3 mt-1">Events</h1>
    </li>
  </ul>
  <div class="bg-white pa-5 mr-10">
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
        <v-btn class="mr-5 rounded" style="width: 30%;">All Events</v-btn>
        <v-btn class="mr-5 rounded" style="width: 30%;">Online Events</v-btn>
        <v-btn class="rounded" style="width: 30%;">Venue Events</v-btn>
      </div>
    </div>
</div>
<div>
  <CardEvent v-for="n in 2" :key="n"/>
</div>
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