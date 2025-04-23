import { createWebHistory, createRouter } from "vue-router";

import App from "../App.vue";
// import page users
import Login from '../pages/Login.vue';
import Register from '../pages/Register.vue';
import Home from "../pages/Home.vue";
import Booking from "../pages/UserControl/Booking.vue";

// import page admin
import Dashboard from "../pages/Dashboard.vue";
import Manage_User from "../pages/AdminControl/Manage_User.vue";
import Manage_Accommodation from "../pages/AdminControl/Manage_Accommodation.vue";
import Manage_Hotel from "../pages/AdminControl/Manage_Hotel.vue";
import Manage_Dashboard from "../pages/AdminControl/Manage_Dashboard.vue";

const routes = [
   // routes users
   {
    path: "/",
    name: "home",
    component: Home,
    meta: { requiresAuth: true },
   },
   {
    path: "/booking",
    name: "booking",
    component: Booking,
    meta: { requiresAuth: true },
   },
   {
    path: "/login",
    name: "login",
    component: Login,
    meta: { disLogin: true },
  },
  {
    path: "/register",
    name: "register",
    component: Register,
  },
  // routes admin
  {
    path: "/admin",
    name: "dashboard",
    component: Dashboard,
    meta: { requiresAuth: true },
    meta: { requiresAdmin: true },
    children: [
      {
        path: "/admin/dashboard",
        name: "managedashboard",
        component: Manage_Dashboard,
      },
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

router.beforeEach((to, from, next) => {
  const isLoggedIn = localStorage.getItem('user_login'); //ดึงข้อมูล User_login ที่เข้าสู่ระบบมา ลงตัวแปร isloggenin
  const userRole = localStorage.getItem('role'); //ดึงข้อมูล role ที่เข้าสู่ระบบมา ลงตัวแปร userRole
  
  if (to.meta.requiresAuth && !isLoggedIn) { //ถ้าไม่ได้เข้าล็อกอิน จะบินไปหน้าloginทันที
    next({ name: 'login' }); 
  } else if(to.meta.requiresAdmin && userRole === 'user'){ //ถ้าroleเป็นuser จะถูกป้องกันไม่ให้ไปหน้าAdmin
    next({ name : '/' })
  }else if(to.meta.disLogin && isLoggedIn){ //ถ้าเข้าสู่ระบบแล้ว จะไปหน้า loginไม่ได้
      next({ name: '/'})
  }else{
    next();
  }

});


export default router;