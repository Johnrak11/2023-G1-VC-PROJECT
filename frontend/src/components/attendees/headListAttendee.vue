<template>
  <v-card class="d-flex bg-red" style="height: 10vh;">
    <v-card-title class="d-flex">
      <h4 class=" mr-5 mt-3">Attendees </h4>
      <v-spacer></v-spacer>
    </v-card-title>
    <div class="btn w-75 mb-5">
      <v-btn prepend-icon="mdi-microsoft-excel" color="white" class="mt-3" variant="outlined" @click="exportToExcel">
        Export
      </v-btn>
    </div>
  </v-card>
</template>
<script setup>
import { defineProps } from 'vue';
const props = defineProps({
  exportToExcel: {
    type: Function,
    required: true,
  },
});
function exportToExcel() {
  props.exportToExcel();
}
</script>

<style scoped>
.v-card-title {
  width: 85%;
}
</style>