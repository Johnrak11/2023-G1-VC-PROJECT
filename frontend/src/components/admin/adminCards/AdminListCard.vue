<template>
    <v-card class="bg-grey-lighten-2 card-event" style="height: 100vh; overflow-y: scroll">
        <ul class="mt-16 ml-8">
            <li class="d-flex icon mt-2">
                <v-list-item prepend-icon="mdi-calendar" title="Event" value="event"></v-list-item>
            </li>
        </ul>
        <v-card class="bg-white pa-5 mr-10 rounded ml-8" :elevation="5">
            <v-form @submit.prevent="events.searchEventsByAdmin(name,email)">
                <div class="d-flex align-center" style="margin-right: 8%; width: 60%;gap: 5px;">
                    <v-text-field :loading="loading" density="compact" variant="solo" :label="t('search event')"
                        append-inner-icon="mdi-calendar-text" single-line hide-details style="width: 100%" v-model="name">
                    </v-text-field>
                    <v-text-field :loading="loading" density="compact" variant="solo" :label="t('search event')"
                        append-inner-icon="mdi-email" single-line hide-details style="width: 100%" v-model="email">
                    </v-text-field>
                    <v-btn type="submit" class=" rounded" :loading="events.isSearch" variant="tonal" style="width: 20%; height:8vh;">{{ t('search')
                    }}</v-btn>
                </div>
            </v-form>
        </v-card>
        <div v-if="events.events.length > 0" class="ml-8 mb-5">
            <AdminCard v-for="event of events.events" :key="event.id" :eventInfor="event" />
        </div>
        <div v-else class="ml-8 mb-5">
            <h2 color="grey" class="text-center mt-10"> {{ events.errorMessage }}</h2>
        </div>
    </v-card>
</template>

<script setup>
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
import AdminCard from './AdminCard.vue'
import { onMounted, ref } from "vue";
import { eventStores } from '@/stores/eventsStore.js'
const events = eventStores()
const loading = ref(false);
const name = ref("");
const email = ref("");

onMounted(() => {
    events.getDataAxios()
})
</script>

<style></style>