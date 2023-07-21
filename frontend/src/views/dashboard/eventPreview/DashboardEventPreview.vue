<template>
    <v-card>
        <v-layout>
            <v-main class="bg-grey-lighten-2">
                <ListCardPreview>
                    <div class="w-50 d-flex justify-end mt-3">
                        <createEventDailog> Create </createEventDailog>
                    </div>
                </ListCardPreview>
                <ContainLeftDashboard />
            </v-main>
        </v-layout>
    </v-card>
</template>

<script setup>
import ContainLeftDashboard from "../ContainLeftDashboard.vue";
import ListCardPreview from "../../../components/partials/dashboards/ListCardPreview.vue";
import createEventDailog from "../../../components/events/CreateEventDialog.vue";

</script>

<style scoped>
/* .border {
    border: 1px solid black;
} */
</style>
