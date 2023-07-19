<template>
    <v-card>
        <v-layout>
            <v-main class="bg-grey-lighten-2">
                <ListCard>
                    <div class="w-50 d-flex justify-end mt-3">
                        <createEventDailog> Create </createEventDailog>
                    </div>
                </ListCard>
                <ContainLeftDashboard />
            </v-main>
        </v-layout>
    </v-card>
</template>

<script setup>
import ContainLeftDashboard from "./ContainLeftDashboard.vue";
import ListCard from "../../components/partials/dashboards/ListCardPreview.vue";
import createEventDailog from "../../components/events/CreateEventDailog.vue";

</script>

<style scoped>
/* .border {
    border: 1px solid black;
} */
</style>
