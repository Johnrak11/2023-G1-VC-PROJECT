<template>
  <div class="container">
    <v-row justify="center">
      <button-component-form @click="dialog = !dialog">Payment</button-component-form>
      <v-dialog v-model="dialog" width="40%">
        <v-card>
          <v-card-title>
            Payment
          </v-card-title>
          <form action="" class="ml-12" @submit.prevent="saveData">
            <v-text-field type="number" class="text-start" v-model="cardNumber" label="Number of credit card"
              :rules="[requiredRule, cardNumberRule]" maxlength="19"><img v-if="creditCardType"
                :src="creditCardType.message"></v-text-field>
            <v-text-field v-model="expirationCard" type="date" label="Expiration" :rules="[requiredRule, expirationRule]"
              maxlength="10"></v-text-field>
            <v-text-field v-model="cvvCard" type="number" label="CVV" :rules="[requiredRule, cvvRule]"
              maxlength="4"></v-text-field>
            <v-text-field v-model="nameCard" label="Name on Card" :rules="[requiredRule]" maxlength="50"></v-text-field>
            <v-card-actions>
              <button-component-form @click="payment">Pay</button-component-form>
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
import router from "@/routes/router.js";
import Swal from 'sweetalert2';
import ticketStore from "@/stores/ticketStore";

const cardNumber = ref();
const expirationCard = ref();
const cvvCard = ref();
const nameCard = ref();
const dialog = ref(false);
const creditCardTypeName = ref('');
// ===create Ticket===
// const bookingDate = new Date();
// const formattedDate = bookingDate.toISOString().substring(0, 10);
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
  // Add more credit card types and patterns here if needed
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
// ===Find type of credit card===
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

// ===Save data to validate in db===
const userId = ref(1);

// function generateTicketCode() {
//   const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
//   let code = '';
//   for (let i = 0; i < 8; i++) {
//     code += chars.charAt(Math.floor(Math.random() * chars.length));
//   }
//   return code;
// }
// async function createTicket() {
//   let ticket = {
//     'ticket_code': generateTicketCode(),
//     'booking_date': formattedDate,
//     'is_check_in': '0',
//     'user_id': userId.value,
//     'event_id': parseInt(props.eventId)
//   }
//   console.log(ticket)
//   await baseAPI.post('/create/tickets', ticket).then((response) => {
//     console.log(response.data);
//   }).catch((error) => {
//     console.log(error)
//   });
// }
async function payment(){
  await saveData();
}
async function saveData() {
  let creditCard = {
    'name': nameCard.value,
    'cvv': cvvCard.value,
    'number': cardNumber.value,
    'type': creditCardTypeName.value,
    'expiration': expirationCard.value,
    'user_id': userId.value
  }
  // let payload ={
  //   userId: userId.value,
  //   eventId: props.eventId
  // }
  const createOneTicket = ticketStore();
  const ticket = await createOneTicket.createTicket(userId.value, props.eventId);
  await baseAPI.post('/booking/creditCard', creditCard).then((response) => {
    if (response.status === 200) {
      console.log(ticket)
      // ===References: https://sweetalert2.github.io/===
      Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: 'Your ticket has been paid!',
        showConfirmButton: false,
        timer: 1500
      })
    } else {
      Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Something was wrong!',
        showConfirmButton: false,
        timer: 1500
      })
    }
    router.push('/');
  }).catch((error) => {
    console.log(error.response.data); // log the error message returned by the server
  });
}
</script>
<style scoped>
img {
  width: 10%;
  margin-top: 0;
}
</style>