<template>
  <v-layout class="nav-bar d-flex justify-space-between w-100 bg-color" :elevation="7">
    <v-nav-bar-left class="ml-12 d-flex left">
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
      <v-app-bar-title class="mt-3">LOCAL EVENT</v-app-bar-title>
    </v-nav-bar-left>
    <v-nav-bar-right class="d-flex right justify-space-between">
      <v-left-content class="ml-16">
        <ul class="d-flex justify-space-evenly mt-2">
          <router-link to="/">
            <li class="rounded">Home</li>
          </router-link>
          <router-link to="/">
            <li class="rounded">Explor</li>
          </router-link>
          <router-link to="/">
            <li class="rounded">MyTicket</li>
          </router-link>
        </ul>
      </v-left-content>
      <v-right-content class="d-flex profile">
        <!-- <button class="mr-6" :elevation="7" color="primary">ED</button> -->
        <select class="mr-5">
          <option value="">ED/KH</option>
          <option value="">English</option>
          <option value="">ខ្មែរ</option>
        </select>
        <v-badge content="2" color="error" class="mt-2 mr-5">
          <v-icon>mdi-bell-outline</v-icon>
        </v-badge>

        <router-link v-if="!token" to="/login"><v-btn color="blue" width="5">Login</v-btn></router-link>
        <v-menu v-else>
          <template v-slot:activator="{ props }">
            <v-btn icon="$vuetify" v-bind="props"></v-btn>
          </template>
          <v-list>
            <v-list-item v-for="(item, index) in items" :key="index" :value="index">
              <v-list-item-title>{{ item.title }}</v-list-item-title>
            </v-list-item>
            <v-list-item value="logout">
              <v-list-item-title>Sing out</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-right-content>
    </v-nav-bar-right>
  </v-layout>
</template>

<script setup>
import { ref } from "vue";
const items = ref([
  { title: "Profile", link: '/profile' },
  { title: "History", link: '/profile' },
  { title: "Ticket", link: '/profile' },
  { title: "Dashboard", link: '/dashboard' },
]);
import { userStore } from '../../../stores/user.js'
const user = userStore()
const token = user.getCookie('token')

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

.right {
  flex: 1;
}

li {
  margin-left: 30%;
  padding: 5px 10px 5px 10px;
}

.profile {
  margin-right: 10%;
}

li:hover {
  background-color: red;
  padding: 5px 10px 5px 10px;
  color: white;
  cursor: pointer;
}
</style>
