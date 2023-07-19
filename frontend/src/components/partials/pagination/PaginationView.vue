<template>
  <div class="text-center pa-16 d-flex justify-center">
    <v-pagination v-model="pageStore.pagination.currentPage" :length="pageStore.pagination.lastPage" class="w-50"
      prev-icon="mdi-menu-left" next-icon="mdi-menu-right"
      @click="pageStore.getPaginationData(pageStore.pagination.links[pageStore.pagination.currentPage].label)"></v-pagination>
  </div>
</template>

<script setup>
import { eventStores } from "@/stores/eventsStore";
const pageStore = eventStores()
</script>

<style></style>