<template>
    <div class="d-flex" id="top-card">
        <ListCardMap></ListCardMap>
        <ListShowMap></ListShowMap>
    </div>
</template>
<script setup>
import ListCardMap from '@/components/partials/cards/ListCardMap.vue'
import ListShowMap from '@/components/maps/ListShowMap.vue'
import { onMounted } from 'vue'
onMounted(() => {
    var element = document.getElementById("top-card");
    element.scrollIntoView({ behavior: "smooth" });
})
</script>
  