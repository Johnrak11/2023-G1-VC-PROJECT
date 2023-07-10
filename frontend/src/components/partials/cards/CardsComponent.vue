<template>
    <v-card class="card rounded bg-grey-lighten-2 mt-10">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlL1F7iU9vtdCKg_4sckNgDcbQ_GrDsbKgxw&usqp=CAU"
            alt="" />
        <div class="pa-3">
            <div class="d-flex">
                <div class="d-flex">
                    <v-icon :color="liked ? 'red' : 'grey'" @click="liked = !liked">mdi-heart</v-icon>
                    <p>100</p>
                </div>
                <div class="d-flex ml-10">
                    <v-col cols="auto">
                        <v-dialog transition="dialog-bottom-transition" width="30%">
                            <template v-slot:activator="{ props }">
                                <div class="d-flex" style="margin-top: -25%">
                                    <v-icon icon="mdi-share" size="30" v-bind="props"></v-icon>
                                    <p>100</p>
                                </div>
                            </template>
                            <template v-slot:default="{ isActive }">
                                <v-card class="dialog d-flex w-100">
                                    <v-toolbar color="red" title="Share"></v-toolbar><br>
                                    <div class="d-flex justify-space-evenly">
                                        <ShareNetwork
                                            network="facebook"
                                            url="https://news.vuejs.org/issues/180"
                                            title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                                            description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                                            quote="The hot reload is so fast it\'s near instant. - Evan You"
                                            hashtags="vuejs,vite" class="social-share"
                                            >
                                            <v-icon left class="ml-2 color" size="50">mdi-facebook</v-icon>
                                            <p class="text-black">Facebook</p>
                                        </ShareNetwork>
                                        <ShareNetwork
                                            network="telegram"
                                            url="https://t4.ftcdn.net/jpg/05/62/99/31/360_F_562993122_e7pGkeY8yMfXJcRmclsoIjtOoVDDgIlh.jpg"
                                            title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                                            description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                                            quote="The hot reload is so fast it\'s near instant. - Evan You"
                                            hashtags="vuejs,vite" class="social-share"
                                            >
                                            <!-- <v-icon left class="ml-2 color" size="50">mdi-telegrams</v-icon> -->
                                            <img class="telegram" src="https://d1k5j68ob7clqb.cloudfront.net/processed/thumb/H9NtH33fWEr0n7Y4Ru.png" alt="" width="10px">
                                            <p class="text-black">Telegram</p>
                                        </ShareNetwork>
                                        <ShareNetwork
                                            network="linkedin"
                                            url="https://news.vuejs.org/issues/180"
                                            title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                                            description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                                            quote="The hot reload is so fast it\'s near instant. - Evan You"
                                            hashtags="vuejs,vite" class="social-share"
                                            >
                                            <v-icon left class="ml-2 color" size="50">mdi-linkedin</v-icon>
                                            <p class="text-black">Linkedin</p>
                                        </ShareNetwork>
                                        <ShareNetwork
                                            network="whatsapp"
                                            url="https://news.vuejs.org/issues/180"
                                            title="Say hi to Vite! A brand new, extremely fast development setup for Vue."
                                            description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
                                            quote="The hot reload is so fast it\'s near instant. - Evan You"
                                            hashtags="vuejs,vite" class="social-share"
                                            >
                                            <v-icon left class="ml-2 color" size="50">mdi-whatsapp</v-icon>
                                            <p class="text-black">Whatsapp</p>
                                        </ShareNetwork>
                                        
                                    </div><br>
                                    <div class="ml-5 link rounded mr-5 d-flex justify-space-between">
                                        <p>http://localhost:8080/</p>
                                        <v-icon class="pa-4 copy">mdi-attachment</v-icon>
                                    </div>
                                    <v-card-actions class="justify-center">
                                        <v-btn variant="text" @click="isActive.value = false">Close</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </template>
                        </v-dialog>
                    </v-col>
                </div>
            </div>
            <h4>VANNDA CONCERT</h4>
            <div class="d-flex">
                <v-icon> mdi-calendar</v-icon>
                <p class="ml-5">07 July 2023</p>
            </div>
            <div class="d-flex">
                <v-icon>mdi-map</v-icon>
                <p class="ml-5">Eon 2 sensok city</p>
            </div>
            <button class="bg-red pa-1 rounded d-flex align-end" id="booking">
                Booking
            </button>
        </div>
    </v-card>
</template>

<script>
export default {
    name: "App",
    data: () => ({
        liked: false,
    }),
};
</script>

<style scoped>
.card {
    width: 22%;
}

img {
    width: 100%;
}

#booking {
    margin-left: 75%;
}

.app img {
    width: 60%;
    display: flex;
    margin: auto;
    padding: 10px;
    border-radius: 50%;
    margin-left: -1%;
}

.app img:hover {
    background-color: rgb(205, 205, 205);
    cursor: pointer;
}

.app {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}

.dialog {
    margin: auto;
    width: 30%;
}

.social {
    width: 25%;
    padding: 5px;
}

.link {
    border: 1px solid black;
    padding: 10px;
}

.copy:hover {
    padding: 4;
    background-color: #adabab;
    border-radius: 50%;
    cursor: pointer;
}
.color:hover{
    color: red;
    cursor: pointer;
}
.social-share{
    text-decoration: none;
}

</style>