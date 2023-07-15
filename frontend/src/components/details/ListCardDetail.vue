<template>
  <div class="row bg-grey-lighten-2">
    <div class="col-md-4">
      
        <cardTemplate :eventInfor="props.event"></cardTemplate>
      
    </div>
  </div>
</template>

<script setup>
import { defineProps } from 'vue';


const props = defineProps({
  event: Object
});
import CardTemplate from './CardReletedTemplate.vue';
</script>


<style></style>
