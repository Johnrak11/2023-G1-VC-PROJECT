<template>
  <div class="text-center pa-16">
    <v-pagination
      v-model="page"
      :length="6"
      prev-icon="mdi-menu-left"
      next-icon="mdi-menu-right"
    ></v-pagination>
  </div>
</template>

<script>
export default {
   data () {
      return {
        page: 1,
      }
    },
};
</script>

<style>
</style>