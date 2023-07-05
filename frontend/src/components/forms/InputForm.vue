<template>
  <div class="registerForm mt-5 ml-5 bg-danger">
    <v-btn color="#3F51B5" class="p-5">
      <v-img :width="25" aspect-ratio="16/9" cover :src="imageGoogle"></v-img>
      Register with google</v-btn
    >
    <div class="line d-flex mt-5">
      <hr class="hr mt-3 ml-1" />
      Or
      <hr class="hr mt-3" />
    </div>
    <v-form>
      <v-card-text>
        <div class="d-flex mx-auto" width="200px">
          <v-text-field class="mr-16" type="FirstName" label="FirstName" placeholder="firstname"></v-text-field>
          <v-text-field class="mr-16" type="LastName" label="LastName" placeholder="lastname"></v-text-field>
        </div>
        <v-text-field type="email" label="Email" placeholder="email"></v-text-field>
        <v-text-field
          :type="state.passwordShow ? 'text' : 'password'"
          label="Password"
          placeholder="password"
          :append-icon="state.passwordShow ? 'mdi-eye' : 'mdi-eye-off'"
          @click:append="state.passwordShow = !state.passwordShow"
        >
        </v-text-field>
      </v-card-text>
      <v-btn color="pink" :style="{ width: '8%', 'margin-left': '22%' }"
        >Register</v-btn
      >
    </v-form>
  </div>
</template>

<script setup>
import google from "../../assets/google.png";
import { reactive } from "vue";
const imageGoogle = google;

const state = reactive({
  passwordShow: false,
});
</script>

<style>
.v-btn,
.v-text-field {
  width: 30%;
}
.blue-text {
  color: blue;
}
hr {
  width: 14%;
  border: 1px solid black;
}
</style>