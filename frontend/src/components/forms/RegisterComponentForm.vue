<template>
  <div class="registerForm animate__animated mt-10" :class="invalideForm">
    <v-form @submit.prevent="submitForm" ref="form" class="w-100">
      <v-card-text>
        <div class="name">
          <!-- <v-text-field class="w-90 ml-5" v-model="firstname" :rules="firstNameRules" type="firstName" label="FirstName"
            placeholder="firstName"></v-text-field> -->
          <v-text-field density="compact" placeholder="First Name" variant="outlined" class="w-90 ml-5"
            v-model="firstname" :rules="firstNameRules" type="firstName" label="FirstName"></v-text-field>
          <!-- <v-text-field class="w-90 ml-5" v-model="lastname" :rules="lastNameRules" type="lastName" label="Last Name"
            placeholder="lastName"></v-text-field> -->
          <v-text-field density="compact" placeholder="Last Name" variant="outlined" class="w-90 ml-5" v-model="lastname"
            :rules="lastNameRules" type="lastName" label="Last Name"></v-text-field>
        </div>
        <!-- <v-text-field class="w-90 ml-5" v-model="email" :rules="emailRules" type="email" label="Email" placeholder="email"
          @keydown="backEmailError = ''"></v-text-field> -->
        <v-text-field density="compact" variant="outlined" class="w-90 ml-5" v-model="email" :rules="emailRules"
          type="email" label="Email" placeholder="email" @keydown="backEmailError = ''"></v-text-field>
        <small v-if="backEmailError" class="error-message">{{ backEmailError }}</small>
        <!-- <v-text-field class="w-90 ml-5" v-model="password" :rules="passwordRules"
          :type="passwordShow ? 'text' : 'password'" label="Password" placeholder="password"
          :append-icon="passwordShow ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="passwordShow = !passwordShow"></v-text-field> -->
        <v-text-field :append-inner-icon="visible ? 'mdi-eye-off' : 'mdi-eye'" :type="visible ? 'text' : 'password'"
          density="compact" placeholder="Enter your password" variant="outlined" @click:append-inner="visible = !visible"
          @keydown="backPasswordError = ''" class="w-90 ml-5" v-model="password" :rules="passwordRules"
          label="Password"></v-text-field>
        <!-- <v-text-field class="w-90 ml-5" v-model="phoneNumber" type="phoneNumber" label="Phone Number"
          :rules="phoneNumberRule" placeholder="phoneNumber"></v-text-field> -->
        <v-text-field density="compact" variant="outlined" class="w-90 ml-5" v-model="phoneNumber" type="phoneNumber"
          label="Phone Number" :rules="phoneNumberRule" placeholder="phoneNumber"></v-text-field>
        <autoCompleteAddress></autoCompleteAddress>
      </v-card-text>
      <ButtonComponentForm :isLoading="isLoading">
        Register
      </ButtonComponentForm>
    </v-form>
  </div>
</template>

<script setup>
import autoCompleteAddress from './autoComplete.vue'
import ButtonComponentForm from "../buttons/ButtonComponentForm.vue";
import baseAPI from '@/stores/axiosHandle.js';
import { addressStore } from '../../stores/address.js';
let address = addressStore();

import { cookieStore } from '@/stores/cookies.js'
const { setCookie } = cookieStore()

import { ref } from "vue";
import router from '@/routes/router.js';
import { userStore } from '../../stores/user.js'

const invalideForm = ref('')
const isLoading = ref(false)
const visible = ref(false);
const password = ref("");
const passwordRules = [
  (v) => !!v || "Password is required",
  (v) => (v && v.length >= 8) || "Password must be at least 8 characters long",
  (v) =>
    /[^a-zA-Z0-9]/.test(v) ||
    "Password must contain at least one special character",
];
const email = ref("");
const emailRules = ref([
  (v) => !!v || "Email is required",
  (v) => /.+@.+\..+/.test(v) || "Email must be valid",
]);

const firstname = ref("");
const firstNameRules = ref([(v) => !!v || "First Name is required"]);

const lastname = ref("");
const lastNameRules = ref([(v) => !!v || "Last Name is required"]);

const phoneNumber = ref("");
const phoneNumberRule = [
  (v) => !!v || "Phone number is required",
  (v) => /^\d{1,12}$/.test(v) || "Phone number must be less than 12 digits",
];
const backEmailError = ref('')
const user = userStore()

async function submitForm() {
  invalideForm.value = ''
  backEmailError.value = '';
  const isFormValid = validateForm();
  if (!isFormValid) {
    invalideForm.value = 'animate__shakeX'
    return;
  }
  isLoading.value = true
  await baseAPI
    .post('/auth/registers', {
      firstname: firstname.value,
      lastname: lastname.value,
      email: email.value,
      password: password.value,
      phone_number: phoneNumber.value,
      address: address.address
    })
    .then((response) => {
      let handleResponse = response.data;
      isLoading.value = false
      if (!handleResponse.success) {
        handleError(handleResponse.message);
      } else {
        user.user = response.data.user
        user.token = response.data.token
        setCookie('token', user.token)
        console.log(user.user)
        router.push('/')
      }
    })
    .catch((error) => console.log(error));
}

function handleError(message) {
  if (message.email) {
    backEmailError.value = message.email[0]
  }
  invalideForm.value = 'animate__shakeX'
}

function validateForm() {
  let isValid = true;
  if (!firstname.value) {
    firstNameRules.value = [(v) => !!v || "First Name is required"];
    isValid = false;
  }

  if (!lastname.value) {
    lastNameRules.value = [(v) => !!v || "Last Name is required"];
    isValid = false;
  }

  if (!phoneNumber.value) {
    phoneNumberRule.value = [(v) => !!v || "Phone number is required"];
    isValid = false;
  }

  if (!email.value) {
    emailRules.value = [(v) => !!v || "Email is required"];
    isValid = false;
  }

  if (!password.value) {
    passwordRules.value = [(v) => !!v || "Password is required"];
    isValid = false;
  }
  if (!validateEmail(email.value)) {
    isValid = false;
  }
  if (!validatePassword(password.value)) {
    isValid = false;
  }
  if (phoneNumber.value.length > 12) {
    isValid = false;
  }
  return isValid;
}

function validateEmail(email) {
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailRegex.test(email);
}

function validatePassword(password) {
  if (!(password && password.length >= 8)) {
    return false;
  }
  if (!/[^a-zA-Z0-9]/.test(password)) {
    return false
  }
  return true;
}

</script>


<style scoped>
.name {
  display: flex;
  width: 95%;
}

.blue-text {
  color: blue;
}

.error-message {
  position: absolute;
  color: red;
  font-size: 12px;
  margin-top: -20px;
  margin-left: 35px;
}
</style>
