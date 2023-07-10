<template>
    <v-container>
      <v-btn @click="m">Payment</v-btn>
      <v-dialog v-model="isTrue">
        <v-card>
          <v-container>Test</v-container>
        </v-card>
      </v-dialog>
    </v-container>
  </template>
  
  <script setup>
  let isTrue = false;
  function m() {
    console.log("Hello");
    isTrue = true;
  }
  </script>
  
  <style></style>