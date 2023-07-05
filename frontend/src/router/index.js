import { createRouter, createWebHistory } from 'vue-router'
// import RegisterForm from '../views/RegisterForm.vue'
import autoComplete from '../components/forms/autoComplete.vue'

const routes = [
  {
    path: '/',
    name: 'register',
    component: autoComplete
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
