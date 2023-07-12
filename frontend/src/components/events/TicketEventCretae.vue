<template>
    <form @submit.prevent="submit" class="w-60 d-flex flex-column aling-center justify-center border rounded pa-10"
        elevation="24" style="width: 100%;">
        <v-input prepend-icon="mdi-ticket">
            Ticket
        </v-input>
        <div class="input-container">
            <h3>Let's create tickets!</h3>
            <v-label>Create tickets for your event by clicking on the 'Add Tickets' button below.</v-label>
        </div>
        <div class="switch-container">
            <v-switch v-model="modelFree" hide-details inset :label="`Tickets are free?`" color="red"></v-switch>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Price*</h3>
                <v-text-field :disabled="modelFree" variant="outlined" placeholder="Number of price"
                    append-inner-icon="mdi-currency-usd"></v-text-field>
            </div>
            <div class="input">
                <h3>Tickets available*</h3>
                <v-text-field variant="outlined" placeholder="Number of available"
                    append-inner-icon="mdi-ticket"></v-text-field>
            </div>
            <div class="input">
                <h3>Ticket per customer*</h3>
                <v-text-field variant="outlined" placeholder="Ticket restriction"
                    append-inner-icon="mdi-ticket"></v-text-field>
            </div>
        </div>

        <div class="switch-container">
            <v-switch v-model="modelDiscount" hide-details inset :label="`I don't want to offer early bird discount`" color="red"></v-switch>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Discount*</h3>
                <v-text-field :disabled="modelDiscount" type="number" width="100%" variant="outlined" placeholder="Number of discount"
                    append-inner-icon="mdi-sale"></v-text-field>
            </div>
            <div class="input">
                <h3>Price*</h3>
                <v-select :disabled="modelDiscount" v-model="discountItemsModel" :items="discountItems" readonly label="Read-only" style="width:100%;"></v-select>
            </div>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Discount ends on*</h3>
                <Datepicker :disabled="modelDiscount" v-model="picked" class="date-container-two" append-inner-icon="mdi-calendar"></Datepicker>
            </div>
            <div class="input">
                <h3>Time*</h3>
                <v-text-field :disabled="modelDiscount" variant="outlined" model-value="12:30:00" type="time"
                    suffix="PST" style="width:100%;"></v-text-field>
            </div>
        </div>
        <div class="input-container">
            <h3>Please describe your ticket*</h3>
            <v-textarea v-model="title" variant="outlined" counter label="Description" maxlength="120" single-line
                style="width:100%;"></v-textarea>
        </div>
    </form>
</template>


<script setup>
import { ref } from "vue";
// import Datepicker from 'vue3-datepicker'

const modelDiscount = ref(false)
const modelFree = ref(false)
const picked = ref(new Date())
const discountItems = ref(['Foo', 'Bar', 'Fizz', 'Buzz'])
const discountItemsModel = ref('Percent(%)')
</script>

<style>
form {
    border: 1px solid black;
    padding: 20px;
}

.input-container {
    display: flex;
    flex-direction: column;
    gap: 5px;

}

.input {
    display: flex;
    flex-direction: column;
    gap: 5px;
    flex: 1;
}

.switch-container {
    display: flex;
    justify-content: center;
    align-items: center;
}

.input-row-container {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;

}

.date-container-two {
    width: 90%;
    color: rgb(91, 91, 91);
    padding: 18px;
    border: 1px solid rgb(116, 116, 116);
    border-radius: 5px;
}
</style>