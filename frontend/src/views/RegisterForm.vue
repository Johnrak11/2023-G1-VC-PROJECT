<template>
  <div class="bigContainer mt-16">
    <div class="cardContainer bg-red mx-auto mt-16"></div>
    <div class="registerContainer d-flex">
      <div class="SwitchRegisterComponentFrom">
        <SwitchRegisterComponentFrom />
      </div>
      <div class="registerBody bg-white pt-8 pb-8 pl-8 pr-8 d-flex flex-column">
        <v-btn color="red" class="p-5 mt-5 ml-5">
          <v-img
            :width="25"
            aspect-ratio="16/9"
            cover
            :src="imageGoogle"
            class="mr-3"
          ></v-img>
          Register with google</v-btn
        >
        <div class="line d-flex mt-5">
          <hr class="hr mt-3 ml-5" />
          Or
          <hr class="hr mt-3" />
        </div>
        <!-- <SwitchRegisterComponentFrom /> -->
        <RegisterComponentForm />
        <ButtonComponentForm />
      </div>
      
    </div>
  </div>
</template>

<script setup>
import imageGoogle from "../assets/google.png";
import RegisterComponentForm from "../components/forms/RegisterComponentForm.vue";
import ButtonComponentForm from "../components/bottons/ButtonComponentForm.vue";
import SwitchRegisterComponentFrom from "../components/switchRegister/SwitchRegisterComponentFrom.vue";
</script>

<style>
.cardContainer {
  width: 90%;
  height: 50vh;
}
.v-btn,
.v-text-field {
  width: 90%;
}

hr {
  width: 43%;
  border: 1px solid black;
}
.registerBody {
  width: 44%;
  box-shadow: 5px 5px 10px rgb(86, 86, 86);
  margin-top: 2%;
  position: relative;
  left: 10%;
}

.registerContainer {
  position: relative;
  margin-top: -30%;
  left: 3%;
}
.SwitchRegisterComponentFrom{
  position: relative;
  left: 6%;
  margin-top: 12%;
}
</style>