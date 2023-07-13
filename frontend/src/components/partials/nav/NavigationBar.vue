<template>
  <v-layout
    class="nav-bar d-flex justify-space-between w-100 bg-color"
    :elevation="7"
  >
    <v-nav-bar-left class=" d-flex left">
      <v-img src="../../../assets/logo.png" alt=""   style="margin-left: -20%; height: 50px; object-fit: cover;"/>
    </v-nav-bar-left>
    <v-nav-bar-right class="d-flex right justify-space-between">
      <v-left-content class="ml-16">
        <ul class="d-flex justify-space-evenly mt-2">
          <router-link to="/" class="link">
            <li class="rounded">Home</li>
          </router-link>
          <router-link to="/"  class="link">
            <li class="rounded">Explore</li>
          </router-link>
          <router-link to="/"  class="link">
            <li class="rounded">MyTicket</li>
          </router-link>
          <router-link to="/dashboard"  class="link">
            <li class="rounded">Dashborad</li>
          </router-link>
        </ul>
      </v-left-content>
      <v-right-content class="d-flex profile">
        <select class="mr-5">
          <option value="">ED/KH</option>
          <option value="">English</option>
          <option value="">ខ្មែរ</option>
        </select>
        <v-menu v-model="state.menu" :close-on-content-click="false" location="end">
          <template v-slot:activator="{ props }">
            <v-badge content="2" color="error" class="mt-2 mr-5 notification" v-bind="props">
              <v-icon>mdi-bell-outline</v-icon>
            </v-badge>
          </template>
          <NotificationComponent/>
        </v-menu>


        <router-link v-if="!user.token" to="/login"
          ><v-btn color="blue" width="5">Login</v-btn></router-link
        >
        <v-menu v-else>
          <template v-slot:activator="{ props }">
            <v-avatar
              v-if="user.user.profile_picture"
              v-bind="props"
              value="Avatar"
            >
              <v-img alt="Avatar" :src="user.user.profile_picture"></v-img>
            </v-avatar>
            <v-avatar color="grey" v-else v-bind="props">
              <v-icon icon="mdi-account-circle"></v-icon>
            </v-avatar>
          </template>
          <v-list>
            <v-list-item
              v-for="(item, index) in items"
              :key="index"
              :value="index"
            >
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item>
            <v-list-item value="logout" @click="user.logout(httpRequest.api)">
              <v-list-item-title>Sing out</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-right-content>
    </v-nav-bar-right>
  </v-layout>
</template>

<script setup>
import NotificationComponent from '../../notification/NotificationComponent.vue'
import { ref } from "vue";
const items = ref([
  { title: "Profile", link: "/profile" },
  { title: "History", link: "/profile" },
  { title: "Ticket", link: "/profile" },
  { title: "Dashboard", link: "/dashboard" },
]);

import { userStore } from "../../../stores/user.js";
const user = userStore();
user.getTokenInCookie("token");
import { axiosStore } from "../../../stores/axiosHandle.js";
const httpRequest = axiosStore();

import { reactive } from 'vue'

const state = reactive({
  fav: true,
  menu: false,
  message: false,
  hints: true,
})
</script>
<style scoped>
.nav-bar {
  overflow: hidden;
  background: white;
  position: fixed;
  top: 0;
  width: 100%;
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

.bg-color {
  /* background-color: white; */
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
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

li {
  /* margin-left: 10%; */
  padding: 5px 20px 5px 20px;
}

.profile {
  margin-right: 10%;
}

li:hover {
  background-color: red;
  padding: 5px 20px 5px 20px;
  color: white;
  cursor: pointer;
}
.link{
  text-decoration: none;
  color: black;
}
.notification{
  cursor: pointer;
}
.notification:hover{
  color: red;
}
</style>
