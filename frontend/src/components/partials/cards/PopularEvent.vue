
<template>
    <div class="mt-6 ml-16 mr-16">
        <slot></slot>
        <div class="ml-4 mr-8 d-flex flex-wrap">
            <cardTemplate v-for="event in events" :key="event.id" :event="event"></cardTemplate>
        </div>
        <router-link to="/explor">
            <button class="bg-red explore mt-5">Explore</button>
        </router-link>
    </div><br>
</template>
<script setup>
import cardTemplate from './CardTemplate.vue';
</script>
<style scoped>
.explore {
    display: flex;
    justify-content: center;
    margin: auto;
    padding: 5px 50px 5px 50px;
}

a {
    text-decoration: none;
}
</style>