<template>
  <v-carousel-item v-for="n in 3" :key="n">
    <div class="d-flex justify-space-evenly flex-wrap">
      <div
        class="card pa-2 rounded bg-white"
        v-for="(event, index) in eventStore.reletedEvent"
        :key="index"
      >
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU"
          alt=""
        />
        <div>
          <div class="d-flex">
            <div class="d-flex">
              <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked"
                >mdi-heart</v-icon
              >
              <p>100</p>
            </div>
            <div class="d-flex ml-10">
              <v-col cols="auto">
                <v-dialog transition="dialog-bottom-transition" width="30%">
                  <template v-slot:activator="{ props }">
                    <div class="d-flex" style="margin-top: -25%">
                      <v-icon
                        icon="mdi-share"
                        size="30"
                        v-bind="props"
                        @click="ClickShare(event.id)"
                      ></v-icon>
                      <p>100</p>
                    </div>
                  </template>
                  <template v-slot:default="{ isActive }">
                    <v-card class="dialog d-flex w-100">
                      <v-toolbar color="red" title="Share"></v-toolbar><br />
                      <div class="d-flex justify-space-evenly">
                        <ShareNetwork
                          network="facebook"
                          :url="httpRequest.api + '/events/' + event.id"
                          :title="event.name"
                          :description="event.description"
                          quote="The hot reload is so fast it\'s near instant. - Evan You"
                          hashtags="vuejs,vite"
                          class="social-share"
                        >
                          <v-icon left class="ml-2 color" size="50"
                            >mdi-facebook</v-icon
                          >
                          <p class="text-black">Facebook</p>
                        </ShareNetwork>
                        <ShareNetwork
                          network="telegram"
                          :url="httpRequest.api + '/events/' + event.id"
                          :title="event.name"
                          :description="event.description"
                          quote="The hot reload is so fast it\'s near instant. - Evan You"
                          hashtags="vuejs,vite"
                          class="social-share"
                        >
                          <v-icon left class="ml-2 color" size="50"
                            >mdi-telegram</v-icon
                          >
                          <p class="text-black">Telegram</p>
                        </ShareNetwork>
                        <ShareNetwork
                          network="linkedin"
                          :url="httpRequest.api + '/events/' + event.id"
                          :title="event.name"
                          :description="event.description"
                          quote="The hot reload is so fast it\'s near instant. - Evan You"
                          hashtags="vuejs,vite"
                          class="social-share"
                        >
                          <v-icon left class="ml-2 color" size="50"
                            >mdi-linkedin</v-icon
                          >
                          <p class="text-black">Linkedin</p>
                        </ShareNetwork>
                        <ShareNetwork
                          network="whatsapp"
                          :url="httpRequest.api + '/events/' + event.id"
                          :title="event.name"
                          :description="event.description"
                          quote="The hot reload is so fast it\'s near instant. - Evan You"
                          hashtags="vuejs,vite"
                          class="social-share"
                        >
                          <v-icon left class="ml-2 color" size="50"
                            >mdi-whatsapp</v-icon
                          >
                          <p class="text-black">Whatsapp</p>
                        </ShareNetwork>
                      </div>
                      <br />
                      <div
                        class="ml-5 link rounded mr-5 d-flex justify-space-between"
                      >
                        <p>{{ httpRequest.api + "/events/" + event.id }}</p>
                        <v-icon class="pa-4 copy">mdi-attachment</v-icon>
                      </div>
                      <v-card-actions class="justify-center">
                        <v-btn variant="text" @click="isActive.value = false"
                          >Close</v-btn
                        >
                      </v-card-actions>
                    </v-card>
                  </template>
                </v-dialog>
              </v-col>
            </div>
          </div>

          <br />
          <h2 class="title">{{ event.name }}</h2>
          <div class="d-flex">
            <v-icon>mdi-calendar</v-icon>
            <p class="ml-5 mt-1">{{ event.date }}</p>
          </div>
          <div class="d-flex location">
            <v-icon class="icon">mdi-map</v-icon>
            <p class="ml-5">{{ event.venue }}</p>
          </div>
          <br />
          <div class="button d-flex justify-space-end">
            <button class="bg-red pa-1 rounded d-flex align-end" id="booking">
              Booking
            </button>
          </div>
        </div>
      </div>
    </div>
  </v-carousel-item>
</template>

<script setup>
import { ref, onMounted } from "vue";
import eventStores from "@/stores/eventsStore.js";
import { axiosStore } from "../../stores/axiosHandle";
const httpRequest = axiosStore();

// const events = ref([]);
const eventStore = eventStores();
const liked = ref(false);

function ClickShare(id) {
  console.log(id);
}
eventStore.httpRequest = httpRequest.api;
console.log(eventStore.httpRequest)
eventStore.getDataCategoryAxios(2, 1);
console.log('befe')
console.log(eventStore.reletedEvent)
onMounted(() => {
  console.log('hello')
  console.log(eventStore.reletedEvent)
});
// onMounted({
//   events.value =  eventStore.getDataCategoryAxios(1, 2);
//   console.log('hello')
//   console.log(events.value);
// });
</script>

<style>
p {
  font-size: 15px;
}

.button {
  display: flex;
  justify-content: end;
  margin-top: -10px;
}
.card {
  width: 22%;
}

.card img {
  width: 100%;
  border-radius: 10px;
}
#booking {
  margin-left: 75%;
}
.icon {
  margin-top: -10px;
}
.title {
  margin-top: -28px;
}
.v-carousel-item {
  padding: 50px;
}
</style>
