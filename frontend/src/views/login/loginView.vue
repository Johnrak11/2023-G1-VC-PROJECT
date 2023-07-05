<template>
    <div class="bigContainer mt-16 h-100">
        <div class="cardContainer bg-red mx-auto mt-16" :class="`elevation-${isHovering ? 30 : 10}`"></div>
        <div class="loginContainer d-flex">
            <div class="loginBody bg-white pt-8 pb-8 pl-8 pr-8 d-flex flex-column"
                :class="`elevation-${isHovering ? 24 : 20}`">
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
                <switchForm />
            </div>
        </div>
    </div>
</template>

<script setup>
import google from '../../assets/loginForm/Google__G__Logo.svg.png';
import loginFormComponent from '../../components/forms/loginFormComponent.vue';
import buttonComponent from '../../components/buttons/buttonComponent.vue';
import switchLoginCompont from '../../components/switchPath/switchLoginComponent.vue';
const imageGoogle = google
const loginForm = loginFormComponent;
const buttonSubmit = buttonComponent;
const switchForm = switchLoginCompont;
</script>

<style>
.cardContainer {
    width: 90%;
    height: 60vh;
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
    position: relative;
    bottom: 54%;
    height: 100vh;
}

.loginBody {
    width: 44%;
    margin-top: 10%;
    margin-left: 10px;
    position: relative;
    left: 10%;
    /* box-shadow: 10px 10px 10px black; */
}

.loginSwitchRegister {
    margin-top: 23%;
    position: relative;
    left: 15%;
}</style>