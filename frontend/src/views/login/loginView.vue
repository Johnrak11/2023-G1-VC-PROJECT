<template>
    <div class="bigContainer mt-16 h-100">
        <div class="cardContainer bg-red mx-auto" :class="`elevation-${isHovering ? 30 : 10}`"></div>
        <div class="loginContainer d-flex">
            <div class="loginBody bg-white pt-8 pb-8 pl-8 pr-8 d-flex flex-column">
                <h1 class="ml-5">Login</h1>
                <v-btn color="red" class="mt-5 ml-5">
                    <v-img :width="25" aspect-ratio="16/9" cover :src=imageGoogle class="mr-5"></v-img>
                    <span>Login with google</span></v-btn>
                <div class="line d-flex mt-5">
                    <hr class="hr mt-3 ml-5">
                    Or
                    <hr class="hr mt-3">
                </div>
                <loginForm />
                <buttonSubmit />
            </div>
            <div class="loginSwitchRegister">
                <switchBannerForm>
                    <h1 class="white--text">Don't you have an account?</h1>
                    <span class="mt-5 white--text">Please, register to get an account</span>
                    <router-link to="/login"><v-btn class="w-50 mt-5">Register</v-btn></router-link>
                </switchBannerForm>
            </div>
        </div>
    </div>
</template>

<script setup>
import google from '../../assets/loginForm/Google__G__Logo.svg.png';
import loginFormComponent from '../../components/forms/loginFormComponent.vue';
import buttonComponent from '../../components/buttons/buttonComponent.vue';
import switchBannerForm from '../../components/switchPath/switchLoginComponent.vue';
const imageGoogle = google
const loginForm = loginFormComponent;
const buttonSubmit = buttonComponent;
</script>

<style>
.cardContainer {
    width: 90%;
    height: 60vh;
    position: relative;
    margin-top: 8%;
   

}

.v-btn,
.v-text-field {
    width: 90%;
}

hr {
    width: 43%;
    border: 1px solid rgb(141, 137, 137);
}

.loginContainer {
    width: 70%;
    position: absolute;
    top: 0;
    left: 7%;
}

.loginBody {
    width: 100%;
    margin-top: 8%;
    margin-left: 10px;
    position: relative;
    left: 8%;
    box-shadow: 5px 5px 10px rgb(112, 110, 110);
}

.loginSwitchRegister {
    margin-top: 22%;
    width: 100%;
    position: relative;
    left: 15%;
}
</style>