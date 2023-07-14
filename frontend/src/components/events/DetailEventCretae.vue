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
            <v-text-field v-model="eventCreate.eventName" :counter="10" :rules="eventNameRules" label="Name"
                style="width:100%;" variant="outlined"></v-text-field>
        </div>
        <div class="input-container">
            <h3>Choose a category for your event.*</h3>
            <v-label>Choosing relevant categories helps to improve the discoverability of your event.</v-label>
            <v-select v-model="eventCreate.eventCategories" :rules="categoriesRules" clearable label="Select"
                :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']" variant="outlined"
                style="width:100%;"></v-select>
        </div>
        <div class="input-container">
            <h3>When is your event?*</h3>
            <VueDatePicker class="custom-datepicke" v-model="minDate" :start-time="startTime" :max-date="maxDate"
                :min-date="minDate" ignore-time-validation placeholder="Select Date">
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

            <v-file-input v-model="eventCreate.eventCategories" :rules="imageRules" class="mt-15"
                accept="image/png, image/jpeg, image/bmp" placeholder="Pick an image" prepend-icon="mdi-camera"
                @change="selectImage" @click:clear="eventCreate.fireDeleteImage()" label="Image"></v-file-input>
        </div>
        <div class="input-container">
            <h3>Please describe your event.</h3>
            <v-label>Write a few words below to describe your event and provide any extra information such as schedules,
                <br>
                itinerary or any special instructions required to attend your event.</v-label>
            <v-textarea v-model="eventCreate.eventDescription" :rules="descriptionRules" variant="outlined" counter
                label="Description" maxlength="120" single-line style="width:100%;"></v-textarea>
        </div>
        <div class="input-container">
            <h3>Where is your event taking place? *</h3>
            <v-label>Add a venue to your event to tell your attendees where to join the event.</v-label>
            <v-text-field v-model="eventCreate.eventAddress" :counter="10" :rules="addressRules" label="Address"
                variant="outlined" style="width:100%;"></v-text-field>
            <v-text-field v-model="eventCreate.eventVenue" :counter="10" :rules="venueRules" label="Venue"
                variant="outlined" style="width:100%;"></v-text-field>
        </div>
        <v-btn type="submit">submit</v-btn>
    </form>
    <div v-if="isFormValid">Hello!</div>
    <v-dialog v-model="eventCreate.isLoadingDialog" :scrim="false" persistent width="auto">
        <v-card color="white">
            <v-card-text>
                Image uploading...
                <v-progress-linear indeterminate color="red" class="mb-0"></v-progress-linear>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>
<script setup>

import { eventCreateStores } from '@/stores/eventCreate.js'
const eventCreate = eventCreateStores()
import { ref, defineExpose } from 'vue'

const minDate = new Date()
minDate.setDate(minDate.getDate() + 6)
const maxDate = new Date()
maxDate.setMonth(maxDate.getMonth() + 1)

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

defineExpose({
    submitHandler
})

const eventNameRules = [
    v => !!v || 'Name is required',
];
const categoriesRules = [
    v => !!v || 'categories is required',
];
const imageRules = [
    v => !!v || 'Poster is required',
];
const descriptionRules = [
    v => !!v || 'description is required',
];
const addressRules = [
    v => !!v || 'Address is required',
];
const venueRules = [
    v => !!v || 'Venue is required',
];


async function submitHandler() {
    const isFormValid = validateForm();
    console.log(isFormValid)
    if (!isFormValid) {
        return;
    }
}

function validateForm() {
    let isValid = true;
    if (!eventCreate.eventName) {
        eventNameRules.value = [(v) => !!v || "Email is required"];
        isValid = false;
    }
    if (!eventCreate.eventCategories) {
        categoriesRules.value = [(v) => !!v || "Categories must be seleted"];
        isValid = false;
    }
    if (!eventCreate.eventDescription) {
        descriptionRules.value = [(v) => !!v || "Description is required"];
        isValid = false;
    }
    if (!eventCreate.eventAddress) {
        addressRules.value = [(v) => !!v || "Address is required"];
        isValid = false;
    }
    if (!eventCreate.eventVenue) {
        venueRules.value = [(v) => !!v || "Venue is required"];
        isValid = false;
    }
    return isValid;
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

/* .date-container {
    width: 100%;
    color: rgb(91, 91, 91);
    padding: 14px;
    border: 1px solid rgb(116, 116, 116);
    border-radius: 5px;
} */

.custom-datepicker .vdp-input {
    background-color: rgb(190, 104, 104);
    border: none;
}
</style>