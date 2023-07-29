<template>
    <v-card>
      <v-layout>
        <v-main style="height: 100vh;">
          <TableUser></TableUser>
          <ContainLeftDashboard />
        </v-main>
      </v-layout>
  </v-card>
</template>
<script setup>
import ContainLeftDashboard from '../../views/dashboard/ContainLeftDashboard.vue'
import TableUser from './adminCards/TableUser.vue'

</script>
<style scoped>
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