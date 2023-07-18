<template>
    <v-row justify="center">
        <v-dialog v-model="dialog" fullscreen :scrim="false" transition="dialog-bottom-transition">
            <template v-slot:activator="{ props }">
                <v-btn color="red" dark v-bind="props" style="width: 30%">
                    <slot></slot>
                </v-btn>
            </template>
            <v-card>
                <v-toolbar dark color="red">
                    <v-btn  icon dark @click="dialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Create Event</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items>
                        <v-btn v-if="!isNext" variant="text" @click="dialog = false">
                            Save
                        </v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <v-list subheader>
                    <v-card class="d-flex flex-column justify-center aling-center w-100">
                        <v-card-text class="d-flex justify-center">
                            <v-window v-model="tab" class="all-form-container rounded">
                                <v-window-item value="one">
                                    <detailCreate ref="detailHandleSubmit"></detailCreate>
                                </v-window-item>
                                <v-window-item value="two">
                                    <ticketCreate></ticketCreate>
                                </v-window-item>
                            </v-window>
                        </v-card-text>
                        <div class="tab-container mb-5">
                            <v-tabs v-model="tab" class="d-flex justify-center aling-center">
                                <v-tab v-show="!isNext" @click="isNext = !isNext" value="one" width="10%"><v-btn
                                        class="bg-red">Preview</v-btn></v-tab>
                                <v-tab v-show="isNext" @click="checkDetail" :value="nextValue" width="10%"><v-btn
                                        class="bg-red">Next</v-btn></v-tab>
                                <!-- <v-tab v-show="isNext" :value="nextValue" width="10%"><v-btn
                                        class="bg-red">Next</v-btn></v-tab> -->
                            </v-tabs>
                        </div>
                    </v-card>
                </v-list>
            </v-card>
        </v-dialog>
    </v-row>
</template>
<script setup>
import detailCreate from './DetailEventCretae.vue'
import ticketCreate from './TicketEventCretae.vue'
import { ref } from 'vue';
const dialog = ref(false)
const tab = ref('one')
const isNext = ref(true)
const nextValue = ref('one')
const detailHandleSubmit = ref()

function checkDetail() {
    detailHandleSubmit.value.submitHandler()
        .then(result => {
            if (result) {
                tab.value = 'two'
                isNext.value = false
            }
        })
        .catch(error => {
            console.log(error);
        });
}


</script>

<style>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
    transition: transform .2s ease-in-out;
}
</style>
<style>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
    transition: transform .2s ease-in-out;
}

.tab-container {
    display: flex;
    justify-content: center;
}

.all-form-container {
    width: 60%;
    background-color: rgb(228, 228, 228);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
</style>