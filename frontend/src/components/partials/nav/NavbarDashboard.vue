<template>
  <v-card class="pa-3 d-flex flex-row-reverse navbar overflow-y-auto" :elevation="5">
    <div class="mr-7 d-flex flex-row-reverse justify-end">
      <router-link to="/" class="d-flex justify-center aling-center">
        <v-btn append-icon="mdi-logout" class="bg-red"> Leave </v-btn>
      </router-link>
    </div>
  </v-card>
</template>

<style scoped>
select {
  cursor: pointer;
  padding-left: 10px;
  padding-right: 10px;
}

a {
  text-decoration: none;

}

.navbar {
  overflow: hidden;
  position: fixed;
  top: 0;
  right: 0;
  width: 100%;
}
</style>