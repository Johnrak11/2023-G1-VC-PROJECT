<template>
  <div>
    <v-row justify="center">
      <button-component-form @click="dialog = !dialog" class="mr-10">Payment</button-component-form>
      <v-dialog v-model="dialog" width="40%">
        <v-card>
          <v-card-title>
            Payment
          </v-card-title>
          <form action="" class="ml-12">
            <v-text-field v-model="cardNumber" label="Card Number" :rules="[requiredRule, cardNumberRule]"
              maxlength="19"></v-text-field>
              <v-text-field v-model="expiration" type="date" label="Expiration" :rules="[requiredRule, expirationRule]"
              maxlength="10"></v-text-field>
            <v-text-field v-model="cvc" label="CVC" :rules="[requiredRule, cvcRule]" maxlength="4"></v-text-field>
            <v-text-field v-model="nameCard" label="Name on Card" :rules="[requiredRule]" maxlength="50"></v-text-field>
          </form>
          <v-card-actions>
            <router-link to="/"><v-btn color="primary" variant="text" @click="dialog = false">
              Pay
            </v-btn></router-link>
          </v-card-actions>
        </v-card>
      </v-dialog>
    </v-row>
  </div>
</template>
<script setup>
import { ref } from 'vue';
import ButtonComponentForm from '../bottons/ButtonComponentForm.vue';
const dialog = ref(false);
const cardNumber = ref();
const expiration = ref();
const cvc = ref();
const nameCard= ref();
const cardNumberRule = v => /^\d{4}\s\d{4}\s\d{4}\s\d{4}$/.test(v) || 'Invalid card number'
const expirationRule = v => {
  const currentDate = new Date().toISOString().substr(0, 10);
  return (/^(\d{4})-(\d{2})-(\d{2})$/.test(v) && v >= currentDate) || 'Invalid expiration'
}
const cvcRule = v => /^\d{3,4}$/.test(v) || 'Invalid CVC'
const requiredRule = v => !!v || 'Field is required'

</script>