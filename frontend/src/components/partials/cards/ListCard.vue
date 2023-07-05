
<template>
    <div class="mt-6 ml-16 mr-16">
        <div class="ml-16">
            <h1>Upcoming Events</h1>
            <p>You can chooses to display feature</p>
        </div>
        <div class="ml-4 mr-8 d-flex justify-space-evenly flex-wrap">
            <div class="card pa-3 rounded bg-grey-lighten-2 mt-10" v-for="n in 4" :key="n">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU" alt="">
                <div>
                    <div class="d-flex">
                        <div class="d-flex">
                            <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked">mdi-heart</v-icon>
                            <p>100</p>
                        </div>
                        <div class="d-flex ml-10">
                            <v-icon icon="mdi-share" size="30"></v-icon>
                            <p>100</p>
                        </div>
                    </div><br>
                    <h2>VANNDA CONCERT</h2>
                    <div class="d-flex">
                        <v-icon> mdi-calendar</v-icon>
                        <p class="ml-5">07 July 2023</p>
                    </div>
                    <div class="d-flex">
                        <v-icon>mdi-map</v-icon>
                        <p class="ml-5">Eon 2 sensok city</p>
                    </div><br>
                    <button class="bg-red pa-1 rounded d-flex align-end" id="booking">Booking</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  name: 'App',
  data: () => ({
    liked: false,
  }),
};
</script>

<style scoped>
    .card{
        /* background-color: rgb(198, 196, 196); */
        width: 22%;
        
    }
    img{
        width: 100%;
        border-radius: 10px;
    }
    #booking{
        margin-left: 75%;
    }
</style>