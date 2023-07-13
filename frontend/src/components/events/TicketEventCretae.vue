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
            <v-switch v-model="modelFree" hide-details inset :label="`Tickets are free`"></v-switch>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Price*</h3>
                <v-text-field :disabled="modelFree" variant="outlined" label="Append inner"
                    append-inner-icon="mdi-currency-usd"></v-text-field>
            </div>
            <div class="input">
                <h3>Tickets available*</h3>
                <v-text-field variant="outlined" label="Append inner" append-inner-icon="mdi-currency-usd"></v-text-field>
            </div>
            <div class="input">
                <h3>Ticket per customer*</h3>
                <v-text-field variant="outlined" label="Append inner" append-inner-icon="mdi-currency-usd"></v-text-field>
            </div>
        </div>

        <div class="switch-container">
            <v-switch v-model="modelDiscount" hide-details inset :label="`I want to offer early bird discount`"></v-switch>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Discount*</h3>
                <v-text-field :disabled="modelDiscount" width="100%" variant="outlined" label="Append inner"
                    append-inner-icon="mdi-currency-usd"></v-text-field>
            </div>
            <div class="input">
                <h3>Price*</h3>
                <v-text-field :disabled="true" width="100%" variant="outlined" label="Append inner"
                    append-inner-icon="mdi-currency-usd"></v-text-field>
            </div>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Discount ends on*</h3>
                <Datepicker></Datepicker>
            </div>
            <div class="input">
                <h3>Time*</h3>
                <v-text-field label="Label Text" model-value="12:30:00" type="time" suffix="PST"></v-text-field>
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
import Datepicker from 'vue3-datepicker'

const modelDiscount = ref(false)
const modelFree = ref(false)
// const { handleSubmit } = useForm({
//     validationSchema: {
//         name(value) {
//             if (value?.length >= 2) return true

//             return 'Name needs to be at least 2 characters.'
//         },
//         phone(value) {
//             if (value?.length > 9 && /[0-9-]+/.test(value)) return true

//             return 'Phone number needs to be at least 9 digits.'
//         },
//         email(value) {
//             if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true

//             return 'Must be a valid e-mail.'
//         },
//         select(value) {
//             if (value) return true

//             return 'Select an item.'
//         },
//         checkbox(value) {
//             if (value === '1') return true

//             return 'Must be checked.'
//         },
//     },
// })
// const name = useField('name')
// const address = useField('address')
// const venue = useField('venue')
// const description = useField('description')


// const submit = handleSubmit(values => {
//     alert(JSON.stringify(values, null, 2))
// })
</script>

<style>
form {
    /* border : 1px solid black; */
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
</style>