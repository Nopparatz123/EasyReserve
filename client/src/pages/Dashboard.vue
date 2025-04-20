<template>
    <div class="mt-10 mx-25">
        <div class="grid grid-cols-12">
            <div class="col-span-2">
                <Sidebar />
            </div>
            <div class="col-span-10 bg-neutral-100 p-5 rounded md:ms-9">      
                <div class=" bg-white shadow-sm w-full rounded">
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