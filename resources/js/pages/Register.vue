<template>
  <FormLogs>

    <InputField
      label="Your Name"
      type="text"
      v-model="form.name"
      ph="Enter Your name"
      id="name"
    />
    <InputField
      label="Your Email"
      type="email"
      v-model="form.email"
      ph="Enter Your email"
      id="email"
    />

    <InputField
      label="Your Password"
      type="password"
      v-model="form.password"
      ph="Enter Your Password"
      id="password"
    />
    <InputField
      label="Confirm Password"
      type="password"
      v-model="form.c_pass"
      ph="Confirm password"
      id="c_password"
    />

    <Button @click="register">Register</Button>
  </FormLogs>
</template>

<script setup>
import axios from 'axios';
import Button from "../components/Button.vue";
import FormLogs from "../components/FormLogs.vue";
import InputField from "../components/InputField.vue";
import { reactive, ref } from "vue";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import { useRouter } from 'vue-router'
import {userStore} from '../store/userStore'
const store =userStore();

const router = useRouter();
const errors = ref('');

const form = reactive({
  name: '',
  email: '',
  password: '',
  c_pass: ''
});

const register = async () => {
  try {
    const response = await axios.post('/api/register', form);

    if (response.data.success) {
      store.setToken(response.data.data.token)
      router.push({ name: 'Dashboard' }); 
    }
  } catch (error) {
    errors.value = error.response.data.message; // You can notify the user about the error
  }
};
</script>
