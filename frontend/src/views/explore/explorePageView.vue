<template>
  <banner-view></banner-view>
  <search-view></search-view>
  <category-view></category-view>
  <list-card>
    <div class="ml-16">
      <h1>Upcoming Events</h1>
      <p>You can chooses to display feature</p>
    </div>
  </list-card><br>
  <pagination-view></pagination-view>
  <footer-view></footer-view>
</template>
<script>
import ListCard from '@/components/partials/cards/ListCard.vue'
import { createVuetify } from 'vuetify'
import { aliases, fa } from 'vuetify/iconsets/fa'
import { mdi } from 'vuetify/iconsets/mdi'

export default createVuetify({
  components: { ListCard },
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
