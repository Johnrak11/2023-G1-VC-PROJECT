<template>
  <div class="registerForm">
    <v-form @submit.prevent="submitHandler" ref="form" class="w-100">
      <v-card-text>
        <div class="name">
          <v-text-field
            class="w-90 ml-5"
            v-model="firstName"
            :rules="firstNameRules"
            type="firstName"
            label="FirstName"
            placeholder="firstName"
          ></v-text-field>
          <v-text-field
            class="w-90 ml-5"
            v-model="lastName"
            :rules="lastNameRules"
            type="lastName"
            label="Last Name"
            placeholder="lastName"
          ></v-text-field>
        </div>
        <v-text-field
          class="w-90 ml-5"
          v-model="email"
           :rules="emailRules" 
          type="email"
          label="Email"
          placeholder="email"
        >
        </v-text-field>
        <v-text-field
          class="w-90 ml-5"
          v-model="password"
          :rules="passwordRules" 
          :type="passwordShow ? 'text' : 'password'"
          label="Password"
          placeholder="password"
          :append-icon="passwordShow ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="passwordShow = !passwordShow"
        >
        </v-text-field>
        <v-text-field
          class="w-90 ml-5"
          v-model="phoneNumber"
          type="phoneNumber"
          label="Phone Number"
          placeholder="phoneNumber"
        >
        </v-text-field>
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
        v => !!v  ||'Password is required',
        v => (v && v.length >= 8)  ||'Password must be at least 8 characters long',
        v => /[^a-zA-Z0-9]/.test(v)  ||'Password must contain at least one special character'
    ];
    const email = ref('');
    const emailRules = [
        v => !!v  ||'email is required',
        v => /.+@.+\..+/.test(v) || 'Email must be valid'
    ];
    const firstName= ref('')
    const firstNameRules=[
       v => !!v  ||'First Name is required',
    ]
    const lastName= ref('')
    const lastNameRules=[
       v => !!v  ||'Last Name is required',
    ]
    // const formRef= ref(null)
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
.name{
  display: flex;
  width: 95%;
}
.blue-text {
  color: blue;
}
</style>