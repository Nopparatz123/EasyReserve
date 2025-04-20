<template>

    <div class="fixed bg-gray-00 z-40 w-60 h-full transition-transform -translate-x-full sm:translate-x-0 shadow-lg rounded-2xl">
        <div class="h-full px-10 py-4">
            <ul class="space-y-2 font-medium text-center">
                <h1 class="mb-10 font-bold text-2xl ">Adm!nVue</h1>
                <li>
                    <a href="#" class="flex items-center p-2  text-black group transition rounded-xl hover:bg-gray-200  hover:-translate-y-1">
                        <i class="bi bi-person-fill-lock"></i> <span class="ms-3">Dashboard</span>
                    </a>
                </li>

                <li>
                    <router-link to="/admin/accommodation" class="flex items-center p-2  text-black group transition rounded-xl hover:bg-gray-200  hover:-translate-y-1" exact-active-class="bg-gray-200">
                        <i class="bi bi-person-fill-lock"></i> <span class="ms-3">จัดการที่พัก</span>
                    </router-link>
                </li>

                
                <li>
                    <router-link to="/admin/hotel" class="flex items-center p-2  text-black group transition rounded-xl hover:bg-gray-200  hover:-translate-y-1" exact-active-class="bg-gray-200">
                        <i class="bi bi-person-fill-lock"></i> <span class="ms-3">จัดการโรงแรม</span>
                    </router-link>
                </li>

                 <li>
                    <router-link to="/admin/users" class="flex items-center p-2  text-black group transition rounded-xl hover:bg-gray-200  hover:-translate-y-1" exact-active-class="bg-gray-200">
                        <i class="bi bi-person-fill-lock"></i> <span class="ms-3">จัดการผู้ใช้งาน</span>
                    </router-link>
                </li>
                
                <li>
                    <router-link to="/admin/review" class="flex items-center p-2  text-black group transition rounded-xl hover:bg-gray-200  hover:-translate-y-1" exact-active-class="bg-gray-200">
                        <i class="bi bi-person-fill-lock"></i> <span class="ms-3">รีวิว</span>
                    </router-link>
                </li>

                <li>
                    <router-link to="/admin/setting" class="flex items-center p-2  text-black group transition rounded-xl hover:bg-gray-200  hover:-translate-y-1" exact-active-class="bg-gray-200">
                        <i class="bi bi-person-fill-lock"></i> <span class="ms-3">ตั้งค่าระบบ</span>
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