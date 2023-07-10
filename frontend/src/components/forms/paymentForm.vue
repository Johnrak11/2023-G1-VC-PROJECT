<template>
  <v-form @submit.prevent="submitForm" ref="form" class="w-50 bg-red">
    <div class="form-head w-100 text-center">
        <h1>Payment</h1>
        <hr>
    </div>
    <div class="form-body">
        <v-text-field class="w-90 ml-5" v-model="name" :rules="nameRules" type="firstName" label="FirstName"
            placeholder="firstName"></v-text-field>
    </div>
  </v-form>
</template>

<script setup>
import { ref } from "vue";

const name = ref("");
const nameRules = ref([(v) => !!v || "Name is required"]);
</script>

<style>

</style>