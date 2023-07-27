<template>
  <div>
    <navigation-bar v-if="shouldShowNavBar"></navigation-bar>
    <router-view />
  </div>
</template>

<script setup>
import { userStore } from "./stores/user.js";
import { cookieStore } from "./stores/cookies.js";
import { onMounted, computed } from "vue";
import router from "@/routes/router.js";

const { getCookie } = cookieStore();
const user = userStore();
const userToken = getCookie("token");
import { addressStore } from "@/stores/address.js";
const { getUserCurrentLatLng } = addressStore();
user.token = userToken;
if (userToken) {
  user.getUserInfor();
  getUserCurrentLatLng();
}

const shouldShowNavBar = computed(() => {
  const currentPath = router.currentRoute.value.path;
  return (!currentPath.startsWith("/dashboard") &&
    !currentPath.startsWith("/login") &&
    !currentPath.startsWith("/register") &&
    !currentPath.startsWith("/tickets/scan/") &&
    !currentPath.startsWith("/managerments") &&
    !currentPath.startsWith("/404")

  );
});

onMounted(() => {
  const currentPageRoute = router.currentRoute.value;
  console.log("router", currentPageRoute);
});
</script>

<style>
html {
  scroll-behavior: smooth;
}

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
