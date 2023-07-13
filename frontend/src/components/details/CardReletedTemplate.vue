<template>
  <v-sheet class="bg-grey-lighten-2" elevation="8"   width="100%">
    <v-slide-group v-model="model" class="pa-4" center-active show-arrows>
      <v-slide-group-item class="group-card  ml-5" v-for="(event, index) in eventStore.reletedEvent" :key="index" v-slot="{ isSelected, toggle }" >
        <div class="card pa-2 rounded bg-white" :color="isSelected ? 'primary' : 'grey-lighten-1'" @click="toggle" height="50vh">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU"
            alt="" />
          <div>
            <div class="d-flex">
              <div class="d-flex">
                <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked">mdi-heart</v-icon>
                <p class="mt-1">100</p>
              </div>
              <div class="d-flex ml-10">
                <v-col cols="auto">
                  <v-dialog transition="dialog-bottom-transition" width="30%">
                    <template v-slot:activator="{ props }">
                      <div class="d-flex" style="margin-top: -25%">
                        <v-icon icon="mdi-share" size="30" v-bind="props" @click="ClickShare(event.id)"></v-icon>
                        <p class="mt-1">100</p>
                      </div>
                    </template>
                    <template v-slot:default="{ isActive }">
                      <v-card class="dialog d-flex w-100">
                        <v-toolbar color="red" title="Share"></v-toolbar><br />
                        <div class="d-flex justify-space-evenly">
                          <ShareNetwork network="facebook" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="event.name" :description="event.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 color" size="50">mdi-facebook</v-icon>
                            <p class="text-black">Facebook</p>
                          </ShareNetwork>
                          <ShareNetwork network="telegram" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="event.name" :description="event.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 color" size="50">mdi-telegram</v-icon>
                            <p class="text-black">Telegram</p>
                          </ShareNetwork>
                          <ShareNetwork network="linkedin" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="event.name" :description="event.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 color" size="50">mdi-linkedin</v-icon>
                            <p class="text-black">Linkedin</p>
                          </ShareNetwork>
                          <ShareNetwork network="whatsapp" :url="eventStore.localHttp + '/detail/' + event.id"
                            :title="event.name" :description="event.description"
                            quote="The hot reload is so fast it\'s near instant. - Evan You" hashtags="vuejs,vite"
                            class="social-share">
                            <v-icon left class="ml-2 color" size="50">mdi-whatsapp</v-icon>
                            <p class="text-black">Whatsapp</p>
                          </ShareNetwork>
                        </div>
                        <br />
                        <div class="ml-5 link rounded mr-5 d-flex justify-space-between">
                          <p>{{ eventStore.localHttp + "/detail/" + event.id }}</p>
                          <v-icon class="pa-4 copy">mdi-attachment</v-icon>
                        </div>
                        <v-card-actions class="justify-center">
                          <v-btn variant="text" @click="isActive.value = false">Close</v-btn>
                        </v-card-actions>
                      </v-card>
                    </template>
                  </v-dialog>
                </v-col>
              </div>
            </div>

            <br />
            <h3 class="title">{{ event.name }}</h3>
            <div class="d-flex">
              <v-icon class="mt-2">mdi-calendar</v-icon>
              <p class="ml-5 mt-2">{{ event.date }}</p>
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
      </v-slide-group-item>
    </v-slide-group>
  </v-sheet>
</template>

<script setup>
import { ref, onMounted } from "vue";
import { eventStores } from "@/stores/eventsStore.js";
import { defineProps } from "vue";

const eventStore = eventStores();
const liked = ref(false);

function ClickShare(id) {
  console.log(id);
}
// const active = ref("");
const model = ref(null);
const props = defineProps({
  eventInfor: Object,
});

onMounted(() => {
  console.log(eventStore.reletedEvent);
  eventStore.getDataCategoryAxios(
    props.eventInfor.category_id,
    props.eventInfor.id
  );
});
</script>

<style>
p {
  font-size: 15px;
}
.group-card {
  margin: 0px 20px;
}
.button {
  display: flex;
  justify-content: end;
  margin-top: -40px;
}

.card {
  width: 12%;
  margin: 10px;
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
  margin-top: -23%;
}

</style>
