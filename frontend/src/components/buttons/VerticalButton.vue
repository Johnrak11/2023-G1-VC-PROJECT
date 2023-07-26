<template>
  <div>
    <v-menu>
      <template v-slot:activator="{ props }">
        <v-icon class="mt-2" v-bind="props">mdi-dots-vertical</v-icon>
      </template>
      <v-list>
        <v-list-item value="list">
          <v-list-item-title>Edit</v-list-item-title>
        </v-list-item>
        <v-list-item value="list" @click="deleteEventCard(props.eventPreview)">
          <v-list-item-title>Delete</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>

<script setup>
import { ref, defineProps } from "vue";
import router from "@/routes/router.js";
import { onMounted } from "vue";
import axios from "axios";
import Swal from "sweetalert2";

const props = defineProps({
  eventPreview: Object,
});

const currentpath = ref("");
onMounted(() => {
  const currentPageRoute = router.currentRoute.value.path;
  currentpath.value = currentPageRoute;
});

async function deleteEventCard(eventId) {
  try {
    await axios.delete(`/events/${eventId}`);
    Swal.fire("Deleted!", "Your event card has been deleted.", "success");
  } catch (error) {
    console.error(error);
    Swal.fire(
      "Error!",
      "An error occurred while deleting the event card.",
      "error"
    );
  }
}
</script>

<style>
</style>