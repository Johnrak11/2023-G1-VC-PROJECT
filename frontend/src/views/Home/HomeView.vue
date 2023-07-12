<template>
  <navigation-bar></navigation-bar>
  <search-view>
    <div class="mt-16">
      <h1 class="text-center text-h2">Connection the world</h1>
      <p class="text-center">Easy to search, you just enter the keyword</p>
    </div>
  </search-view>
  <category-view></category-view>
  <list-card>
    <div class="ml-16">
      <h1>Upcoming Events</h1>
      <p>You can chooses to display feature</p>
    </div>
  </list-card><br>
  <popular-event>
    <div class="ml-16">
      <h1>Most Visited Place</h1>
      <p>You can chooses to display feature</p>
    </div>
  </popular-event>
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
  body{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
</style>

