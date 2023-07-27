<template>
  <v-layout :style="{ top: navbarTop }" class="nav-bar d-flex justify-space-between w-100 bg-color" :elevation="7">
    <v-nav-bar-left class="d-flex left">
      <v-img src="../../../assets/logo.png" alt="" style="margin-left: -20%; height: 50px; object-fit: cover" />
    </v-nav-bar-left>
    <v-nav-bar-right class="d-flex right justify-space-between" style="margin-right: 4%">
      <v-left-content class="ml-16">
        <ul class="d-flex justify-space-evenly mt-2">
          <router-link to="/" class="link">
            <v-btn id="li-nav" :class="{ active: isActive('/') }" class="rounded" variant="text">
              Home</v-btn>
          </router-link>
          <router-link to="/explore" class="link">
            <v-btn id="li-nav" :class="{ active: isActive('/explore') }" class="rounded" variant="text">Explore</v-btn>
          </router-link>
          <router-link to="/listMap" class="link">
            <v-btn id="li-nav" :class="{ active: isActive('/listMap') }" class="rounded" variant="text">Listing
              Map</v-btn>
          </router-link>
        </ul>
      </v-left-content>
      <v-right-content class="d-flex profile align-center">
        <select>
          <option value="">ED/KH</option>
          <option value="">English</option>
          <option value="">ខ្មែរ</option>
        </select>
        <v-menu v-model="state.menu" :close-on-content-click="false" location="end">
          <template v-slot:activator="{ props }">
            <v-badge content="0" color="error" class="mr-5 notification" v-bind="props">
              <v-icon>mdi-bell-outline</v-icon>
            </v-badge>
          </template>
          <NotificationComponent />
        </v-menu>
        <router-link v-if="!user.token" to="/login"><v-btn color="red" width="5">Login</v-btn></router-link>
        <v-menu v-else>
          <template v-slot:activator="{ props }">
            <v-avatar v-if="user.user.profile_picture" v-bind="props" value="Avatar">
              <v-img alt="Avatar" :src="user.user.profile_picture"></v-img>
            </v-avatar>
            <v-avatar color="grey" v-else v-bind="props">
              <v-icon icon="mdi-account-circle"></v-icon>
            </v-avatar>
          </template>
          <v-list>
            <v-list-item v-if="getSession('role')" value="ticket">
              <router-link to="/profile">
                <v-list-item-title>Profile</v-list-item-title>
              </router-link>
            </v-list-item>
            <v-list-item v-if="getSession('role')" value="ticket">
              <router-link to="/tickets">
                <v-list-item-title>Tickets</v-list-item-title>
              </router-link>
            </v-list-item>
            <v-list-item v-if="listRole.includes(getSession('role'))" value="dashboard">
              <router-link to="/dashboard">
                <v-list-item-title>Dashboard</v-list-item-title>
              </router-link>
            </v-list-item>
            <v-list-item v-if="getSession('role') === 'admin'" value="dashboard">
              <router-link to="management/event/delete">
                <v-list-item-title>Management</v-list-item-title>
              </router-link>
            </v-list-item>
            <v-list-item value="logout" @click="user.logout()">
              <v-list-item-title>logout</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-right-content>
    </v-nav-bar-right>
  </v-layout>
</template>

<script setup>
import router from "@/routes/router.js";
import NotificationComponent from "../../notification/NotificationComponent.vue";
import { ref } from "vue";
import { userStore } from "@/stores/user.js";
import { sessionStore } from "@/stores/session.js";
const { getSession } = sessionStore();
const user = userStore();
import { reactive } from "vue";

const state = reactive({
  fav: true,
  menu: false,
  message: false,
  hints: true,
});
const listRole = ref(["organizer", "admin"]);
const isActive = (route) => {
  return router.currentRoute.value.path === route;
};

// ---- navbar scroll----
const prevScrollpos = ref(window.pageYOffset);

window.addEventListener("scroll", () => {
  const currentScrollPos = window.pageYOffset;
  if (prevScrollpos.value > currentScrollPos) {
    navbarTop.value = "0";
  } else {
    navbarTop.value = "-80px";
  }
  prevScrollpos.value = currentScrollPos;
});

const navbarTop = ref("0");
</script>
<style scoped>
.nav-bar {
  overflow: hidden;
  background: white;
  position: fixed;
  top: 0;
  width: 100%;
  transition: top 0.3s;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

ul {
  list-style: none;
}

select {
  cursor: pointer;
  padding-left: 10px;
  padding-right: 10px;
}

.justify-space-between {
  display: flex;
  justify-content: space-between;
}

a {
  text-decoration: none;
  color: black;
}

.active {
  text-decoration: underline;
  text-decoration-color: red;
  text-decoration-thickness: 4px;
}

.bg-color {
  /* background-color: white; */
  padding: 10px;
}

.left {
  flex: 1;
}

.left v-img {
  width: 10%;
}

.right {
  flex: 1;
}

#li-nav {
  /* margin-left: 10%; */
  font-weight: bold;
  padding: 5px 20px 5px 20px;
}

.profile {
  justify-content: flex-end;
  /* margin-right: 10%; */
}

#li-nav:hover {
  background-color: red;
  padding: 5px 20px 5px 20px;
  color: white;
  cursor: pointer;
}

.link {
  text-decoration: none;
  color: black;
}

.notification {
  cursor: pointer;
}

.notification:hover {
  color: red;
}
</style>
