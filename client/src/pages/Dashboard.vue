<template>
    <div class="flex h-screen">
        <Sidebar />
      <div class="md:ml-[250px] md:w-full flex-1 overflow-hidden">
        <Navbar />
        <div class="bg-gray-200 p-7 min-h-screen">
          <div class="shadow-sm w-full bg-white rounded-2xl mt-15 p-3">
            <router-view />
          </div>
        </div>
      </div>
    </div>
  </template>
  

<script>
import Sidebar from '../components/UI/Sidebar.vue';
import Navbar from '../components/UI/Navbar.vue';
export default {
    components: {
        Sidebar,
        Navbar
    }
}
</script>

<style>
/* .content{
        background-color: var(--color-gray-200);
    } */
</style>