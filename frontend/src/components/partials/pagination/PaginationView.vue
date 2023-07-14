<template>
  <div class="text-center pa-16 d-flex justify-center">
    <v-pagination v-model="pageStore.pagination.currentPage" :length="pageStore.pagination.lastPage" class="w-50"
      prev-icon="mdi-menu-left" next-icon="mdi-menu-right" @click="pageStore.getPaginationData()"></v-pagination>
  </div>
  <p>{{ page }}</p>
</template>

<script setup>
import { ref } from 'vue'
import { eventStores } from "@/stores/eventsStore";
const pageStore = eventStores()
const page = ref(1)
</script>

<style></style>