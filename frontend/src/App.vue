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
    !currentPath.startsWith("/404")
  );
});

onMounted(() => {
  const currentPageRoute = router.currentRoute.value;
  console.log("router", currentPageRoute);
});
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Konkhmer+Sleokchher&family=Noto+Serif+Khmer:wght@400;600;800&display=swap');

html {
  scroll-behavior: smooth;
}

html::-webkit-scrollbar {
  display: none;
}

#app {
  font-family: 'Konkhmer Sleokchher', cursive;
  font-family: 'Noto Serif Khmer', serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  color: #2c3e50;
}
</style>
