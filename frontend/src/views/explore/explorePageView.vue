<template>
  <navigation-bar></navigation-bar>
  <search-view>
    <div class="mt-16">
      <h1 class="text-center text-h3">Dicover Events For All Things You Love</h1>
    </div>
  </search-view>
  <category-view></category-view>
  <list-card></list-card>
  <list-card></list-card>
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
