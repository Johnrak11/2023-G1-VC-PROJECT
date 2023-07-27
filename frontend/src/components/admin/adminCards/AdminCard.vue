<template>
  <v-card class=" bg-white pa-3 mt-4 mr-10 overflow-y-auto" :elevation="2"
    style="border-left: 3px solid red; border-radius: 10px;">
    <div class="d-flex justify-space-between">
      <div class="d-flex">
        <img class="rounded" :src="props.eventInfor.image" alt="" width="60" height="60">
        <div>
          <strong class="ml-6">Title</strong>
          <p class=" ml-6 mt-2">{{ props.eventInfor.name }}</p>
        </div>
      </div>
      <div>
        <strong>Date</strong>
        <p class="mt-2">{{ props.eventInfor.date }}</p>
      </div>
      <div>
        <strong>Time</strong>
        <p class="mt-2">{{ props.eventInfor.time }}</p>
      </div>
      <div>
        <strong>Location</strong>
        <p class="mt-2">{{ props.eventInfor.location }}</p>
      </div>
      <div>
        <strong>Venue</strong>
        <p class="mt-2">{{ props.eventInfor.venue }}</p>
      </div>
      <div class="mt-3">
        <VerticalButton :event="props.eventInfor"></VerticalButton>
      </div>
    </div>
  </v-card>
</template>

<script setup>
import VerticalButton from "../../buttons/VerticalButton.vue";
import { defineProps } from 'vue';
// import { sweetAlert } from '@/stores/sweetAlert.js';
// const alert = sweetAlert()

const props = defineProps({
  eventInfor: Object
})
// import { onMounted } from 'vue'

</script>
<style scoped>
.text {
  font-size: 12px;
}
</style>