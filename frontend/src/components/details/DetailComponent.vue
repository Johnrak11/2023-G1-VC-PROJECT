<template>
  <img
    class="img1 mt-10"
    src="https://edgefieldconcerts.com/wp-content/uploads/2022/07/rex-orange-county-2022-ecotl.jpg"
    alt=""
  />
  <div class="container d-flex flex-column">
    <div class="detail">
      <div class="row bg-white d-flex pa-6 flex-column">
        <div id="row1" class="col-md-6">
          <img
            class="img"
            src="https://liftedasia.com/assets/content_images/vannda-660x440.jpg"
            alt="Image"
          />
          <div class="d-flex mt-2 justify-space-between">
            <div class="icon-left d-flex">
              <div class="d-flex">
                <v-icon
                  class="mt-1"
                  :color="liked ? 'grey' : 'red'"
                  @click="liked = !liked"
                  >mdi-heart</v-icon
                >
                <p class="mt-1 ml-2">100</p>
              </div>
              <div class="d-flex ml-10">
                <v-icon icon="mdi-share" size="30"></v-icon>
                <p class="mt-1 ml-2">100</p>
              </div>
            </div>
            <div class="icon-right">
              <div class="d-flex ">
                <v-icon class="mr-2" icon="mdi-ticket" size="30"></v-icon>
                <p class="mt-1 ml-2">300</p>
              </div>
            </div>
          </div>
          <br />
        </div>
        <div class="col-md-6 ml-6">
          <h1>VANNDA CONCERT</h1>
          <p class="mt-5">
            Choose your favorite Vanda posters from 1251 available designs. All
            Vanda posters ship within 48 hours and include a 30-day money-back
            guarantee. <br />
            <br />
            Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book. It has survived not
            only five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. <br />
            <br />
            It was popularised in the 1960s with the release of Letraset sheets
            containing Lorem Ipsum passages, and more recently with desktop
            publishing software like Aldus PageMaker including versions of Lorem
            Ipsum.
          </p>
          <div class="contact d-flex justify-space-between">
            <div class="icons">
              <div class="d-flex">
                <v-icon> mdi-calendar</v-icon>
                <p class="ml-5">07 July 2023</p>
              </div>
              <div class="d-flex">
                <v-icon> mdi-calendar</v-icon>
                <p class="ml-5">8:00 PM/ 12:00 PM</p>
              </div>
              <div class="d-flex">
                <v-icon>mdi-map</v-icon>
                <p class="ml-5">Eon 2 sensok city</p>
              </div>
              <br />
            </div>
            <div class="map">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12345.678901234567!2d-122.4324!3d37.7897!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMznCsDU4JzU0LjQiTiAxMjLCsDM1JzQ5LjIiVw!5e0!3m2!1sen!2sus!4v1625706808123!5m2!1sen!2sus"
                width="455"
                height="200"
                style="border: 0"
                allowfullscreen=""
                loading="lazy"
              ></iframe>
            </div>
          </div>
          <div class="button mt-6">
            <button class="free bg-red pa-1 rounded">Free</button>
          </div>
        </div>
        <div class="col-md-6 d-flex mt-8">
          <div class="agenda-page d-flex flex-column">
            <div class="agenda d-flex bg-red justify-space-between pa-1">
              <h2 class="mt-1 ml-3">AGENDA</h2>
              <p class="mt-1 mr-3">Today</p>
            </div>
            <div style="display: flex; height: 160px">
              <v-virtual-scroll
                :items="groupedItems"
                :item-height="300"
                class="scrollbar"
              >
                <template v-slot:default="{ item }">
                  <div
                    v-for="(card, index) in item"
                    :key="index"
                    class="card1 d-flex bg-grey-lighten-2"
                  >
                    <div class="info mt-5 ml-4">
                      <h3>{{ card.title }}</h3>
                      <div class="d-flex mt-4">
                        <v-icon color="red"> mdi-calendar</v-icon>
                        <p class="ml-4 mt-1">{{ card.schedule }}</p>
                      </div>
                      <p class="ml-10">{{ card.description }}</p>
                    </div>
                  </div>
                </template>
              </v-virtual-scroll>
            </div>
          </div>
          <div class="organizer bg-grey-lighten-2 pa-3 ml-10">
            <div class="ml-5">
              <h2 class="mb-9">Organizers</h2>
              <p>Name: Green Tea</p>
              <p class="email">Email: greentea@gmail.com</p>
              <p class="phone">Phone: 012 394 485</p>
            </div>
          </div>
          <div></div>
        </div>
      </div>
    </div>
    <div class="row bg-grey-lighten-2">
      <div class="col-md-4">
        <v-carousel hide-delimiters>
          <v-carousel-item v-for="n in 3" :key="n">
            <div class="d-flex justify-space-evenly flex-wrap">
              <div class="card pa-3 rounded bg-white" v-for="n in 4" :key="n">
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
                  <h2 class="">VANNDA CONCERT</h2>
                  <div class="d-flex">
                    <v-icon>mdi-calendar</v-icon>
                    <p class="ml-5 mt-1">07 July 2023</p>
                  </div>
                  <div class="d-flex location">
                    <v-icon>mdi-map</v-icon>
                    <p class="ml-5 mt-1">Eon 2 sensok city</p>
                  </div>
                  <br />
                  <div class="button d-flex justify-space-between">
                    <button
                      class="bg-blue pa-1 rounded d-flex align-end"
                      id="booking"
                    >
                      Detail
                    </button>
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
  </div>
</template>
<script>
export default {
  data: () => ({
    items: [
      {
        title: "How to live?",
        schedule: "8:00 PM/ 12:00 PM",
        description:
          "Lorem Ipsum is simply dummy text of the printing and type.",
      },
      {
        title: "How to learn?",
        schedule: "9:00 AM/ 11:00 AM",
        description:
          "Lorem Ipsum is simply dummy text of the printing and type.",
      },
      {
        title: "How to code?",
        schedule: "2:00 PM/ 4:00 PM",
        description:
          "Lorem Ipsum is simply dummy text of the printing and type.",
      },
      {
        title: "How to play?",
        schedule: "3:00 PM/ 5:00 PM",
        description:
          "Lorem Ipsum is simply dummy text of the printing and type.",
      },
      {
        title: "How to work?",
        schedule: "10:00 AM/ 12:00 PM",
        description:
          "Lorem Ipsum is simply dummy text of the printing and type.",
      },
      {
        title: "How to rest?",
        schedule: "1:00 PM/ 3:00 PM",
        description:
          "Lorem Ipsum is simply dummy text of the printing and type.",
      },
    ],
  }),

  computed: {
    groupedItems() {
      const result = [];
      const groupSize = 3;
      for (let i = 0; i < this.items.length; i += groupSize) {
        result.push(this.items.slice(i, i + groupSize));
      }
      return result;
    },
  },
};
</script>
<style scoped>
.container {
  margin-top: -15%;
  margin-bottom: 30px;
}

.detail {
  margin-left: 2%;
  max-width: 1300px;
  padding: 70px;
}
.button {
  display: flex;
  justify-content: end;
  margin-top: -7px;
}
.free {
  font-size: 17px;
  width: 8%;
}
.card1 {
  border: 1px solid rgb(225, 216, 216);
  width: 100%;
}

.img1 {
  width: 100%;
  height: 45vh;
  object-fit: cover;
}
.v-carousel-item {
  padding: 50px;
}
.img {
  width: 100%;
  height: 45vh;
  object-fit: cover;
}
.info,
p {
  margin-top: -10px;
}
.agenda {
  border-radius: 7px 7px 2px 2px;
}
.agenda-page{
  width: 60%;
}
.organizer {
  width: 60%;
  border-radius: 7px;
}
.email,
.phone {
  margin-top: -20px;
}
.organizer h2 {
  color: red;
}
h1 {
  font-size: 35px;
  font-weight: bold;
  margin-bottom: 20px;
}

.detail p {
  font-size: 17px;
  line-height: 1.5;
  margin-bottom: 20px;
}

.scrollbar::-webkit-scrollbar {
  display: none;
}
</style>
