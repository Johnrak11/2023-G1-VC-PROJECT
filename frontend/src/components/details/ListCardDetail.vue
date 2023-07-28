<template>
  <div class="row ">
    <div class="col-md-4">
      
        <cardTemplate :eventInfor="props.event"></cardTemplate>
      
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';
import cardTemplate from './CardReletedTemplate.vue';

const props = defineProps({
  event: Object
});

</script>


<style></style>
