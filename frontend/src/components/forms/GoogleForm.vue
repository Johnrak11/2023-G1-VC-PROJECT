<template>
    <GoogleLogin :callback="callback" class="custom-google-login-button" style="display: flex;margin: auto;" />
    <div class="loading_overly" v-if="isLoading">
        <Loading :active='isLoading' :is-full-page="true" :loader='bars' />
    </div>
</template>
  
<script setup>
import baseAPI from '@/stores/axiosHandle.js';
import { cookieStore } from '@/stores/cookies.js'
const { setCookie } = cookieStore()

import { userStore } from '../../stores/user.js'
import Loading from 'vue-loading-overlay';
import { decodeCredential } from "vue3-google-login";
import { ref } from "vue";

const user = userStore()
import { addressStore } from '../../stores/address.js';
import router from '@/routes/router.js';
let address = addressStore();
let isAddressReady = ref(false);
let isLoading = ref(false);



// ---- implement with backend-------


async function callback(response) {
    const currentRoute = router.currentRoute.value.path
    isLoading.value = true;
    if (currentRoute === '/login') {
        isAddressReady.value = true
        userProcess(response);

    } else {
        address.locaterButtonPressed();
        await getAddress();
        userProcess(response);
    }
}

async function getAddress() {
    await new Promise((resolve) => {
        const intervalId = setInterval(() => {
            if (address.address) {
                clearInterval(intervalId);
                isAddressReady.value = true;
                resolve();
            } else if (address.isDenied) {
                isLoading.value = false
            }
        }, 100);
    });
}

function userProcess(response) {
    let googleUser = decodeCredential(response.credential);
    if (isAddressReady.value) {
        googleAuth(googleUser);
    } else {
        setTimeout(() => {
            userProcess(response);
        }, 100);
    }
}

async function googleAuth(googleUser) {
    let newUser = {
        'firstname': googleUser.given_name,
        'lastname': googleUser.family_name,
        'email': googleUser.email,
        'profile_picture': googleUser.picture,
        'address': address.address,
        'google_id': googleUser.sub,
    };
    try {
        const response = await baseAPI.post('/auth/google', newUser);
        user.user = response.data.user
        user.token = response.data.token
        setCookie('token', user.token)
        isLoading.value = false;
        router.push('/')
        console.log(user.token)
        console.log(user.user)
    } catch (error) {
        console.error(error);
        isLoading.value = false;
    }
}

</script>

<style>
.loading_overly {
    position: absolute;
    z-index: 99;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgb(196, 194, 194);
    opacity: 0.6;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
  