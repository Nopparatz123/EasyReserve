import { createWebHistory, createRouter } from "vue-router";

import App from "../App.vue";
// users
import Login from '../pages/Login.vue';

// admin
import Dashboard from "../pages/Dashboard.vue";
import Manage_User from "../pages/system/Manage_User.vue";
import Manage_Accommodation from "../pages/system/Manage_Accommodation.vue";
import Manage_Hotel from "../pages/system/Manage_Hotel.vue";

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
        path: "/admin/users",
        name: "manageusers",
        component: Manage_User,
      },
      {
        path: "/admin/accommodation",
        name: "manageaccommodation,",
        component: Manage_Accommodation,
      },
      {
        path: "/admin/hotel",
        name: "managehotel",
        component: Manage_Hotel,
      },
    ]
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;