// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyB3MiDXi9ze-NUTZoPNyYPtigQQ2KrbH2w",
  authDomain: "leda-app-391809.firebaseapp.com",
  projectId: "leda-app-391809",
  storageBucket: "leda-app-391809.appspot.com",
  messagingSenderId: "789674566579",
  appId: "1:789674566579:web:14f2836ae0c103e51961c6",
  measurementId: "G-V6GWD83SSS"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
getAnalytics(app);
import {getStorage} from "firebase/storage";
const storage = getStorage(app)
export {storage}