<template>
    <div class="w-90 ml-5 d-flex justify-center">
        <!-- <v-text-field label="Address" :rules="addressRule" v-model="address.address" class="w-90"></v-text-field> -->
        <v-text-field
        density="compact"
        placeholder="Your address"
        variant="outlined"
        :rules="addressRule" v-model="address.address" class="w-90"
      ></v-text-field>
        <v-btn size="small" color="indigo" class="bg-red" icon="mdi-map-marker" :loading="address.loading"
            style="margin-right: 30px;" @click="address.locaterButtonPressed()"></v-btn>
    </div>
</template>

<script setup>

import { addressStore } from '../../stores/address.js'

let address = addressStore()
const addressRule = [(v) => !!v || "Address is required"];
// async function searchAddress() {
//     console.log(search.value)
//     if (search.value.trim() === '') {
//         items.value = [];
//         return;
//     }
//     try {
//         const viewbox_coordinates = '102.3486,10.4091,107.6274,14.6907';
//         const apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(search.value)}&bounded=1&viewbox=${viewbox_coordinates}`;
//         const response = await axios.get(apiUrl);
//         let listAddress = response.data
//         items.value = listAddress
//         console.log(listAddress)
//     } catch (error) {
//         console.error('Error retrieving address suggestions:', error);
//         items.value = [];
//     }
// }

</script>
