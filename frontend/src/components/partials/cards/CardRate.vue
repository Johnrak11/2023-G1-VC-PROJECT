<template>
  <div class="ml-10 d-flex justify-space-evenly mr-6 mb-10">
    <div class="card bg-grey-lighten-2 rounded pa-3" data-aos="fade-right" data-aos-offset="200"
      data-aos-easing="ease-in-sine">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
        reprehenderit cum, velit accusantium ab in sequi porro nisi adipisci
        nulla! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et iste
        rem laudantium dolor exercitationem quibusdam culpa atque labore esse
        consequuntur!
      </p>
      <strong>VANDA</strong>
      <p>admin</p>
      <div class="d-flex">
        <v-icon color="orange" v-for="n in 5" :key="n"> mdi-star </v-icon>
      </div>
    </div>
    <div class="card bg-grey-lighten-2 rounded pa-3" data-aos="fade-left" data-aos-offset="200"
      data-aos-easing="ease-in-sine">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
        reprehenderit cum, velit accusantium ab in sequi porro nisi adipisci
        nulla! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et iste
        rem laudantium dolor exercitationem quibusdam culpa atque labore esse
        consequuntur!
      </p>
      <strong>VANDA</strong>
      <p>admin</p>
      <div class="d-flex">
        <v-icon color="orange" v-for="n in 5" :key="n"> mdi-star </v-icon>
      </div>
    </div>
  </div>
</template>
<style scoped>
.card {
  width: 43%;
}
</style>