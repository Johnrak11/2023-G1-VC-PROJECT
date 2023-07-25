<template>
    <v-card class="d-flex">
        <v-card-title class="d-flex">
            <h3 class="mt-3 mr-5">Attendees </h3>
            <v-spacer></v-spacer>
        </v-card-title>
        <div class="btn w-75 mb-5">
            <v-btn class="bg-blue mt-5" @click="exportToExcel">
                <v-icon class="mr-3">mdi-microsoft-excel</v-icon>
                Export</v-btn>
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
.v-card-title{
    width: 85%;
}
</style>