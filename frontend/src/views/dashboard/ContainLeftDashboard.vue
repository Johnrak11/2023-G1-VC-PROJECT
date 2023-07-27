<template>
  <v-navigation-drawer v-model="drawer" :rail="rail" permanent @click="rail = false" :elevation="5">
    <v-list-item :prepend-avatar="user.user?.profile_picture" :title="`${user.user?.firstname} ${user.user?.lastname}`"
      nav>
      <template v-slot:append>
        <v-btn variant="text" icon="mdi-chevron-left" @click.stop="rail = !rail"></v-btn>
      </template>
    </v-list-item>
    <hr class="w-100" />
    <v-divider class="border"></v-divider>

    <v-list density="compact">
      <router-link to="/dashboard" class="nav">
        <v-list-item prepend-icon="mdi-home-city" title="Home" value="home"></v-list-item>
      </router-link>
      <router-link to="/dashboard/event" class="nav">
        <v-list-item prepend-icon="mdi-calendar" title="Event" value="event"></v-list-item>
      </router-link>
      <router-link to="/dashboard/preview" class="nav">
        <v-list-item prepend-icon="mdi-calendar-plus" title="Preview" value="preview"></v-list-item>
      </router-link>
    </v-list>
  </v-navigation-drawer>
  <NavbarDashboard></NavbarDashboard>
  <router-view></router-view>
</template>


<script setup>
import { ref } from 'vue';
import NavbarDashboard from "../../components/partials/nav/NavbarDashboard.vue";
import { userStore } from '@/stores/user.js'
const user = userStore()
const drawer = ref(true);
const rail = ref(true);
</script>

<style scoped>
.nav {
  text-decoration: none;
  color: black;
}
</style>
