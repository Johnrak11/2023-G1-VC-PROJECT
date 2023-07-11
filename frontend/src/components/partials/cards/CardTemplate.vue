<template>
  <div class="card pa-3 rounded bg-grey-lighten-2 mt-10">
    <div>
        
    </div>
    <router-link :to="{ name: 'detail', params: { id: event.id } }">
      <img
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU"
        alt=""
      />
      <div>
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
        <h2>{{ event.name }}</h2>
        <div class="d-flex">
          <v-icon> mdi-calendar</v-icon>
          <p class="ml-5">{{ event.date }}</p>
        </div>
        <div class="d-flex">
          <v-icon>mdi-map</v-icon>
          <p class="ml-5">{{ event.location }}</p>
        </div>
        <br />
        <button class="bg-red pa-1 rounded d-flex align-end" id="booking">
          Booking
        </button>
      </div>
    </router-link>
  </div>
</template>

<script>
export default {
  props: ["event"],
};
</script>

<style scoped>
.card {
  width: 22%;
}
a {
  text-decoration: none;
  color : black;
}

img {
  width: 100%;
  border-radius: 10px;
}

#booking {
  margin-left: 75%;
}
</style>
