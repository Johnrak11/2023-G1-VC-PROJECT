<template>
  <v-layout class="nav-bar d-flex justify-space-between w-100 bg-color" :elevation="7">
    <v-nav-bar-left class="ml-12 d-flex left">
      <v-app-bar-nav-icon></v-app-bar-nav-icon>
      <v-app-bar-title class="mt-3">LOCAL EVENT</v-app-bar-title>
    </v-nav-bar-left>
    <v-nav-bar-right class="d-flex right justify-space-between">
      <v-left-content class="ml-16">
        <ul class="d-flex justify-space-evenly mt-2">
          <router-link to="/">
            <li class="rounded">Home</li>
          </router-link>
          <router-link to="/explor">
            <li class="rounded">Explor</li>
          </router-link>
          <router-link to="/myticket">
            <li class="rounded">MyTicket</li>
          </router-link>
        </ul>
      </v-left-content>
      <v-right-content class="d-flex profile">
        <!-- <button class="mr-6" :elevation="7" color="primary">ED</button> -->
        <select class="mr-5">
          <option value="">ED/KH</option>
          <option value="">English</option>
          <option value="">ខ្មែរ</option>
        </select>
        <v-badge content="2" color="error" class="mt-2 mr-5">
          <v-icon>mdi-bell-outline</v-icon>
        </v-badge>
        <router-link to="/register"><v-btn color="blue" width="5">Login</v-btn></router-link>
        <!-- <img
          src="https://o.remove.bg/downloads/01e3f24e-5f37-469d-b513-1535078501c9/v937-aew-165-klhcwecm-removebg-preview.png"
          width="40" height="40" /> -->
      </v-right-content>
    </v-nav-bar-right>
  </v-layout>
</template>


<style scoped>
.nav-bar {
  overflow: hidden;
  background: white;
  position: fixed;
  top: 0;
  width: 100%;
}

ul {
  list-style: none;
}

select {
  cursor: pointer;
  padding-left: 10px;
  padding-right: 10px;
}


.justify-space-between {
  display: flex;
  justify-content: space-between;
}

.bg-color {
  /* background-color: white; */
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  padding: 10px;
}

.left {
  flex: 1;
}

.right {
  flex: 1;
}

li {
  margin-left: 30%;
  padding: 5px 10px 5px 10px;
}

.profile {
  margin-right: 10%;
}

li:hover {
  background-color: red;
  padding: 5px 10px 5px 10px;
  color: white;
  cursor: pointer;
}
</style>