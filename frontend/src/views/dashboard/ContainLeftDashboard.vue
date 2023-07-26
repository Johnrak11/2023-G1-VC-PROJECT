<template>
  <v-navigation-drawer
    v-model="drawer"
    :rail="rail"
    permanent
    @click="rail = false"
    :elevation="5"
  >
    <v-list-item
      prepend-avatar="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"
      title="Vanda SOPHAL"
      nav
    >
      <template v-slot:append>
        <v-btn
          variant="text"
          icon="mdi-chevron-left"
          @click.stop="rail = !rail"
        ></v-btn>
      </template>
    </v-list-item>
    <hr class="w-100" />
    <v-divider class="border"></v-divider>

    <v-list density="compact">
      <router-link to="/dashboard" class="nav">
        <v-list-item
          prepend-icon="mdi-home-city"
          title="Home"
          value="home"
        ></v-list-item>
      </router-link>
      <router-link to="/dashboard/event" class="nav">
        <v-list-item
          prepend-icon="mdi-calendar"
          title="Event"
          value="event"
        ></v-list-item>
      </router-link>
      <router-link to="/dashboard/preview" class="nav">
        <v-list-item
          prepend-icon="mdi-calendar"
          title="Preview"
          value="preview"
        ></v-list-item>
      </router-link>
      <v-list-item
        prepend-icon="mdi-help"
        title="Report"
        value="report"
      ></v-list-item>
      <v-list-item
        prepend-icon="mdi-account"
        title="My Account"
        value="account"
      ></v-list-item>
      <v-list-item
        prepend-icon="mdi-account-group-outline"
        title="Users"
        value="users"
      ></v-list-item>
      <v-list-item
        prepend-icon="mdi-information"
        title="About"
        value="about"
      ></v-list-item>
    </v-list>
  </v-navigation-drawer>
  <NavbarDashboard></NavbarDashboard>
  <router-view></router-view>
</template>
<script>
import NavbarDashboard from "../../components/partials/nav/NavbarDashboard.vue";
export default {
  data() {
    return {
      drawer: true,
      rail: true,
    };
  },
  components: {
    NavbarDashboard,
  },
};
</script>
<style scoped>
.nav {
  text-decoration: none;
  color: black;
}
</style>
