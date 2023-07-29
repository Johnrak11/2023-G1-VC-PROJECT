<template>
    <v-row justify="end">
        <v-dialog v-model="dialog" fullscreen :scrim="false" transition="dialog-bottom-transition">
            <template v-slot:activator="{ props }">
                <v-btn color="primary" dark v-bind="props" style="width: 25%">
                    <slot></slot>
                </v-btn>
            </template>
            <v-card>
                <v-toolbar dark color="red">
                    <v-btn icon dark @click="dialog = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                    <v-toolbar-title>Create Event</v-toolbar-title>
                    <v-spacer></v-spacer>
                </v-toolbar>
                <v-list subheader>
                    <v-card class="d-flex flex-column justify-center aling-center w-100">
                        <v-card-text class="d-flex justify-center">
                            <v-window v-model="tab" class="all-form-container rounded">
                                <v-window-item value="one">
                                    <detailCreate ref="detailHandleSubmit"></detailCreate>
                                </v-window-item>
                                <v-window-item value="two">
                                    <ticketCreate ref="eventHandleSubmit"></ticketCreate>
                                </v-window-item>
                            </v-window>
                        </v-card-text>
                        <div class="tab-container mb-5" style="width: 100%;">
                            <v-tabs v-model="tab" class="d-flex justify-space-between rounded" style="width: 60%;">
                                <v-tab v-show="!isNext" @click="isNext = !isNext" value="one" width="10%">
                                    <v-btn color="red ml-5">Preview</v-btn>
                                </v-tab>
                                <v-tab v-show="isNext" @click="checkDetail" style="margin-left: 89%;" :value="nextValue"
                                    width="10%">
                                    <v-btn color="red">Next</v-btn>
                                </v-tab>
                                <v-tab value="two" v-show="!isNext" @click="submitEvent" width="10%"
                                    style="margin-left: 76%;">
                                    <v-btn color="red" :loading="eventCreate.isCreate">Submit</v-btn>
                                </v-tab>
                            </v-tabs>
                        </div>
                    </v-card>
                </v-list>
            </v-card>
        </v-dialog>

        <v-dialog v-model="isAlert" persistent width="500px">
            <v-card>
                <v-alert density="compact" type="error" title="Please fill all required fields"
                    text="Make sure to fill in all the mandatory information before proceeding."></v-alert>
                <v-card-actions class="bg-white">
                    <v-btn variant="text" @click="isAlert = false" width="100%">
                        Agree
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</template>
<script setup>
import detailCreate from './DetailEventCreate.vue'
import ticketCreate from './TicketEventCreate.vue'
import { ref } from 'vue';
import { eventCreateStores } from '@/stores/eventCreate.js'
const eventCreate = eventCreateStores()
const dialog = ref(false);
const tab = ref("one");
const isNext = ref(true);
const nextValue = ref("one");

const detailHandleSubmit = ref()
const eventHandleSubmit = ref()
const isAlert = ref(false)

function checkDetail() {
    detailHandleSubmit.value.submitHandler()
        .then(result => {
            if (result) {
                tab.value = 'two'
                isNext.value = false
            } else {
                isAlert.value = true
                delayedFunction(2000)
            }
        })
        .catch(error => {
            console.log(error);
        });
}
function delayedFunction(delay) {
    setTimeout(() => {
        isAlert.value = false
    }, delay);
}

function submitEvent() {
    eventHandleSubmit.value.ticketSubmit()
        .then(result => {
            if (result) {
                eventCreate.createEvent()
                tab.value = "one";
                isNext.value = true;
                nextValue.value = "one";
                dialog.value = false;
            } else {
                isAlert.value = true
                delayedFunction(2000)
            }
        })
        .catch(error => {
            console.log(error);
        });
}


</script>


<style scoped>
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
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(70, 70, 70, 0.35) 0px 5px 10px;
}
</style>