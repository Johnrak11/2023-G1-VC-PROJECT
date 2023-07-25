<!-- referencse : https://fengyuanchen.github.io/vue-qrcode/ -->
<template>
    <v-dialog transition="dialog-top-transition" class="dialog-card" width="auto">
        <template v-slot:activator="{ props }">
            <v-btn color="primary" v-bind="props">
                <slot></slot>
            </v-btn>
        </template>
        <template v-slot:default="{ isActive }">
            <v-card style="border-radius: 15px;" class="img-download">
                <v-toolbar color="red" class="text-center bold"
                    :title="truncateDescription(eventInfor.name, 15)"></v-toolbar>
                <v-card-text>
                    <div class="text-p text-center">Scan to get attendent</div>
                    <figure class="qrcode">
                        <vue-qrcode value="https://github.com/fengyuanchen" tag="svg" :options="{
                            errorCorrectionLevel: 'Q',
                            width: 300,
                        }"></vue-qrcode>
                        <img class="qrcode__image" :src="logo" alt="Chen Fengyuan" style="border-radius: 50px;" />
                    </figure>
                    <div class="text-h6 bold text-center">Scan Me</div>
                </v-card-text>
            </v-card>
            <v-card-actions class="justify-end d-flex justify-center" style="gap: 20px;">
                <div class="text-center text-white" @click="downloadQRCode">
                    <v-btn color="white" icon="mdi-download" variant="tonal"></v-btn>
                    <div style="font-size: 14px;">Download</div>
                </div>
                <div class="text-center text-white" @click="isActive.value = false">
                    <v-btn color="white" icon="mdi-close" variant="tonal"></v-btn>
                    <div style="font-size: 14px;">Cancel</div>
                </div>
            </v-card-actions>
        </template>
    </v-dialog>
</template>

<script setup>
import { saveAs } from 'file-saver';
import domtoimage from 'dom-to-image';
import { eventCreateStores } from '@/stores/eventCreate.js'
const { truncateDescription } = eventCreateStores()
import { defineProps } from 'vue';
import logo from '@/assets/logo-only.png'
const props = defineProps({
    eventInfor: Object
})

function downloadQRCode() {
    let ticket_image = document.querySelector('.img-download');
    domtoimage.toBlob(ticket_image).then(function (blob) {
        saveAs(blob, `${props.eventInfor.name}.png`);
    });
}


</script>

<style scoped>
.qrcode {
    display: inline-block;
    font-size: 0;
    margin-bottom: 0;
    position: relative;
}

.qrcode__image {
    background-color: #fff;
    border: 0.25rem solid #fff;
    border-radius: 0.25rem;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.25);
    height: 15%;
    left: 50%;
    overflow: hidden;
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    width: 15%;
}

.dialog-card {
    backdrop-filter: blur(5px);
    /* Apply the blur effect to the dialog card background */
    background-color: rgba(136, 136, 136, 0.5);
    /* Adjust the color and opacity of the blurred background */
}
</style>