<template>
    <form @submit.prevent="submitHandler" class="w-100 d-flex flex-column aling-center justify-center border rounded pa-10"
        elevation="24">
        <v-input prepend-icon="mdi-information">
            Details
        </v-input>
        <div class="input-container">
            <h3>Give your event a name.*</h3>
            <v-label>See how your name appears on the event page and a list of all places where your event name will be
                used.</v-label>
            <v-text-field v-model="eventName" :counter="10" :rules="eventNameRules" label="Event name" style="width:100%;"
                variant="outlined"></v-text-field>
        </div>
        <div class="input-container">
            <h3>Choose a category for your event.*</h3>
            <v-label>Choosing relevant categories helps to improve the discoverability of your event.</v-label>
            <select class="category-container" v-model="category" style="width:100%;">
                <option value="">Select category</option>
                <option v-for="category of categorySote.categories" :key="category.id" selected :value="category.id">
                    {{ category.name }}
                </option>
            </select>
        </div>
        <div class="input-container mt-5">
            <h3>When is your event?*</h3>
            <VueDatePicker class="custom-datepicke" v-model="minDate" :max-date="maxDate" :min-date="minDate"
                ignore-time-validation placeholder="Select Date">
            </VueDatePicker>
        </div>
        <div class="input-container mt-5">
            <h3>Add an image to your event banner.</h3>
            <v-label>Upload colorful and vibrant images as the banner for your event! See how beautiful images help your
                event details page</v-label>
            <div class="image-container">
                <div class="image-wrapper">
                    <img :src="eventCreate.imagePreview" :alt="image ? 'Selected Image' : 'Default Image'"
                        class="rounded" />
                </div>
            </div>

            <v-file-input v-model="image" :rules="imageRules" class="mt-15" accept="image/png, image/jpeg, image/bmp"
                placeholder="Pick an image" prepend-icon="mdi-camera" @change="selectImage"
                @click:clear="eventCreate.fireDeleteImage()" label="Image"></v-file-input>
        </div>
        <div class="input-container">
            <h3>Please describe your event.</h3>
            <v-label>Write a few words below to describe your event and provide any extra information such as schedules,
                <br>
                itinerary or any special instructions required to attend your event.</v-label>
            <v-textarea v-model="description" :rules="descriptionRules" variant="outlined" counter label="Description"
                maxlength="120" single-line style="width:100%;"></v-textarea>
        </div>
        <div class="input-container">
            <h3>Where is your event taking place? *</h3>
            <v-label>Add a venue to your event to tell your attendees where to join the event.</v-label>
            <div class="d-flex mb-0">
                <v-text-field v-model="addressStorage.address" :counter="10" :rules="addressRules" label="Address"
                    variant="outlined" style="width:100%;"></v-text-field>
                <v-btn size="small" color="red mt-2 ml-5" class="bg-red" icon="mdi-map-marker"
                    :loading="addressStorage.loading" @click="addressStorage.locaterButtonPressed()"></v-btn>
            </div>
            <v-btn v-if="addressStorage.latitude" variant="outlined" :loading="false" prepend-icon="mdi-map"
                @click="isOpenMap = !isOpenMap" class="w-100 mb-5" style="margin-top: -5px;">
                Select map</v-btn>
            <v-text-field v-model="venue" :counter="10" :rules="venueRules" label="Venue" variant="outlined"
                style="width:100%;"></v-text-field>
        </div>
    </form>
    <v-dialog v-model="eventCreate.isLoadingDialog" :scrim="false" persistent width="auto">
        <v-card color="white">
            <v-card-text>
                Image uploading...
                <v-progress-linear indeterminate color="red" class="mb-0"></v-progress-linear>
            </v-card-text>
        </v-card>
    </v-dialog>
    <!-- ---- map -->
    <v-dialog v-model="isOpenMap" width="auto">
        <div class="rounded map-container">
            <OpenStreetMap></OpenStreetMap>
            <div class="d-flex btn-map-submit">
                <v-btn variant="outlined" class=" bg-red" width="10%" :loading="addressStorage.loading"
                    @click="addressStorage.locaterButtonPressed()">
                    Refresh
                </v-btn>
                <v-btn :loading="addressStorage.loading" @click="seletedLocation" variant=" outlined" class="bg-red"
                    width="10%">
                    Select
                </v-btn>
            </div>
        </div>
    </v-dialog>
</template>
<script setup>
import { ref, defineExpose, onMounted } from 'vue'
import OpenStreetMap from '@/components/maps/SelectMap.vue'

import { addressStore } from '../../stores/address.js'
let addressStorage = addressStore()

import { eventCreateStores } from '@/stores/eventCreate.js'
import { categoryStore } from '@/stores/categoryStore.js'
const categorySote = categoryStore()
const eventCreate = eventCreateStores()

const minDate = ref(new Date())
minDate.value.setDate(minDate.value.getDate() + 6)
const maxDate = new Date()
maxDate.setMonth(maxDate.getMonth() + 1)
const isOpenMap = ref(false)
const image = ref("");
const selectImage = (event) => {
    const file = event.target.files[0];
    if (!file) return;
    const allowedTypes = ["image/jpeg", "image/png", "image/gif"];
    if (allowedTypes.includes(file.type)) {
        const readData = (file) =>
            new Promise((resolve) => {
                const reader = new FileReader();
                reader.onloadend = () => resolve(reader.result);
                reader.readAsDataURL(file);
            });
        const loadImagePreview = async () => {
            await readData(file);
        };

        loadImagePreview();
        eventCreate.fireUploadImage(file)
    } else {
        console.log('please select only image')
    }
};

const eventName = ref('')
const eventNameRules = [
    v => !!v || 'Event name is required',
];
const category = ref('')
const categoriesRules = [
    v => !!v || 'categories is required',
];
const imageRules = [
    v => !!v || 'Poster is required',
];
const description = ref('')
const descriptionRules = [
    v => !!v || 'description is required',
];
const addressRules = [
    v => !!v || 'Address is required',
];
const venue = ref('')
const venueRules = [
    v => !!v || 'Venue is required',
];


async function submitHandler() {
    const isFormValid = validateForm();
    console.log(isFormValid)
    if (!isFormValid) {
        return false;
    } else {
        eventCreate.eventName = eventName.value
        eventCreate.eventCategories = category.value
        eventCreate.eventDate = minDate.value
        eventCreate.eventDescription = description.value
        eventCreate.eventAddress = addressStorage.address
        eventCreate.eventLatitude = addressStorage.latitude
        eventCreate.eventLongitude = addressStorage.longitude
        eventCreate.eventVenue = venue.value
        return true;
    }
}

function validateForm() {
    let isValid = true;
    if (!eventName.value) {
        eventNameRules.value = [(v) => !!v || "Event name is required"];
        isValid = false;
    }
    if (!category.value) {
        imageRules.value = [(v) => !!v || "Categories must be seleted"];
        isValid = false;
    }
    if (!image.value) {
        categoriesRules.value = [v => !!v || 'Poster is required']
        isValid = false;
    }
    if (!description.value) {
        descriptionRules.value = [(v) => !!v || "Description is required"];
        isValid = false;
    }
    if (!addressStorage.address) {
        addressRules.value = [(v) => !!v || "Address is required"];
        isValid = false;
    }
    if (!venue.value) {
        venueRules.value = [(v) => !!v || "Venue is required"];
        isValid = false;
    }
    return isValid;
}
onMounted(() => {
    categorySote.getDataCategories()
});

defineExpose({
    submitHandler
});

function seletedLocation() {
    isOpenMap.value = false
    addressStorage.getAddress(addressStorage.latitude, addressStorage.longitude)
}
</script>

<style>
form {
    padding: 20px;
}

.input-container {
    display: flex;
    flex-direction: column;
    gap: 5px;

}

.image-container {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

.image-wrapper {
    width: 90%;
    height: 0;
    padding-bottom: 60%;
    position: relative;
}

.image-wrapper img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}

.category-container {
    width: 100%;
    color: rgb(91, 91, 91);
    padding: 14px;
    border: 1px solid rgb(116, 116, 116);
    border-radius: 5px;
}

.custom-datepicker .vdp-input {
    background-color: rgb(190, 104, 104);
    border: none;
}

.map-container {
    padding: 10px;
}

.btn-map-submit {
    margin-top: 2px;
    justify-content: space-between;
}
</style>