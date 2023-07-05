<template>
  <!-- prompt auto-login -->
  <div>
    <p v-if="state.isloading === false">loading......</p>
    <GoogleLogin :callback="callback" />
    <button @click="logout">logout</button>
    <router-view></router-view>
  </div>
</template>


<script setup>
import { decodeCredential } from "vue3-google-login";
// import { googleLogout } from "vue3-google-login";
import { reactive } from "vue";
import axios from "axios";

const HTTP_REQUEST = "http://localhost:8000/api/auth/google";

const state = reactive({
  isloading: true,
});

async function googleAuth(user) {
  try {
    const response = await axios.post(HTTP_REQUEST, user);
    console.log(response.data);
    state.isloading = true;
  } catch (error) {
    console.error(error);
  }
}

function callback(response) {
  // console.log(response)
  state.isloading = false;
  let user = decodeCredential(response.credential);
  console.log(user);
  googleAuth(user);
}
function logout() {
  state.isloading = true;
}
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
</style>

