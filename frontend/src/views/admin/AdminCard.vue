<template>
  <v-card class="bg-white pa-5 mr-10 rounded mt-5" :elevation="5">
    <div class="d-flex justify-space-between">
      <div class="d-flex">
        <img
          class="rounded"
          src="https://liftedasia.com/assets/content_images/vannda-660x440.jpg"
          alt=""
          width="160"
          height="90"
        />
        <div>
          <h3 class="ml-6">Tutorial on Canvas Painting for Beginners</h3>
          <div class="d-flex justify-space-between ml-4 mt-4">
            <div class="d-flex">
              <v-icon>mdi-map-marker</v-icon>
              <div class="text ml-2">
                <span class="text-grey-lighten-1">Status</span><br />
                <p class="mt-0">Publish</p>
              </div>
            </div>
            <div class="d-flex ml-5">
              <v-icon>mdi-calendar</v-icon>
              <div class="text ml-3">
                <span class="text-grey-lighten-1">Start on</span>
                <p class="mt-0">30 June,2023 7:30AM</p>
              </div>
            </div>
            <div class="d-flex">
              <v-icon>mdi-calendar</v-icon>
              <div class="text ml-3">
                <span class="text-grey-lighten-1">Ticket</span>
                <p class="mt-0 ml-2">500</p>
              </div>
            </div>
            <div class="d-flex ml-5">
              <v-icon>mdi-map</v-icon>
              <div class="text ml-3">
                <span class="text-grey-lighten-1">Tickets sold</span>
                <p class="mt-0 ml-5">430</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div>
        <v-menu>
          <template v-slot:activator="{ props }">
            <v-icon class="mt-2" v-bind="props">mdi-dots-vertical</v-icon>
          </template>
          <v-list>
            <v-list-item
              value="list"
              @click="alert.publicAlert(props.eventPreview.id)"
            >
              <v-list-item-title>Post</v-list-item-title>
            </v-list-item>
            <v-list-item value="list">
              <v-list-item-title>Edit</v-list-item-title>
            </v-list-item>
            <v-list-item
              value="list"
              @click="
                props.eventPreview &&
                  deleteEventCard(props.eventPreview.eventId)
              "
            >
              <v-list-item-title>Delete</v-list-item-title>
            </v-list-item>
          </v-list>
        </v-menu>
      </div>
    </div>
  </v-card>
</template>

<script setup>
import { ref, defineProps } from "vue";
import { sweetAlert } from "@/stores/sweetAlert.js";
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

function deleteEventCard(eventId) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      axios
        .delete(`/events/${eventId}`)
        .then(() => {
          Swal.fire("Deleted!", "Your event card has been deleted.", "success");
        })
        .catch((error) => {
          console.error(error);
          Swal.fire(
            "Error!",
            "An error occurred while deleting the event card.",
            "error"
          );
        });
    }
  });
}

const alert = sweetAlert();
</script>


<style scoped>
.delete-icon,
.edit-icon {
  cursor: pointer;
  margin-right: 10px;
  transition: transform 0.2s ease-in-out;
}
.delete-icon:hover {
  transform: scale(1.2);
}
.edit-icon:hover {
  transform: scale(1.2);
}
</style>