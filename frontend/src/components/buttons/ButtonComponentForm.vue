<template>
  <v-card-action class="card d-flex justify-end">
    <v-btn type="submit" color="red" :loading="isLoading">
      <slot></slot>
    </v-btn>
  </v-card-action>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
  isLoading: {
    type: Boolean,
    required: true
  }
});

console.log(props.isLoading)
</script>

<style scoped>
.card {
  width: 95%;
}

.v-btn {
  width: 20%;
}
</style>
