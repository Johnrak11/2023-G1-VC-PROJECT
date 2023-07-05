import { createRouter, createWebHistory } from 'vue-router'
import RegisterForm from '../views/RegisterForm.vue'

const routes = [
  {
    path: '/',
    name: 'register',
    component: RegisterForm
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
