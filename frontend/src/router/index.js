import { createRouter, createWebHistory } from 'vue-router'
<<<<<<< HEAD
// import RegisterForm from '../views/RegisterForm.vue'
import autoComplete from '../components/forms/autoComplete.vue'
=======
<<<<<<< HEAD
import RegisterForm from '../views/RegisterForm.vue'
>>>>>>> c5fcd505dd2139ada2aab6c29b630b4a61075f91

const routes = [
  {
    path: '/',
    name: 'register',
    component: autoComplete
  },
=======

const routes = [
  // {
  //   path: '/',
  //   name: 'home',
  //   component: HomeView
  // },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  }
>>>>>>> login
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
