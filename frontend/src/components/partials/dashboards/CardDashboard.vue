<template>
  <div class="dashboard-container">
    <div class="ml-8 mt-16">
      <ul>
        <li class="d-flex icon mt-2 pa-2">
          <img src="https://cdn0.iconfinder.com/data/icons/octicons/1024/dashboard-512.png" alt="" width="30" />
          <h3 class="ml-5 mt-1">Dashboard</h3>
        </li>
      </ul>
    </div>
    <v-card class="bg-white mr-10 pa-5 rounded ml-8" :elevation="5">
      <div class="d-flex justify-space-between">

        <div class="d-flex">
          <img
            src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/2048px-Circle-icons-profile.svg.png"
            alt="" width="70" />
          <div class="ml-5 mt-3">
            <h4>Juu Dii</h4>
            <p>My organsiation</p>
          </div>
        </div>
        <div class="mt-4">
          <v-btn prepend-icon="mdi-plus"> Add organisation </v-btn>
        </div>
      </div>
    </v-card>
    <br />
    <v-card class="bg-white pa-5 mr-10 rounded ml-8" :elevation="5">
      <p>1st April,2022 - 30th April, 2022</p>
      <div class="d-flex justify-space-between">
        <RevenueCard />
        <OrderCard />
        <PageviewCard />
        <TicketCard />
      </div>
    </v-card><br>
    <v-card class="bg-white pa-5 mr-10 rounded ml-8 h-50 mb-5" :elevation="5">
      <div class="d-flex justify-space-between">
        <div class="w-50">
          <v-select :items="['Revenue', 'Order', 'Page view', 'Ticket']" label="" class="drop" persistent-hint
            variant="solo">
            <template v-slot:item="{ item, props }">
              <v-list-item v-bind="props">
                <template v-slot:title>
                  {{ item.raw }}
                </template>
              </v-list-item>
            </template>
          </v-select>
        </div>
        <div class="d-flex btn justify-end">
          <v-btn class="button">monthly</v-btn>
          <v-btn class="button">weekly</v-btn>
          <v-btn class="button">daily</v-btn>
        </div>
      </div>
    </v-card>
  </div>
</template>
<script setup>
import RevenueCard from "./RevenueCard.vue";
import OrderCard from "./OrderCard.vue";
import PageviewCard from "./PageviewCard.vue";
import TicketCard from "./TicketCard.vue";
// import NavbarDashboard from "../nav/NavbarDashboard.vue";
</script>
<style scoped>
span {
  font-size: 12px;
}

.drop {
  width: 30%;
}

button {
  border: 1px solid red;
}

button:hover {
  background-color: red;
  color: white;
}

.button {
  width: 35%;
}

.dashboard-container {
  height: 100vh;
  overflow: auto;
}

.dashboard-container::-webkit-scrollbar {
  /* width: 0.5em; */
  display: none;
}
</style>