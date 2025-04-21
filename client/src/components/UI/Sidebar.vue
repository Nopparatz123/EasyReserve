<template>
    <div class="fixed hidden md:block z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0 shadow-lg rounded-r-2xl bg-white">
      <div class="h-full py-7 shadow-md">
        <ul class="space-y-3 font-medium">
          <div class="flex ms-2 items-center mb-9">
            <img src="../../assets/image/Copilot-Logo-2023.png" class="w-15 ms-1" alt="">
            <h1 class="font-semibold text-2xl bg-gradient-to-r from-blue-400 via-blue-550 to-blue-400 text-transparent bg-clip-text">
                VUECOXY
            </h1>
          </div>

          <li>
            <a href="#" class="flex items-center p-2 text-black group transition hover:bg-gray-200">
              <i class="fa-solid fa-table-columns  ms-5"></i>
              <span class="ms-3">Dashboard</span>
            </a>
          </li>
  
          <li>
            <router-link to="/admin/accommodation"
              class="flex items-center p-2 group transition hover:bg-gray-200"
              exact-active-class="bg-gray-200 border-l-4 border-l-blue-700 text-blue-500">
              <i class="fa-solid fa-bed ms-5"></i>
              <span class="ms-3">จัดการที่พัก</span>
            </router-link>
          </li>
  
          <li>
            <router-link to="/admin/hotel"
              class="flex items-center p-2 group transition hover:bg-gray-200"
              exact-active-class="bg-gray-200 border-l-4 border-l-blue-700 text-blue-500">
              <i class="fa-solid fa-hotel ms-5"></i>
              <span class="ms-3">จัดการโรงแรม</span>
            </router-link>
          </li>
  
          <li>
            <router-link to="/admin/users"
              class="flex items-center p-2 group transition hover:bg-gray-200"
              exact-active-class="bg-gray-200 border-l-4 border-l-blue-700 text-blue-500">
              <i class="fa-solid fa-user ms-5"></i>
              <span class="ms-3">จัดการผู้ใช้งาน</span>
            </router-link>
          </li>
  
          <li>
            <router-link to="/admin/review"
              class="flex items-center p-2 group transition hover:bg-gray-200"
              exact-active-class="bg-gray-200 border-l-4 border-l-blue-700 text-blue-500">
              <i class="fa-solid fa-star  ms-5"></i>
              <span class="ms-3">รีวิว</span>
            </router-link>
          </li>
  
          <li>
            <router-link to="/admin/setting"
              class="flex items-center p-2 group transition hover:bg-gray-200"
              exact-active-class="bg-gray-200 border-l-4 border-l-blue-700 text-blue-500">
              <i class="fa-solid fa-gears  ms-5"></i>
              <span class="ms-3">ตั้งค่าระบบ</span>
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'Sidebar'
  }
  </script>
  