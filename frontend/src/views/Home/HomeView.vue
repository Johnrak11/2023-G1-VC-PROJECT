<template>
  <banner-view></banner-view>
  <search-view></search-view>
  <category-view></category-view>
  <list-card class="mb-7">
    <div class="ml-16" data-aos="fade-right" data-aos-duration="3000">
      <h1>{{ t('upcomingEvents.main') }}</h1>
      <p>{{ t('upcomingEvents.subtext') }}</p>
    </div>
  </list-card>
  <div class="bnt-container d-flex justify-center mb-10">
    <router-link to="explore" style="width: 12%;">
      <v-btn color="red">Explore more</v-btn>
    </router-link>
  </div>
  <popular-event class="mb-7">
    <div class="ml-16 ">
      <h1>{{ t('upcomingEventsInArea.main') }}</h1>
      <p>{{ t('upcomingEventsInArea.subtext') }}</p>
    </div>
  </popular-event><br>
  <card-rate></card-rate>
  <footer-view></footer-view>
</template>
<script setup>
import { createVuetify } from 'vuetify'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'
import { useI18n } from 'vue-i18n';
const { t } = useI18n();

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

