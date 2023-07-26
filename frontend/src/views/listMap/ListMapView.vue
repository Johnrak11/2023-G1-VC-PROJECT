<template>
<<<<<<< HEAD
    <div class="d-flex">
=======
    <div class="d-flex" id="top-card">
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
        <ListCardMap></ListCardMap>
        <ListShowMap></ListShowMap>
    </div>
</template>
<script setup>
import ListCardMap from '@/components/partials/cards/ListCardMap.vue'
<<<<<<< HEAD
import ListShowMap from '@/components/maps/ListShowMap.vue'   
=======
import ListShowMap from '@/components/maps/ListShowMap.vue'
import { onMounted } from 'vue'
onMounted(() => {
    var element = document.getElementById("top-card");
    element.scrollIntoView({ behavior: "smooth" });
})
>>>>>>> fa1f02d7f5eed7cd883b4611ac6c301458584a9b
</script>
  