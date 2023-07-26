<template>
  <div class="container">
    <v-row justify="center">
      <button-component-form @click="dialog = !dialog">Payment</button-component-form>
      <v-dialog v-model="dialog" width="40%">
        <v-card>
          <v-card-title>
            Payment
          </v-card-title>
          <form action="" class="ml-12">
            <v-text-field type="number" class="text-start" v-model="cardNumber" label="Number of credit card"
              :rules="[requiredRule, cardNumberRule]" maxlength="19"><img v-if="creditCardType"
                :src="creditCardType.message"></v-text-field>
            <v-text-field v-model="expirationCard" type="date" label="Expiration" :rules="[requiredRule, expirationRule]"
              maxlength="10"></v-text-field>
            <v-text-field v-model="cvvCard" type="number" label="CVV" :rules="[requiredRule, cvvRule]"
              maxlength="4"></v-text-field>
            <v-text-field v-model="nameCard" label="Name on Card" :rules="[requiredRule]" maxlength="50"></v-text-field>
            <v-card-actions>
              <button-component-form @click.prevent="saveData">Pay</button-component-form>
            </v-card-actions>
          </form>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>
<script setup>
import visaCard from "../../assets/credit_card/visa.png";
import masterCard from "../../assets/credit_card/mastercard.png";
import discover from "../../assets/credit_card/discover.png";
import americanCard from "../../assets/credit_card/american_express.png";
import { ref, computed, defineProps } from 'vue';
import ButtonComponentForm from '../buttons/ButtonComponentForm.vue';
import baseAPI from "@/stores/axiosHandle.js";
import { ticketStore } from "@/stores/ticketStore";
import { sweetAlert } from "@/stores/sweetAlert";
const { alertMessage } = sweetAlert()
const { createTicket } = ticketStore()
const cardNumber = ref();
const expirationCard = ref();
const cvvCard = ref();
const nameCard = ref();
const dialog = ref(false);
const creditCardTypeName = ref('');

const props = defineProps({
  eventId: {
    type: Number,
    required: true
  }
});

const creditCardTypes = [
  { type: 'visa', pattern: /^4[0-9]{12}(?:[0-9]{3})?$/, message: visaCard },
  { type: 'mastercard', pattern: /^5[1-5][0-9]{14}$/, message: masterCard },
  { type: 'amex', pattern: /^3[47][0-9]{13}$/, message: americanCard },
  { type: 'discover', pattern: /^6(?:011|5[0-9]{2})[0-9]{12}$/, message: discover }
];

const creditCardType = computed(() => {
  for (let i = 0; i < creditCardTypes.length; i++) {
    const { type, pattern, message } = creditCardTypes[i];
    if (pattern.test(cardNumber.value)) {
      defineType(type)
      return { type, message };
    }
  }
  return null;
});

function defineType(value) {
  creditCardTypeName.value = value
}
const cardNumberRule = v => {
  const cleanedValue = v ? v.replace(/\s/g, '') : '';
  for (let i = 0; i < creditCardTypes.length; i++) {
    const { pattern } = creditCardTypes[i];
    if (pattern.test(cleanedValue)) {
      return true;
    }
  }
  return 'Invalid card number';
};

const expirationRule = v => {
  const currentDate = new Date().toISOString().substr(0, 10);
  return (/^(\d{4})-(\d{2})-(\d{2})$/.test(v) && v >= currentDate) || 'Invalid expiration'
}
const cvvRule = v => /^\d{3,4}$/.test(v) || 'Invalid CVC'
const requiredRule = v => !!v || 'Field is required'

function validateExpirationDate(expirationDate) {
  const expiration = new Date(expirationDate);
  const currentDate = new Date();
  return expiration >= currentDate;
}


function paymentValidate() {
  let isValid = true;
  if (!creditCardTypeName.value) {
    isValid = false;
  }
  if (!expirationCard.value) {
    isValid = false;
  }
  if (!validateExpirationDate(expirationCard.value)) {
    isValid = false;
  }
  if (!cvvCard.value) {
    isValid = false;
  }
  if (String(cvvCard.value).length != 3 && String(cvvCard.value).length != 4) {
    console.log(String(cvvCard.value).length)
    isValid = false;
  }
  if (!nameCard.value) {
    isValid = false;
  }
  return isValid;
}

async function saveData() {
  const isPayValidate = paymentValidate()
  if (!isPayValidate) {
    return false
  }
  let creditCard = {
    'name': nameCard.value,
    'cvv': cvvCard.value,
    'number': cardNumber.value,
    'type': creditCardTypeName.value,
    'expiration': expirationCard.value,
  }
  await baseAPI.post('/booking/creditCard', creditCard).then((response) => {
    console.log(response.data)
    alertMessage('success', 'Payment Successfully')
  }).catch((error) => {
    console.log(error.response.data); // log the error message returned by the server
  });
  createTicket(props.eventId);

}


</script>
<style scoped>
img {
  width: 10%;
  margin-top: 0;
}
</style>