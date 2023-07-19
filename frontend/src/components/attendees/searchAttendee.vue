<template>
    <v-card class="d-flex">
        <v-card-title class="d-flex">
            <h3 class="mt-3 mr-5">Attendees</h3>
            <v-spacer></v-spacer>
            <v-text-field append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
        </v-card-title>
        <div class="btn w-75 bg-white">
            <v-btn class="bg-red mt-5">
                <v-icon class="mr-3">mdi-microsoft-excel</v-icon>
                Export</v-btn>
        </div>
        <!-- <v-data-table
        :headers="headers"
        :items="desserts"
        :search="search"
      ></v-data-table> -->
    </v-card>
</template>
<style scoped>
.v-card-title{
    width: 85%;
}
</style>