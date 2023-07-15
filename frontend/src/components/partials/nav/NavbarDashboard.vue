<template>
  <v-card class="pa-3 d-flex flex-row-reverse navbar overflow-y-auto" :elevation="5">
    <div class="mr-7 d-flex flex-row-reverse justify-end">
      <v-btn append-icon="mdi-logout" class="bg-red logout"> Logout </v-btn>
      <v-badge content="2" color="error" class="mt-2 mr-5">
        <v-icon>mdi-bell-outline</v-icon>
      </v-badge>
      <select class="mr-5">
        <option value="">ED/KH</option>
        <option value="">English</option>
        <option  value="">ខ្មែរ</option>
      </select>
    </div>
  </v-card>
</template>

<style scoped>
.logout {
  width: 50%;
}

select {
  cursor: pointer;
  padding-left: 10px;
  padding-right: 10px;
}

.navbar {
  overflow: hidden;
  position: fixed;
  top: 0;
  right: 0;
  width: 100%;
}
</style>