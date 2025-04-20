<template>
    <div class="mt-10 mx-25">
        <div class="grid grid-cols-12">
            <div class="col-span-2">
                <Sidebar />
            </div>
            <div class="col-span-10 bg-neutral-100 p-5 rounded">
                <div class="flex justify-between items-center mb-3">
                    <input type="text" placeholder="ค้นหา..." class="border border-gray-300 rounded px-3 py-1 w-1/3">
                    
                    <div class="flex items-center space-x-3">
                        <img src="../assets/image/malee.jpg" class="rounded-full border border-black" width="40">
                        <div class="text-end">
                            <h1 class="font-bold">Adm!n</h1>
                            <small class="text-blue-500 block">toon@gmail.com</small>
                        </div>
                    </div>
                </div>
                
                <div class=" bg-white shadow-sm  w-full rounded">
                    <router-view />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from '../components/UI/sidebar.vue';
export default {
    components: {
        Sidebar
    }
}
</script>

<style></style>