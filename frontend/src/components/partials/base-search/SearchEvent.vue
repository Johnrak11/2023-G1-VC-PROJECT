<template>
  <div>
    <img class="banner"
      src="https://as1.ftcdn.net/v2/jpg/01/07/66/26/1000_F_107662666_zMxONsgMZY1rm8eshfCGMsSfmRPbMuTB.jpg" alt=""
      width="100%" />
  </div>
  <div class="search-input" style="margin-top: -45%;">
    <slot></slot>
    <div class="w-90 search ">
      <input v-model="searchName" class="bg-grey-lighten-2 pa-3 w-25" type="text" placeholder="Enter more" />
      <select class="p-16 w-25 pa-3 bg-grey-lighten-2" v-model="searchCategoryByID">
        <option disabled value="">Select category</option>
        <option value="">All</option>
        <option v-for="category of categories.categories" :key="category.id" :value="category.id">
          {{ category.name }}
        </option>
      </select>
      <input v-model="searchDate" type="date" placeholder="Add time" class="w-25 bg-grey-lighten-2 date" />
      <button class="pa-3 bg-red" @click="eventSearch">Search</button>
    </div>
  </div>
</template>
<script setup>
import { ref } from "vue";
import { eventStores } from "@/stores/eventsStore.js";
import { onMounted } from "vue";
import { categoryStore } from "@/stores/categoryStore.js";

const searchName = ref("");
const searchDate = ref("");
const searchCategoryByID = ref("");
const events = eventStores();
function eventSearch() {
  console.log(searchName.value + searchDate.value + searchCategoryByID.value);
  events.searchEvents(
    searchName.value,
    searchDate.value,
    searchCategoryByID.value
  );
}

const categories = categoryStore();
onMounted(() => {
  categories.getDataCategories();
});
</script>

<style scoped>
input,
select {
  /* background-color: #b1b0b0; */
  border: 1px solid black;
}

button {
  width: 10%;
}

.search {
  margin-left: 10%;
}

.search-input {
  margin-top: -40%;
}

button {
  border: 1px solid red;
}

.banner {
  height: 100vh;
}

.date {
  padding: 11px;
}
</style>