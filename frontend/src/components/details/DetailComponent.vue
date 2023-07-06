<template>
  <div class="container bg-blue">
    <div class="detail pa-15">
      <div class="row d-flex pa-10">
        <div class="col-md-6">
          <img class="img"
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpYKUB8S_FhiI5IbMdWgVLhcT_DfutYZmq3A&usqp=CAU" 
            alt="Image" 
          />
          <div class="d-flex">
            <div class="d-flex">
              <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked"
                >mdi-heart</v-icon
              >
              <p>100</p>
            </div>
            <div class="d-flex ml-10">
              <v-icon icon="mdi-share" size="30"></v-icon>
              <p>100</p>
            </div>
          </div>
          <br />
        </div>
        <div class="col-md-6">
          <h2>VANNDA CONCERT</h2>
          <p  color="black">
            Choose your favorite vanda posters from 1251 available designs. All vanda posters ship within 48 hours and include a 30-day money-back guarantee.
          </p>
          <div class="d-flex">
            <v-icon>mdi-calendar</v-icon>
            <p class="ml-5">07 July 2023</p>
          </div>
          <div class="d-flex">
            <v-icon>mdi-map</v-icon>
            <p class="ml-5">Eon 2 sensok city</p>
          </div>
          <button>booking</button>
          <br />
        </div>
      </div>
      <div class="row ">
        <div class="col-md-4">
          <div class="ml-4 d-flex justify-space-evenly flex-wrap">
            <div
              class="card pa-3 rounded bg-grey-lighten-2 mt-10"
              v-for="n in 3"
              :key="n"
            >
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
                      >mdi-heart</v-icon
                    >
                    <p>100</p>
                  </div>
                  <div class="d-flex ml-10">
                    <v-icon icon="mdi-share" size="30"></v-icon>
                    <p>100</p>
                  </div>
                </div>
                <br />
                <h2>VANNDA CONCERT</h2>
                <div class="d-flex">
                  <v-icon>mdi-calendar</v-icon>
                  <p class="ml-5">07 July 2023</p>
                </div>
                <div class="d-flex">
                  <v-icon>mdi-map</v-icon>
                  <p class="ml-5">Eon 2 sensok city</p>
                </div>
                <br />
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
      </div>
    </div>
  </div>
</template>
<style scoped>
* {
  padding: 0;
  margin: 0;
}
.container {

  display: flex;
  justify-content: center;
  padding: 20px;

}

.img{
    width: 80vh;
}
.detail {
  background: rgb(222, 94, 94);
}

.card {
  width: 100%;
  max-width: 300px;
}
</style>
