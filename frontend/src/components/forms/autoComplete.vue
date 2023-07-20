<template>
  <div class="w-90 ml-5 d-flex justify-center">
    <v-text-field density="compact" placeholder="Your address" variant="outlined" :rules="addressRule"
      v-model="address.address" class="w-90"></v-text-field>
    <v-btn size="small" color="indigo" class="bg-red" icon="mdi-map-marker" :loading="address.loading"
      style="margin-right: 30px;" @click="address.locaterButtonPressed()"></v-btn>
  </div>
</template>

<script setup>

import { addressStore } from '../../stores/address.js'

let address = addressStore()
const addressRule = [(v) => !!v || "Address is required"];


</script>
