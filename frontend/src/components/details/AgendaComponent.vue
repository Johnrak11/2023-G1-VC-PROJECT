<template>
  <div class="col-md-6 d-flex mt-8">
    <div class="agenda-page d-flex flex-column">
      <div class="agenda d-flex bg-red justify-space-between pa-1">
        <h2 class="mt-1 ml-3">{{ t('agenda.agenda') }}</h2>
        <p class="mt-2 mr-3">{{ t('agenda.today') }}</p>
      </div>

      <div style="display: flex; height: 139px">
        <div
          v-if="items.length === 0"
          class="d-flex justify-center align-center bg-grey-lighten-2 empty-agenda"
        >
          <h3 style="color: red">Don't have agenda</h3>
        </div>
        <v-virtual-scroll
          :items="groupedItems"
          :item-height="300"
          class="scrollbar"
        >
          <template v-slot:default="{ item }">
            <div
              v-for="(card, index) in item"
              :key="index"
              class="card1 d-flex bg-grey-lighten-2" 
            >
              <div class="info mt-3 ml-4">
                <h2>{{ card.title }}</h2>
                <p class=" mt-3">{{ card.description }}</p>
                <div class="d-flex mt-4">
                  <v-icon color="red" style="margin-top: -3%;"> mdi-calendar</v-icon>
                  <p class="ml-4" style="margin-top: -3%;">{{ card.date }}</p>
                </div>
                
              </div>
            </div>
          </template>
        </v-virtual-scroll>
      </div>
    </div>
    <div class="organizer bg-grey-lighten-2 pa-3 ml-10">
      <div class="ml-5">
        <h2 class="mb-9">{{ t('organizer.organizer') }}</h2>
        <p>{{ t('organizer.name') }}: {{ organizer.firstname + " " + organizer.firstname }}</p>
        <p class="email">{{ t('organizer.email') }}: {{ organizer.email }}</p>
        <p class="phone">{{ t('organizer.phone') }}: {{ organizer.phone_number }}</p>
      </div>
    </div>
    <div></div>
  </div>
</template>

<script setup>
import { useRoute } from "vue-router";
import { ref, computed, onMounted } from "vue";
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
import baseAPI from "@/stores/axiosHandle.js";

const items = ref([]);
const organizer = ref({});

const groupedItems = computed(() => {
  const result = [];
  const groupSize = 3;
  for (let i = 0; i < items.value.length; i += groupSize) {
    result.push(items.value.slice(i, i + groupSize));
  }
  return result;
});

const fetchAgenda = async () => {
  const route = useRoute();
  const eventId = route.params.id;
  await baseAPI
    .get(`events/agenda/${eventId}`)
    .then((response) => {
      items.value = response.data.agendas;
    })
    .catch((error) => console.log(error));
};
const fetchOrganizer = async () => {
  const route = useRoute();
  const organizerId = route.params.id;
  await baseAPI
    .get(`/events/organizer/${organizerId}`)
    .then((response) => {
      organizer.value = response.data.data;
    })
    .catch((error) => console.log(error));
};
onMounted(() => {
  fetchAgenda();
  fetchOrganizer();
});
</script>

<style scoped>
p {
  font-size: 17px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.agenda {
  border-radius: 4px 4px 2px 2px;
}

.agenda-page {
  width: 60%;
}

.empty-agenda {
  width: 100%;
  border: 1px solid rgba(238, 142, 142, 0.718);
  border-radius: 2px 2px 4px 4px;
}
.card1 {
  border: 1px solid rgba(238, 142, 142, 0.718);
  width: 100%;
  border-radius: 2px 2px 4px 4px;
}

.info,
p {
  margin-top: -10px;
}

.organizer {
  width: 60%;
  border: 1px solid rgba(238, 142, 142, 0.718);
  border-radius: 6px;
}

.organizer h2 {
  color: red;
}

.email,
.phone {
  margin-top: -20px;
}

.scrollbar::-webkit-scrollbar {
  display: none;
}
</style>
