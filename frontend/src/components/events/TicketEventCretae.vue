<template>
    <form class="w-60 d-flex flex-column aling-center justify-center border rounded pa-10" elevation="24"
        style="width: 100%;" ref="formRef">
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
                <v-text-field type="number" :disabled="modelFree" v-model="price" :rules="priceRules" label="price" required
                    variant="outlined" placeholder="Number of price" append-inner-icon="mdi-currency-usd"></v-text-field>
            </div>
            <div class="input">
                <h3>Tickets available*</h3>
                <v-text-field type="number" variant="outlined" v-model="ticketAvailable" :rules="ticketAvailableRules"
                    placeholder="Number of available" append-inner-icon="mdi-ticket"></v-text-field>
            </div>
            <div class="input">
                <h3>Ticket per customer*</h3>
                <v-text-field type="number" variant="outlined" v-model="restriction" :rules="restrictionRules"
                    placeholder="Ticket restriction" append-inner-icon="mdi-ticket"></v-text-field>
            </div>
        </div>

        <div class="switch-container">
            <v-switch v-model="modelDiscount" hide-details inset :label="`I don't want to offer early bird discount`"
                color="red"></v-switch>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Discount*</h3>
                <v-text-field :disabled="modelDiscount" v-model="discount" :rules="discountRules" type="number" width="100%"
                    variant="outlined" placeholder="Number of discount" append-inner-icon="mdi-sale"></v-text-field>
            </div>
            <div class="input">
                <h3>Price*</h3>
                <v-select :disabled="modelDiscount" v-model="discountItemsModel" :items="discountItems" readonly
                    label="Read-only" style="width:100%;"></v-select>
            </div>
        </div>
        <div class="input-row-container">
            <div class="input">
                <h3>Discount ends on*</h3>
                <VueDatePicker :disabled="modelDiscount" width="100%" class="custom-datepicke" v-model="dateDiscount"
                    :counter="7" :start-time="'12:00'" :max-date="maxDate" :min-date="dateDiscount" :preview-format="format"
                    ignore-time-validation placeholder="Select Date">
                </VueDatePicker>
            </div>
        </div>
        <div class="input-container mt-5">
            <h3>Please describe your ticket*</h3>
            <v-textarea v-model="ticketDescription" :rules="ticketDescriptionRules" variant="outlined" counter
                label="Description" maxlength="120" single-line style="width:100%;"></v-textarea>
        </div>
        <div class="input-row-container">
            <div class="input">
                <v-input prepend-icon="mdi-calendar-check">
                    Agenda
                </v-input>
            </div>
            <div class="btn-agenda">
                <v-btn color="red" @click="isHasAgenda = true" style="width:50%;">
                    <v-icon left>mdi-plus</v-icon>
                    Create Agenda
                </v-btn>
            </div>
        </div>
        <!-- ----- agenda ---- -->
        <v-table v-if="agendas.length !== 0" fixed-header class="boder table-color"
            :height="(agendas.length < 2) ? 'auto' : '200px'">
            <thead class="table-color">
                <tr>
                    <th class="text-left table-color">
                        DateTime
                    </th>
                    <th class="text-left table-color">
                        Title
                    </th>
                    <th class="text-left table-color">
                        Description
                    </th>
                </tr>
            </thead>
            <tbody class="table-color">
                <tr v-for="item in agendas" :key="item.agendaTitle">
                    <td>{{ item.agendaDate }}</td>
                    <td>{{ item.agendaTitle }}</td>
                    <td class="description-column">{{ eventCreate.truncateDescription(item.agendaDescription,40) }} </td>
                </tr>
            </tbody>
        </v-table>
        <v-btn class="me-4" @click="ticketSubmit">
            submit
        </v-btn>
    </form>
    <v-dialog v-model="isHasAgenda" width="auto">
        <v-sheet width="600px" class="mx-auto">
            <form @submit.prevent="agendaSubmit">
                <v-text-field v-model="agendaTitle.value.value" :counter="50"
                    :error-messages="agendaTitle.errorMessage.value" label="Title" width="100%"
                    style="width: 100%;"></v-text-field>

                <VueDatePicker width="100%" class="custom-datepicke" v-model="agendaDate" :counter="7" :start-time="'12:00'"
                    :max-date="maxDate" :min-date="agendaDate" :preview-format="format" ignore-time-validation
                    placeholder="Date disable">
                </VueDatePicker>

                <v-textarea class="mt-5" v-model="agendaDescription.value.value" :counter="200"
                    :error-messages="agendaDescription.errorMessage.value" name="input-7-1" variant="filled" label="Label"
                    auto-grow style="width: 100%;"></v-textarea>
                <div class="btn-agenda">
                    <v-btn color="red" type="submit" style="width: 30%;">
                        Add
                    </v-btn>
                </div>
            </form>
        </v-sheet>
    </v-dialog>
</template>


<script setup>
import { ref } from "vue";
import { eventCreateStores } from '@/stores/eventCreate.js'
const eventCreate = eventCreateStores()

const modelDiscount = ref(false)
const modelFree = ref(false)
const discountItems = ref([])
const discountItemsModel = ref('Percent(%)')
const isHasAgenda = ref(false)

const price = ref('')
const priceRules = ref([(v) => !!v || "Price is required"]);

const ticketAvailable = ref('');
const ticketAvailableRules = ref([(v) => !!v || "You must enter the number of available tickets."]);

const restriction = ref('');
const restrictionRules = ref([(v) => !!v || "You must enter the ticket restriction.'"]);

const discount = ref('');
const discountRules = ref([(v) => !!v || "You must enter the discount amount."]);

const dateDiscount = ref(new Date());
dateDiscount.value.setDate(dateDiscount.value.getDate() + 6);

const ticketDescription = ref('');
const ticketDescriptionRules = ref([(v) => !!v || "You must enter the ticket description.",
(v) => (v && v.length >= 5) || "Ticket description must be at least 5 characters"]
);


function ticketSubmit() {
    const isFormValid = validateForm();
    console.log(isFormValid)
    if (!isFormValid) {
        return;
    }
    let ticketPrice = 'free'
    if (!modelFree.value) {
        ticketPrice = price.value + '$'
    }

    let newTicket = {
        'available_ticket': ticketAvailable.value,
        'restriction': restriction.value,
        'description': ticketDescription.value,
        'price': ticketPrice
    }
    eventCreate.ticket = newTicket
    if (modelDiscount.value) {
        eventCreate.discount = {}
    } else {
        let newDiscount = {
            'percent': discount.value,
            'end_date': eventCreate.datebaseFormatDate(dateDiscount.value)
        }
        eventCreate.discount = newDiscount
    }
    if (agendas.value.length !== 0) {
        eventCreate.agendas = agendas.value
    }
    else {
        eventCreate.agendas = []
    }
    eventCreate.createEvent()

}

function validateForm() {
    let isValid = true;
    if (!price.value && !modelFree.value) {
        priceRules.value = [(v) => !!v || "Price is required"]
        return false
    }
    if (!ticketAvailable.value) {
        ticketAvailableRules.value = [(v) => !!v || "You must enter the number of available tickets."]
        return false
    }
    if (!restriction.value) {
        restrictionRules.value = [(v) => !!v || "You must enter the ticket restriction."]
        return false
    }
    if (!discount.value && !modelDiscount.value) {
        discountRules.value = [(v) => !!v || "You must enter the discount amount."]
        return false
    }
    if (!ticketDescription.value) {
        ticketDescriptionRules.value = [(v) => !!v || "You must enter the ticket description."]
        return false
    }
    return isValid;
}


// ------ agenda validate -------
const agendas = ref([])

import { useField, useForm } from 'vee-validate'
const { handleSubmit, handleReset } = useForm({
    validationSchema: {
        agendaTitle(value) {
            if (value?.length >= 2) return true
            return 'Title needs to be at least 2 characters.'
        },
        agendaDescription: (value) => {
            if (value?.length >= 5) return true;
            return 'Description needs to be at least 10 characters.'
        },
    }
})
const agendaTitle = useField('agendaTitle')
const agendaDescription = useField('agendaDescription')
const agendaDate = ref(new Date())
agendaDate.value.setDate(agendaDate.value.getDate() + 6)
const maxDate = ref(new Date())
maxDate.value.setMonth(maxDate.value.getMonth() + 1)
const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();

    return `Selected date is ${day}/${month}/${year}`;
}
const agendaSubmit = handleSubmit(values => {
    let newAgenda = values
    newAgenda['agendaDate'] = eventCreate.formatDate(agendaDate.value)
    agendas.value.push(newAgenda)
    handleReset()
    isHasAgenda.value = false
})

</script>

<style>
form {
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

.btn-agenda {
    display: flex;
    align-items: end;
    flex-direction: column;
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

.description-column {
    max-width: 200px;
    /* Adjust the width as needed */
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.table-color {
    background-color: rgb(235, 235, 235);
}
</style>