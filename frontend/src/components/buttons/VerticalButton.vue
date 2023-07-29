<template>
  <v-menu>
    <template v-slot:activator="{ props }">
      <v-icon class="mt-2" v-bind="props">mdi-dots-vertical</v-icon>
    </template>
    <v-list>
      <v-list-item value="list">
        <v-list-item-title>Edit</v-list-item-title>
      </v-list-item>
      <v-list-item value="list" @click="deleteEventAlert(props.event.id)">
        <v-list-item-title>Delete</v-list-item-title>
      </v-list-item>
    </v-list>
  </v-menu>
</template>

<script setup>
import { defineProps } from "vue";
import { sweetAlert } from "@/stores/sweetAlert.js";
const { deleteEventAlert } = sweetAlert()
const props = defineProps({
  event: Object,
});

</script>

<style></style>