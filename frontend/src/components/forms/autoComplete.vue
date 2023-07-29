<template>
  <div class="w-90 d-flex justify-center">
    <v-text-field density="compact" placeholder="Your address" variant="outlined" :rules="addressRule"
      v-model="address.address" class="w-90" append-inner-icon="mdi-map-marker"
      @click:append-inner="address.locaterButtonPressed()" :loading="address.loading"></v-text-field>
  </div>
</template>

<script setup>

import { addressStore } from '../../stores/address.js'

let address = addressStore()
const addressRule = [(v) => !!v || "Address is required"];


</script>
