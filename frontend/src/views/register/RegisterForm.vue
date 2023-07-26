<template>
  <router-link to="/">
    <v-btn class="back-home" prepend-icon="mdi-arrow-left" variant="tonal">Back</v-btn>
  </router-link>
  <div class="bigContainer mt-16 ">
    <div class="cardContainer bg-red mx-auto mb-16"></div>
    <div class="registerContainer d-flex animate__animated pt-2 animate__fadeInRight">
      <div class="SwitchRegisterComponentFrom">
        <switchBannerForm>
          <h1 class="white--text">Don't you have an account?</h1>
          <span class="mt-5 white--text">Please, create register to get an account</span>
          <router-link to="/login"><v-btn class="w-50 mt-5">Login</v-btn></router-link>
        </switchBannerForm>
      </div>
      <div class="registerBody bg-white pt-2 pb-2 pl-2 pr-2 d-flex flex-column mt-15">
        <h1 class="ml-5">Register</h1>
        <googleFrom></googleFrom>
        <div class="line d-flex mt-5">
          <hr class="hr mt-3 ml-5" />
          Or
          <hr class="hr mt-3" />
        </div>
        <RegisterComponentForm />
      </div>
    </div>
  </div>
</template>

<script setup>
import googleFrom from "../../components/forms/GoogleForm.vue";
// import imageGoogle from "../../assets/google.png";
import RegisterComponentForm from "../../components/forms/RegisterComponentForm.vue";
// import ButtonComponentForm from "../../components/bottons/ButtonComponentForm.vue";
import switchBannerForm from "../../components/switchPath/switchLoginComponent.vue";
</script>

<style scoped>
.cardContainer {
  margin-top: 10%;
  width: 90%;
  height: 50vh;
  margin-top: 8%;
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
  margin-top: 3%;
  position: relative;
  left: 10%;
  margin-top: -2%;
}

.registerContainer {
  position: relative;
  margin-top: -39%;
  left: 3%;
}

.SwitchRegisterComponentFrom {
  position: relative;
  left: 6%;
  margin-top: 17%;
}

.back-home {
  width: 10%;
  position: absolute;
  bottom: 5%;
  left: 5%;
  z-index: 100;
}
</style>
