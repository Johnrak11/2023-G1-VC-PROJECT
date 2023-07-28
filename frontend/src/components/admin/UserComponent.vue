<template>
    <v-card>
      <v-layout>
        <v-main style="height: 100vh;">
          <TableUser></TableUser>
          <ContainLeftAdmin />
        </v-main>
      </v-layout>
  </v-card>
</template>
<script setup>
import ContainLeftAdmin from '../../views/admin/ContainLeftAdmin.vue'
import TableUser from './adminCards/TableUser.vue'
// import { userStore } from '@/stores/user.js';
// import { onMounted } from 'vue';
// const users = userStore();
// onMounted(() => {
//     users.getAllUsers()
// })
</script>
<style scoped>
/* .text-left {
    text-align: left;
} */

/* Adjust the padding and margin of the cells */
thead th {
    padding: 8px;
    margin: 0;
}

tbody td {
    padding: 8px;
    margin: 0;
}

.table::-webkit-scrollbar {
    display: none;

}
li{
    list-style: none;
    padding: 5px;
    cursor: pointer;
}
li:hover{
   color: red;
}
</style>