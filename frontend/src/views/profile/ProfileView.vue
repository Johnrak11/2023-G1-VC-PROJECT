<template>
    <div class="animate__animated animate__fadeInLeft">
        <div>
            <img src="https://t4.ftcdn.net/jpg/04/95/28/65/360_F_495286577_rpsT2Shmr6g81hOhGXALhxWOfx1vOQBa.jpg" alt=""
                style="width: 100%; height: 53vh;">
            <div class="d-flex justify-space-between">
                <div style="margin-top: -10%; margin-left: 10%;">
                    <div v-if="profiles.profiles.profile_picture != null">
                        <img :src="profiles.profiles.profile_picture" alt="" width="250"
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
                    <h1>{{ profiles.profiles.lastname }} {{ profiles.profiles.firstname }}</h1>
                    <h2>I'm a {{ profiles.profiles.role }}.</h2>
                    <p>{{ profiles.profiles.address }}</p>
                </div>
                <div class="right">
                    <h2>{{ t('account.about') }}</h2>
                    <div class="d-flex">
                        <v-icon>mdi-account</v-icon>
                        <p class="ml-5">{{ t('account.connections') }}</p>
                    </div>
                    <div class="d-flex mt-3">
                        <v-icon>mdi-account-supervisor-circle</v-icon>
                        <p v-if="profiles.profiles.phone_number != null" class="ml-5">See contact info: {{ profiles.profiles.phone_number }}</p>
                        <p v-else class="ml-5">{{ t('account.contact') }}: N/A</p>
                    </div>
                    <div class="d-flex mt-3">
                        <v-icon>mdi-email</v-icon>
                        <p class="ml-5">{{ profiles.profiles.email }}</p>
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
import { useI18n } from 'vue-i18n';
const { t } = useI18n();
const profiles = profileStore();
console.log(profiles);
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