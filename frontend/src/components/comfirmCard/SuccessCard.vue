<template>
    <v-card class="pb-7 pt-7" elevation="10">
        <div class="title-container d-flex justify-center align-center flex-column">
            <slot name="image"></slot>
        </div>
        <v-list class="border mx-4">
            <v-list-item class="d-flex justify-center">
                <slot name="title"></slot>
            </v-list-item>
            <v-list-item>
                <slot name="content"></slot>
            </v-list-item>
        </v-list>
        <v-card-actions class="mx-2 mt-10">
            <v-btn color="white" class="bg-primary" @click.prevent="router.push('/tickets')" style="width: 100%;">
                Continue Booking
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup>
import router from "@/routes/router";
</script>