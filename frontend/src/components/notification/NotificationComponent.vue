<template>
    <div class="notification-fixed pa-5">
        <div  class="d-flex justify-space-between">
            <h2>Notifications</h2>
            <div>
                <v-icon> mdi-share</v-icon>
                <v-icon> mdi-dots-vertical</v-icon>
            </div>
        </div>
        <div>
            <h3>Today</h3>
            <hr class="w-100">
        </div>
    </div>
    <v-card min-width="500" class="pa-5 mt-5 notification" style="height: 90vh;">
        <!-- <v-divider></v-divider> -->
        <div class="list">
            <v-list v-for="n in 10" :key="n">
                <div>
                    <v-list-item
                      prepend-avatar="https://cdn.vuetifyjs.com/images/john.jpg"
                      title="John Leider"
                      subtitle="Founder of Vuetify"
                      >
                      <!-- <p class="mt-0 blue-darken-1">2mn ago</p> -->
                    <template v-slot:append>
                        <v-btn
                        variant="text"
                        :class="state.fav ? 'text-black' : ''"
                        icon="mdi-dots-horizontal"
                        @click="fav = !fav"
                        ></v-btn>
                    </template>
                </v-list-item>
                </div>
            </v-list>
        </div>
      </v-card>
</template>
<script setup>
import { reactive } from 'vue'

const state = reactive({
  fav: true,
  menu: false,
  message: false,
  hints: true,
})
</script>
<style scoped>
.notification::-webkit-scrollbar {
  display: none;
}
.notification-fixed{
    overflow: hidden;
    transition: 0.4s;
    position: fixed;
    width: 100%;
    top: 0;
    background-color: white;
    z-index: 99;
}

</style>