import { defineStore } from "pinia";
import baseAPI from "./axiosHandle.js";

export const userRoleStore = defineStore("userEdit", {
  state: () => ({
    userId: "",
    users: [],
  }),
  actions: {
    async getUserId(userId) {
      try {
        const response = await baseAPI.get(`/userRole/${userId}`);
        this.users = response.data.data;
        console.log(response.data.data);
      } catch (error) {
        console.log(error);
      }
    },
    async updateRoleUser(role,userId) {
      console.log(role,userId)
      try {
        const response = await baseAPI.put(`/users/update/${userId}`, {role});
        console.log(response);
      } catch (error) {
        console.log(error);
      }
    },
  },
});