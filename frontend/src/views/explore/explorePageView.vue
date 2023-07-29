<template>
  <banner-view></banner-view>
  <search-view></search-view>
  <category-view></category-view>
  <list-card>
    <div class="ml-16">
      <h1>{{ t('upcomingEvents.main') }}</h1>
      <p>{{ t('upcomingEvents.subtext') }}</p>
    </div>
  </list-card><br>
  <pagination-view></pagination-view>
  <footer-view></footer-view>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
import ListCard from '@/components/partials/cards/ListCard.vue';

const { t } = useI18n();

</script>

