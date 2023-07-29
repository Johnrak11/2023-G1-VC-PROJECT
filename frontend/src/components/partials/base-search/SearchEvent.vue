<template>
  <div>
    <img class="banner" />
  </div>
  <v-form @submit.prevent="eventSearch" class="d-flex align-center mr-12 ml-12 justify-center" style="margin-top: -45%;">
    <v-row class="w-90 search rounded ml-7 mr-8">
      <!-- Search Text Field -->
      <v-text-field v-model="searchName" density="compact" variant="solo" :label="t('search event')"
        prepend-inner-icon="mdi-magnify" single-line hide-details class="search-input"
        style="height: 15vh;padding-top: 18px;"></v-text-field>
      <!-- Category Select -->
      <v-select v-if="categories.categories" v-model="select" :items="categories.categories" item-title="name"
        hide-details class="search-input" item-value="id" persistent-hint return-object single-line
        prepend-inner-icon="mdi-tag" variant="solo"></v-select>

      <VDatePicker v-model="searchDate" color="red">
        <template #default="{ togglePopover }">
          <v-text-field v-model="formattedDate" density="compact" variant="solo" :label="t('select date')"
            @click="togglePopover" prepend-inner-icon="mdi-calendar" single-line hide-details class="search-input"
            style="height: 15vh;padding-top: 18px;"></v-text-field>
        </template>
      </VDatePicker>

      <!-- Search Button -->
      <v-btn type="submit" :loading="events.isSearch" class="search-input bg-red rounded"
        style="height: 9vh; width: 10%;">{{ t('search')
        }}</v-btn>
    </v-row>
  </v-form>
</template>
<script setup>
import dayjs from 'dayjs';
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
import { ref, computed } from "vue";
import { eventStores } from "@/stores/eventsStore.js";
import { onMounted } from "vue";
import { categoryStore } from "@/stores/categoryStore.js";

const searchName = ref("");
const searchDate = ref("");
const select = ref({ id: '', name: t('select category') });
const events = eventStores();
function eventSearch() {
  let newDate = ''
  if (searchDate.value) {
    newDate = dayjs(searchDate.value).format('YYYY-MM-DD')

  }
  events.searchEvents(
    searchName.value,
    newDate,
    select.value.id
  );
}

const formattedDate = computed(() => {
  if (!searchDate.value) {
    return null
  }
  return dayjs(searchDate.value).format('dddd D MMMM YYYY');
});

const categories = categoryStore();
onMounted(() => {
  categories.getDataCategories();
});
</script>

<style scoped>
.search {
  padding: 5px;
  gap: 2px;
  display: flex;
  justify-content: center;
  align-items: center;
}

button {
  border: 1px solid red;
}

.banner {
  height: 100vh;
}

.search-input {
  width: 20%;
  border-radius: 0px;
  /* Set the desired width */
  padding: 9px;
  /* Set the desired padding */
  /* margin-right: 10px; Add some right margin to separate the elements */
}
</style>