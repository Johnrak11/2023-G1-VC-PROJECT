<template>
  <router-view></router-view>
</template>

<script setup>

import { axiosStore } from "./stores/axiosHandle.js";
const httpRequest = axiosStore();
import { userStore } from "./stores/user.js";
const user = userStore();
user.httpRequest = httpRequest.api
const userToken = user.getTokenInCookie("token");
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
