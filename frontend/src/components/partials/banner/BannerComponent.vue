<template>
  <div class="banner">
    <video class="video-banner" autoplay loop muted>
      <source :src="bannerVideo" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>
  <div style="margin-top: -30%;" class="text-white mb-7">
    <h1 class="text-center text-h2 text--bold animate__animated animate__fadeInDown" style="font-weight: bold;">{{
      t('banner title') }}</h1>
    <p class="text-center text--bold mt-5" style="font-weight: bold;">{{ t('banner subtitle') }}</p>
  </div>
</template>
  

<script setup>
import bannerVideo from '@/assets/bannerVideo/circles.mp4'
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
</script>
<style scoped>
.banner {
  position: relative;
  width: 100%;
  height: 100vh; /* Set the desired height for your banner, 100vh to cover the viewport */
  overflow: hidden;
}

.video-banner {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit:cover; 
  z-index: -1; /* Move the video behind other elements with a lower z-index */
}
</style>
  