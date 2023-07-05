<template>
  <navigation-bar></navigation-bar>
  <search-view></search-view>
  <category-view></category-view>
  <list-card></list-card>
  <popular-event></popular-event>
  <card-rate></card-rate>
  <footer-view></footer-view>
</template>
<script>
import { createVuetify } from 'vuetify'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'

export default createVuetify({
  icons: {
    defaultSet: 'fa',
    aliases,
    sets: {
      fa,
      mdi,
    },
  },
})
</script>
