<template>
  <div class="ml-10 d-flex justify-space-evenly mr-6 mb-10">
    <div class="card bg-grey-lighten-2 rounded pa-3" data-aos="fade-right" data-aos-offset="200"
      data-aos-easing="ease-in-sine">
      <strong>{{ t('serviceCard1.main') }}</strong>
      <p>{{ t('serviceCard1.description') }}</p>
    </div>
    <div class="card bg-grey-lighten-2 rounded pa-3" data-aos="fade-left" data-aos-offset="200"
      data-aos-easing="ease-in-sine">
      <strong>{{ t('serviceCard2.main') }}</strong>
      <p>{{ t('serviceCard2.description') }}</p>
    </div>
  </div>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
</script>
<style scoped>
.card {
  width: 43%;
}
</style>