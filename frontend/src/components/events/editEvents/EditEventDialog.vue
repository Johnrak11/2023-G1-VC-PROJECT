<template>
  <v-row justify="end">
    <v-dialog v-model="dialog" fullscreen :scrim="false" transition="dialog-bottom-transition">
      <template v-slot:activator="{ props }">
        <v-btn color="" dark v-bind="props" style="width: 100%; margin-left: -5px;">
          <slot></slot>
        </v-btn>
      </template>
      <v-card>
        <v-toolbar dark color="red">
          <v-btn icon dark @click="dialog = false">
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>Edit Event</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>
        <v-list subheader>
          <v-card class="d-flex flex-column justify-center aling-center w-100">
            <v-card-text class="d-flex justify-center">
              <v-window v-model="tab" class="all-form-container rounded">
                <v-window-item value="one">
                  <detailEdit :eventId="props.eventId" ref="detailHandleSubmit"></detailEdit>
                </v-window-item>
                <v-window-item value="two">
                  <ticketEdit ref="eventHandleSubmit"></ticketEdit>
                </v-window-item>
              </v-window>
            </v-card-text>
            <div class="tab-container mb-5">
              <v-tabs v-model="tab" class="d-flex justify-space-between rounded" style="width: 60%;">
                <v-tab v-show="!isNext" @click="isNext = !isNext" value="one" width="10%">
                  <v-btn color="red ml-5">Preview</v-btn>
                </v-tab>
                <v-tab v-show="isNext" @click="checkDetail" style="margin-left: 89%;" :value="nextValue" width="10%">
                  <v-btn color="red">Next</v-btn>
                </v-tab>
                <v-tab value="two" v-show="!isNext" @click="submitUpdateEvent()" width="10%" style="margin-left: 76%;">
                  <v-btn color="red" :loading="eventCreate.isCreate">Update</v-btn>
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
import detailEdit from "./DetailEventEdit.vue";
import ticketEdit from "./TicketEventEdit.vue";
import { ref, defineProps } from "vue";
import { eventCreateStores } from "@/stores/eventCreate.js";

const eventCreate = eventCreateStores();

import { eventEditStores } from "@/stores/eventEdit.js";
const eventEdit = eventEditStores();
const dialog = ref(false);
const tab = ref("one");
const isNext = ref(true);
const nextValue = ref("one");
const detailHandleSubmit = ref();
const eventHandleSubmit = ref();
const isAlert = ref(false);

const props = defineProps({
  eventId: Number
})
console.log('props', props?.eventId)

function checkDetail() {
  detailHandleSubmit.value
    .submitHandler()
    .then((result) => {
      if (result) {
        tab.value = "two";
        isNext.value = false;
      } else {
        isAlert.value = true;
        delayedFunction(2000);
      }
    })
    .catch((error) => {
      console.log(error);
    });
}
function delayedFunction(delay) {
  setTimeout(() => {
    isAlert.value = false;
  }, delay);
}

function submitUpdateEvent() {
  eventHandleSubmit.value
    .ticketSubmit()
    .then((result) => {
      if (result) {
        eventEdit.editEvent();
        tab.value = "one";
        isNext.value = true;
        nextValue.value = "one";
        dialog.value = false;
      } else {
        isAlert.value = true;
        setTimeout(() => {
          isAlert.value = false;
        }, 2000);
      }
    })
    .catch((error) => {
      console.log(error);
    });
  console.log('yes');
}
</script>

<style>
.dialog-bottom-transition-enter-active,
.dialog-bottom-transition-leave-active {
  transition: transform 0.2s ease-in-out;
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

.btn-tab {
  border: none;
  background: none;
}
</style>