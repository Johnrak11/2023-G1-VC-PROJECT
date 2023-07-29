<template>
    <div style="margin-top: -45%;" class="animate__animated animate__fadeInLeft">
        <div v-for="profile of profiles.profiles" :key="profile.id">
            <img src="https://t4.ftcdn.net/jpg/04/95/28/65/360_F_495286577_rpsT2Shmr6g81hOhGXALhxWOfx1vOQBa.jpg" alt=""
                style="width: 100%; height: 55vh;">
            <div class="d-flex justify-space-between">
                <div style="margin-top: -10%; margin-left: 10%;">
                    <div v-if="profile.profile_picture != null">
                        <img :src="profile.profile_picture" alt="" width="250"
                            style="border-radius: 50%; border:5px solid white">
                    </div>
                    <div v-else>
                        <img src="https://ih1.redbubble.net/image.1046392278.3346/pp,840x830-pad,1000x1000,f8f8f8.jpg"
                            alt="" style="border-radius: 50%; border:5px solid white; width: 100%; height: 40vh;">
                    </div>
                </div>
                <div class="mt-10" style="margin-right: 5%;">
                    <v-icon size="40" class="mr-5">mdi-linkedin</v-icon>
                    <v-icon size="40">mdi-pencil</v-icon>
                </div>
            </div>
            <div class="d-flex justify-space-around">
                <div class="left">
                    <h1>{{ profile.lastname }} {{ profile.firstname }}</h1>
                    <h2>I'm a {{ profile.role }}.</h2>
                    <p>{{ profile.address }}</p>
                </div>
                <div class="right">
                    <h2>About</h2>
                    <div class="d-flex">
                        <v-icon>mdi-account</v-icon>
                        <p class="ml-5">See connection</p>
                    </div>
                    <div class="d-flex mt-3">
                        <v-icon>mdi-account-supervisor-circle</v-icon>
                        <p class="ml-5">See contact info: {{ profile.phone_number }}</p>
                    </div>
                    <div class="d-flex mt-3">
                        <v-icon>mdi-email</v-icon>
                        <p class="ml-5">{{ profile.email }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer-view style="margin-top: 10%;"></footer-view>
</template>
<script setup>
import { profileStore } from "@/stores/profileStore.js"
import { onMounted } from "vue";
const profiles = profileStore();
onMounted(() => {
    profiles.getDataUser();

});
</script>

<style scoped>
.left {
    flex: 1;
    margin-left: 12%;
}

.right {
    flex: 1;
}</style>