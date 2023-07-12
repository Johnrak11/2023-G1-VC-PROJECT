<template>
    <form @submit.prevent="submit" class="w-100 d-flex flex-column aling-center justify-center border rounded pa-10"
        elevation="24">
        <v-input prepend-icon="mdi-information">
            Details
        </v-input>
        <div class="input-container">
            <h3>Give your event a name.*</h3>
            <v-label>See how your name appears on the event page and a list of all places where your event name will be
                used.</v-label>
            <v-text-field v-model="name.value.value" :counter="10" :error-messages="name.errorMessage.value" label="Name"
                style="width:100%;" variant="outlined"></v-text-field>
            <v-divider></v-divider>
        </div>
        <div class="input-container">
            <h3>Choose a category for your event.*</h3>
            <v-label>Choosing relevant categories helps to improve the discoverability of your event.</v-label>
            <v-select clearable label="Select" :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                variant="outlined" style="width:100%;"></v-select>
            <v-divider></v-divider>
        </div>
        <div class="input-container">
            <h3>When is your event?*</h3>
            <v-label>Tell your attendees when your event starts so they can get ready to attend.</v-label>
            <Datepicker v-model="picked" class="date-container"></Datepicker>
        </div>
        <div class="input-container mt-5">
            <h3>Add an image to your event banner.</h3>
            <v-label>Upload colorful and vibrant images as the banner for your event! See how beautiful images help your
                event details page</v-label>

            <div class="image-container">
                <div class="image-wrapper">
                    <img :src="imagePreview" :alt="image ? 'Selected Image' : 'Default Image'" class="rounded" />
                </div>
            </div>

            <v-file-input class="mt-15" v-model="image" accept="image/png, image/jpeg, image/bmp"
                placeholder="Pick an image" prepend-icon="mdi-camera" @change="selectImage"
                @click:clear="clearImagePreview()" label="Image"></v-file-input>
        </div>
        <div class="input-container">
            <h3>Please describe your event.</h3>
            <v-label>Write a few words below to describe your event and provide any extra information such as schedules,
                <br>
                itinerary or any special instructions required to attend your event.</v-label>
            <v-textarea v-model="title" variant="outlined" counter label="Description" maxlength="120" single-line
                style="width:100%;"></v-textarea>
            <v-divider></v-divider>
        </div>
        <div class="input-container">
            <h3>Where is your event taking place? *</h3>
            <v-label>Add a venue to your event to tell your attendees where to join the event.</v-label>
            <v-text-field v-model="name.value.value" :counter="10" :error-messages="name.errorMessage.value" label="Address"
                variant="outlined" style="width:100%;"></v-text-field>
            <v-text-field v-model="name.value.value" :counter="10" :error-messages="name.errorMessage.value" label="Venue"
                variant="outlined" style="width:100%;"></v-text-field>
            <v-divider></v-divider>
        </div>
    </form>
</template>
<script setup>

// ------- datepicker and csss-----
import Datepicker from 'vue3-datepicker'
import { ref } from 'vue'

import { useField, useForm } from 'vee-validate'

const image = ref("");
const imagePreview = ref("https://fastly.picsum.photos/id/11/500/300.jpg?hmac=X_37MM-ameg7HWL6TKJT2h_5_rGle7IGN_CUdEDxsAQ");
const picked = ref(new Date())


const selectImage = (event) => {
    const file = event.target.files[0];
    if (!file) return;
    const readData = (file) =>
        new Promise((resolve) => {
            const reader = new FileReader();
            reader.onloadend = () => resolve(reader.result);
            reader.readAsDataURL(file);
        });

    const loadImagePreview = async () => {
        const data = await readData(file);
        imagePreview.value = data;
    };

    loadImagePreview();
};

const clearImagePreview = () => {
    imagePreview.value = "";
};


const { handleSubmit } = useForm({
    validationSchema: {
        name(value) {
            if (value?.length >= 2) return true

            return 'Name needs to be at least 2 characters.'
        },
        phone(value) {
            if (value?.length > 9 && /[0-9-]+/.test(value)) return true

            return 'Phone number needs to be at least 9 digits.'
        },
        email(value) {
            if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true

            return 'Must be a valid e-mail.'
        },
        select(value) {
            if (value) return true

            return 'Select an item.'
        },
        checkbox(value) {
            if (value === '1') return true

            return 'Must be checked.'
        },
    },
})
const name = useField('name')
// const address = useField('address')
// const venue = useField('venue')
// const description = useField('description')


const submit = handleSubmit(values => {
    alert(JSON.stringify(values, null, 2))
})
</script>

<style>
form {
    padding: 20px;
}

.input-container {
    /* background-color : rgb(207, 207, 207); */
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

.date-container{
    width: 100%;
    color: rgb(91, 91, 91);
    padding: 14px;
    border: 1px solid rgb(116, 116, 116);
    border-radius: 5px;
}
</style>