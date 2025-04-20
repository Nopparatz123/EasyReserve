import { createWebHistory, createRouter } from "vue-router";

import App from "../App.vue";
// users
import Login from '../pages/Login.vue';

// admin
import Dashboard from "../pages/Dashboard.vue";
import Manage_User from "../pages/system/Manage_User.vue";

const routes = [
   // users
   {
    path: "/",
    name: "app",
    component: App,
   },
   {
    path: "/login",
    name: "login",
    component: Login,
  },
  // admin
  {
    path: "/admin",
    name: "dashboard",
    component: Dashboard,
    children: [
      {
        path: "/manageusers",
        name: "manageusers",
        component: Manage_User,
      }
    ]
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;