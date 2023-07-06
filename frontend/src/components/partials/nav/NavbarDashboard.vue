<template>
    <div>
        <v-img class="logo ml-13 mt-4" :width="120" aspect-ratio="16/9" cover src="../../../assets/vanda.jpg"></v-img>
        <h2 class="ml-3 text">Vanda SOPHAL</h2>
        <hr class="w-100">
    </div><br>
    <ul>
        <router-link to="/dashboard/dashboards" class="d-flex icon mt-2 pa-2">
            <img src="https://cdn0.iconfinder.com/data/icons/octicons/1024/dashboard-512.png" alt="" width="40">
            <p class="ml-5 mt-1">Dashboard</p>
        </router-link>
        <router-link to="/events" class="d-flex icon pa-2">
            <img src="https://o.remove.bg/downloads/5ed7a2ef-5797-4b94-b580-8b62ea07bd9f/calendar-date-date-notes-business-office-event-icon-template-black-color-editable-calendar-date-symbol-flat-illustration-for-graphic-and-web-design-free-vector-removebg-preview.png" alt="" width="40">
            <p class="ml-5 mt-2">Event</p>
        </router-link>
        <li class="d-flex icon pa-2">
            <img src="https://cdn-icons-png.flaticon.com/512/5679/5679034.png" alt="" width="30">
            <p class="ml-5">Promotion</p>
        </li>
        <li class="d-flex icon pa-2">
            <img src="https://o.remove.bg/downloads/ef3d3b03-57cb-4139-8aa2-c472605a4a65/download-removebg-preview.png" alt="" width="30">
            <p class="ml-5">Report</p>
        </li>
        <li class="d-flex icon pa-2">
            <img src="https://o.remove.bg/downloads/4bc772f4-6695-4a39-b693-a1c00d4c126a/279-2797797_png-file-svg-payment-methods-icon-png-transparent-removebg-preview.png" alt="" width="30">
            <p class="ml-5">Payout</p>
        </li>
        <li class="d-flex icon pa-2">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/18/About_icon_%28The_Noun_Project%29.svg/2048px-About_icon_%28The_Noun_Project%29.svg.png" alt="" width="30">
            <p class="ml-5">About</p>
        </li>
    </ul>
    <div class="logout pa-4" :style="{ cursor: 'pointer' }">
        <button>LOGOUT</button>
        <!-- <img class="ml-5" src="https://cdn-icons-png.flaticon.com/512/3596/3596149.png" alt="" width="30"> -->
        <v-icon class="ml-3">mdi-logout</v-icon>
    </div>
</template>

<style scoped>
.logo {
    border-radius: 50%;
}
.text{
    text-align: center;
}
.icon{
    padding-left: 10%;
}
li p{
    font-size: 20px;
    
}
li:hover{
    cursor: pointer;
    background-color: rgba(255, 0, 0, 0.176);
    padding: 10px;
}
.logout{
    position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: red;
  color: white;
  text-align: center;
}
:focus {
  background-color: red;
  cursor: pointer;
  color: white;
}
</style>