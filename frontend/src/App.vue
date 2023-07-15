<template>
  <router-view></router-view>
</template>

<script setup>
import { userStore } from "./stores/user.js";
import { cookieStore } from "./stores/cookies.js";

const { getCookie } = cookieStore()
const user = userStore();
const userToken = getCookie("token");
user.token = userToken
if (userToken) {
  user.getUserInfor();
}
</script>
<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
