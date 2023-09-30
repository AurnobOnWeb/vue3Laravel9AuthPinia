import { defineStore } from "pinia";

export const userStore = defineStore({
  id: 'userStoreId',
  state: () => ({
    token: localStorage.getItem('token') || 0,
  }),
  getters: {
    getToken: (state) => state.token,
  },
  actions: {
    setToken(token) {
      this.token = token;
      localStorage.setItem('token', token);
    },
    removeToken() {
      this.token = 0; // Set token to null when removing it
      localStorage.removeItem('token');
    },
  },
});
