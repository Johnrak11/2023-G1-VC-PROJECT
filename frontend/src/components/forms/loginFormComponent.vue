<template>
    <div class="loginForm">
        <v-form @submit.prevent="submitHandler" ref="form" class="w-100 animate__animated" :class="invalideForm">
            <v-card-text>
                <v-text-field class="w-90 ml-5" v-model="email" :rules="emailRules" type="email" label="Email"
                    placeholder="email" @keydown="backEmailError = ''">
                </v-text-field>
                <small v-if="backEmailError" class="error-message">{{ backEmailError }}</small>
                <v-text-field @keydown="backPasswordError = ''" class="w-90 ml-5" v-model="password" :rules="passwordRules"
                    :type="passwordShow ? 'text' : 'password'" label="Password" placeholder="password"
                    :append-icon="passwordShow ? 'mdi-eye' : 'mdi-eye-off'" @click:append="passwordShow = !passwordShow">
                </v-text-field>
                <small v-if="backPasswordError" class="error-message">{{ backPasswordError }}</small>
                <span class="blue-text ml-5">Forget Password?</span>
            </v-card-text>
            <ButtonComponentForm :isLoading="isLoading">
                Login
            </ButtonComponentForm>
        </v-form>
    </div>
</template>
<script setup>
import router from '@/routes/router.js';
import { userStore } from '../../stores/user.js'
import ButtonComponentForm from "../buttons/ButtonComponentForm.vue";
import { ref } from 'vue'
import baseAPI from "@/stores/axiosHandle.js";
import { cookieStore } from '@/stores/cookies.js'
const { setCookie } = cookieStore()
const invalideForm = ref('')

const passwordShow = ref(false);
const password = ref('');
const passwordRules = [
    v => !!v || 'Password is required',
    v => (v && v.length >= 8) || 'Password must be at least 8 characters long',
    v => /[^a-zA-Z0-9]/.test(v) || 'Password must contain at least one special character'
];
const email = ref('');
const emailRules = [
    v => !!v || 'email is required',
    v => /.+@.+\..+/.test(v) || 'Email must be valid'
];
const isLoading = ref(false)

const user = userStore()
const backEmailError = ref('')
const backPasswordError = ref('')
async function submitHandler() {
    invalideForm.value = ''
    const isFormValid = validateForm();
    if (!isFormValid) {
        invalideForm.value = 'animate__shakeX'
        return;
    }
    isLoading.value = true
    await baseAPI
        .post('/auth/login', {
            email: email.value,
            password: password.value,
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
        backEmailError.value = message.email
    }
    if (message.password) {
        backPasswordError.value = message.password
    }
    invalideForm.value = 'animate__shakeX'
}

function validateForm() {
    let isValid = true;
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

<style scroped>
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