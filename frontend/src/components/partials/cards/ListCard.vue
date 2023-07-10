
<template>
    <div class="mt-6 ml-16 mr-16" >
        <div class="ml-16">
        <h1>Upcoming Events</h1>
        <p>You can chooses to display feature</p>
        </div>
        <div>
            <div class="d-flex ml-4 mr-8 d-flex justify-space-evenly flex-wrap">
                <CardsComponent v-for="n in 4" :key="n"/>
            </div>
        </div>
    </div>
</template>
<script setup>
import CardsComponent from "./CardsComponent.vue";
</script>
<style scoped>


</style>