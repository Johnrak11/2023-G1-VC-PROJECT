<template>
  <p></p>
</template>

<script setup>
import { onMounted } from 'vue'
import router from "@/routes/router.js";
onMounted(() => {
    const id = router.currentRoute.value.params.id;
    console.log(id)
    router.push(`/detail/${id}`)
})
</script>
