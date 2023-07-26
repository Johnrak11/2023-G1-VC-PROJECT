<template>
  <banner-view></banner-view>
  <search-view></search-view>
  <category-view></category-view>
  <popular-event>
    <div class="ml-16">
      <h1>Upcoming Events In Area</h1>
      <p>You can chooses to display feature</p>
    </div>
  </popular-event><br>
  <list-card class="mb-7">
    <div class="ml-16" data-aos="fade-right" data-aos-duration="3000">
      <h1>Upcoming Events</h1>
      <p>You can chooses to display feature</p>
    </div>
<<<<<<< HEAD
  </list-card><br>
  <popular-event>
    <div class="ml-16">
      <h1>Upcoming Events In Area</h1>
      <p>You can chooses to display feature</p>
    </div>
  </popular-event>
=======
  </list-card>
  <div class="bnt-container d-flex justify-center mb-10">
    <router-link to="explore" style="width: 12%;">
      <v-btn color="red">Explore more</v-btn>
    </router-link>
  </div>
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
  <card-rate></card-rate>
  <footer-view></footer-view>
</template>
<script setup>
import { createVuetify } from 'vuetify'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'


createVuetify({
  icons: {
    defaultSet: "fa",
    aliases,
    sets: {
      fa,
      mdi,
    },
  },
});
</script>
<style scoped>
body {
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
</style>

