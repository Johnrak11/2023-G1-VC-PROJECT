<template>
  <v-table fixed-header height="82vh" style=" margin-right: 10%; border-radius: 5px; width: 97%; " class="list-user">
    <thead class="users">
      <tr>
        <th class="text-left bg-red" style="width: 10%;">
          Image
        </th>
        <th class="text-left bg-red" style="width: 25%;">
          Title
        </th>
        <th class="text-left bg-red" style="width: 15%;">
          Date
        </th>
        <th class="text-left bg-red" style="width: 10%;">
          Time
        </th>
        <th class="text-left bg-red" style="width: 25%;">
          Location
        </th>
        <th class="text-left bg-red" style="width: 30%;">
          Venue
        </th>
        <th class="text-left bg-red" style="width: 10%;">
          actions
        </th>
      </tr>
    </thead>
    <div>

    </div>
    <tbody v-for="event of events.events" :key="event.id" :eventInfor="event">
      <tr style="border: 1px solid black;">
        <td><img :src="event.image" alt="" width="70" class="mt-2"></td>
        <td>{{ event.name }}</td>
        <td>{{ event.date }}</td>
        <td>{{ event.time }}</td>
        <td>{{ event.location }}</td>
        <td>{{ event.venue }}</td>
        <td>
          <VerticalButton :event="event"></VerticalButton>
        </td>
      </tr>
      <hr>
    </tbody>
  </v-table>
</template>

<script setup>
import VerticalButton from "../../buttons/VerticalButton.vue";
// import { defineProps } from 'vue';
import { eventStores } from '@/stores/eventsStore.js'
const events = eventStores()
// import { sweetAlert } from '@/stores/sweetAlert.js';
// const alert = sweetAlert()

// const props = defineProps({
//   eventInfor: Object
// })
// import { onMounted } from 'vue'

</script>
<style scoped>
.text {
  font-size: 12px;
}
</style>