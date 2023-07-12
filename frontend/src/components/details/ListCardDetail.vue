<template>
  <div class="row bg-grey-lighten-2" >
      <div class="col-md-4">
        <v-carousel hide-delimiters>
          <v-carousel-item v-for="n in 3" :key="n">
            <div class="d-flex justify-space-evenly flex-wrap">
              <div class="card pa-2 rounded bg-white " v-for="n in 4" :key="n">
                <img
                  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU"
                  alt=""
                />
                <div>
                  <div class="d-flex">
                    <div class="d-flex">
                      <v-icon
                        :color="liked ? 'red' : 'grey'"
                        @click="liked = !liked"
                        class="mt-1"
                        >mdi-heart</v-icon
                      >
                      <p class="mt-1 ml-1">100</p>
                    </div>
                    <div class="d-flex ml-10">
                      <v-icon icon="mdi-share" size="30"></v-icon>
                      <p class="mt-1 ml-1">100</p>
                    </div>
                  </div>

                  <br />
                  <h2 class="title">VANNDA CONCERT</h2>
                  <div class="d-flex">
                    <v-icon>mdi-calendar</v-icon>
                    <p class="ml-5 mt-1">07 July 2023</p>
                  </div>
                  <div class="d-flex location">
                    <v-icon class="icon">mdi-map</v-icon>
                    <p class="ml-5 ">Eon 2 sensok city</p>
                  </div>
                  <br />
                  <div class="button d-flex justify-space-end">
                    
                    <button
                      class="bg-red pa-1 rounded d-flex align-end"
                      id="booking"
                    >
                      Booking
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </v-carousel-item>
        </v-carousel>
      </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>
p {
    font-size: 15px;
}

.card {
  width: 22%;
}

.card img {
  width: 100%;
  border-radius: 10px;
}

#booking #detail {
  margin-left: 75%;
}

.button {
  display: flex;
  justify-content: end;
  margin-top: -10px;
}

.icon {
  margin-top: -10px;
}

.title {
  margin-top: -28px;
}
.v-carousel-item {
  padding: 50px;
}
</style>