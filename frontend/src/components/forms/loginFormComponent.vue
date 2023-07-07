<template>
    <div class="loginForm">
        <v-form @submit.prevent="submitHandler" ref="form" class="w-100">
            <v-card-text>
                <v-text-field class="w-90 ml-5" v-model="email" :rules="emailRules" type="email" label="Email"
                    placeholder="email">
                </v-text-field>
                <v-text-field class="w-90 ml-5" v-model="password" :rules="passwordRules"
                    :type="passwordShow ? 'text' : 'password'" label="Password" placeholder="password"
                    :append-icon="passwordShow ? 'mdi-eye' : 'mdi-eye-off'" @click:append="passwordShow = !passwordShow">
                </v-text-field>
                <span class="blue-text ml-5">Forget Password?</span>
            </v-card-text>

        </v-form>
    </div>
</template>
<script setup>
// ===AI references===
import { ref } from 'vue'
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
function submitHandler() {
    if (passwordRules && emailRules) {
        console.log('Hello');
    }
    else {
        console.log('Hi')
    }
}

</script>

<style scroped>
.blue-text {
    color: blue;
}
</style>