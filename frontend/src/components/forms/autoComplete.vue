<template>
    <v-card class="mx-auto" max-width="450" title="Strengthen your passwords">

        <template v-slot:actions>
            <!-- <v-text-field label="Label" v-model="select" @input="searchAddress"></v-text-field>
            <v-btn height="50" width="2" :loading="loading" class="flex-grow-1" variant="tonal"
                @click="locaterButtonPressed()">
                Find your location
            </v-btn> -->
        </template>
        <v-autocomplete :items="items.map(item => item.display_name)" v-model="select" v-model:search="search"  @keydown="searchAddress" :loading="loading"
            class="mx-4" density="comfortable" hide-no-data hide-details label="What state are you from?"
            style="max-width: 300px;">
        </v-autocomplete>


    </v-card>
</template>



<script setup>
import { ref} from 'vue';
import axios from 'axios';

const loading = ref(false);

const items = ref([]);


const search = ref(null);
const select = ref(null);

// function locaterButtonPressed() {
//     if (navigator.geolocation) {
//         navigator.geolocation.getCurrentPosition(position => {
//             console.log(position.coords.latitude);
//             console.log(position.coords.longitude);
//             getAddress(position.coords.latitude, position.coords.longitude);
//         }, error => {
//             console.log(error.message);
//         });
//     } else {
//         console.log('Your browser does not support geolocation');
//     }
// }
// function getAddress(lat, lng) {
//     loading.value = true;
//     const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;
//     axios
//         .get(apiUrl)
//         .then(response => {
//             search.value = response.data.display_name;
//             loading.value = false;
//         })
//         .catch(error => console.log(error));
// }

async function searchAddress() {
    if (search.value.trim() === '') {
        items.value = [];
        return;
    }
    try {
        const viewbox_coordinates = '102.3486,10.4091,107.6274,14.6907';
        const apiUrl = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(search.value)}&bounded=1&viewbox=${viewbox_coordinates}`;
        const response = await axios.get(apiUrl);
        let listAddress = response.data
        items.value = listAddress
        console.log(items.value)
    } catch (error) {
        console.error('Error retrieving address suggestions:', error);
        items.value = [];
    }
}
</script>
