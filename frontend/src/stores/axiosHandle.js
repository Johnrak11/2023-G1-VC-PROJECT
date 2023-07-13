import axios from "axios";
import { cookieStore } from "./cookies";

const baseAPI = axios.create({
  baseURL: "http://127.0.0.1:8000/api",
});

baseAPI.interceptors.request.use((config) => {
  const { getCookie } = cookieStore();
  const token = getCookie("token"); // Replace 'token' with the actual cookie name
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  } else {
    console.log("something wrong...");
    // Do something... Usually logout user.
  }
  config.headers["Content-Type"] = "application/json";
  return config;
});

export default baseAPI;
