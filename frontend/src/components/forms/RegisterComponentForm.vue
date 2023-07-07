<template>

  <div class="registerForm">
    <v-form @submit.prevent="submitForm" ref="form" class="w-100">
      <v-card-text>
        <div class="name">
          <v-text-field class="w-90 ml-5" v-model="firstname" :rules="firstNameRules" type="firstName" label="FirstName"
            placeholder="firstName"></v-text-field>
          <v-text-field class="w-90 ml-5" v-model="lastname" :rules="lastNameRules" type="lastName" label="Last Name"
            placeholder="lastName"></v-text-field>
        </div>
        <v-text-field class="w-90 ml-5" v-model="email" :rules="emailRules" type="email" label="Email"
          placeholder="email">
        </v-text-field>
        <v-text-field class="w-90 ml-5" v-model="password" :rules="passwordRules"
          :type="passwordShow ? 'text' : 'password'" label="Password" placeholder="password"
          :append-icon="passwordShow ? 'mdi-eye' : 'mdi-eye-off'" @click:append="passwordShow = !passwordShow">
        </v-text-field>
        <v-text-field class="w-90 ml-5" v-model="phone_number" type="phoneNumber" label="Phone Number"
          :rules="phoneNumberRule" placeholder="phoneNumber">
        </v-text-field>
        <autoCompleteAddress></autoCompleteAddress>
      </v-card-text>
    </v-form>
    <ButtonComponentForm @click="submitForm" />
  </div>
</template>

<script setup>

import autoCompleteAddress from './autoComplete.vue'
// ===AI references===
import ButtonComponentForm from "../../components/bottons/ButtonComponentForm.vue";
// ===AI references===
import axios from "axios";
import { ref } from "vue";
const passwordShow = ref(false);
const password = ref("");
const passwordRules = [
  (v) => !!v || "Password is required",
  (v) => (v && v.length >= 8) || "Password must be at least 8 characters long",
  (v) =>
    /[^a-zA-Z0-9]/.test(v) ||
    "Password must contain at least one special character",
];
const email = ref("");
const emailRules = [
  (v) => !!v || "email is required",
  (v) => /.+@.+\..+/.test(v) || "Email must be valid",
];
const firstname = ref("");
let firstNameRules = [(v) => !!v || "First Name is required"];
const lastname = ref("");
const lastNameRules = [(v) => !!v || "Last Name is required"];
const phone_number = ref("");
const phoneNumberRule = [(v) => !!v || "Phone number is required"];
// validate form register with backend
const HTTP_REQUEST = "http://localhost:8000/api/registers";
async function submitForm() {
  if (firstname.value === "" ) {
    firstNameRules.values = "First Name is required"

  } 
  else if (lastname.value === "" ) {
    firstNameRules.values = "Last Name is required"

  } 
  else if (phone_number.value === "" ) {
    firstNameRules.values = "Phone number is required"

  } 
  else if (email.value === "" ) {
    firstNameRules.values = "Email is required"

  } 
  else if (password.value === "" ) {
    firstNameRules.values = "Password is required"

  } 
  else {
    await axios
      .post(HTTP_REQUEST, {
        firstname: firstname.value,
        lastname: lastname.value,
        email: email.value,
        password: password.value,
        phone_number: phone_number.value,
      })
      .then((response) => {
        console.log(response);
        firstname.value = "";
        lastname.value = "";
        email.value = "";
        password.value = "";
        phone_number.value = "";
      })
      .catch((error) => console.log(error));
  }
}
</script>


<style scroped>
.name {
  display: flex;
  width: 95%;
}

.blue-text {
  color: blue;
}
</style>

