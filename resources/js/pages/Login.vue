<template>
    <FormLogs>
        
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
  
      <Button @click="login">Log In</Button>

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
  import {useRouter} from 'vue-router'


  import {userStore} from '../store/userStore'
  const store =userStore();
  const router = useRouter();
  const errors = ref('');


  const notify = () => {
      toast.error("Enter valid Email or Password", {
        position: toast.POSITION.TOP_RIGHT,
        autoClose: 4000,
      });
    }
  const form = reactive({
    email: '',
    password: ''
  });
  
  const login = async () => {
  try {
    const response = await axios.post('/api/login', form);

    if (response.data.success) {
      store.setToken(response.data.data.token)
      router.push({ name: 'Dashboard' }); // Use quotes around 'Dashboard'
    } else {
      errors.value = response.data.message;
      notify();
    }
  } catch (error) {
    // Handle axios network or server errors here
    console.error(error);
    notify(); // You can notify the user about the error
  }
};

  </script>
  