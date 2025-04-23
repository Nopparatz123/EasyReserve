<template>
    <nav class="shadow-xs fixed top-0 left-0 bg-white w-full z-50">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3 pt-3">
            <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span
                    class="text-2xl font-bold bg-gradient-to-r from-blue-400 via-blue-600 to-blue-700  text-transparent bg-clip-text">Easy.com</span>
            </a>

            <ul class="hidden w-full md:flex md:gap-5 md:w-auto">
                <li class="text-gray-600 hover:text-blue-500 transition">
                    <router-link to="/" exact-active-class="text-blue-500 border-b-2 border-b-blue-600">
                        Home
                    </router-link>
                </li>

                <li class="text-gray-600 hover:text-blue-500 transition">
                    <router-link to="/booking"  exact-active-class="text-blue-500 border-b-2 border-b-blue-600">
                        Booking
                    </router-link>
                </li>

                <li class="text-gray-600 hover:text-blue-500 transition">
                    <router-link to="">
                        Features
                    </router-link>
                </li>

                <li class="text-gray-600 hover:text-blue-500 transition">
                    <router-link to="">
                        Contact
                    </router-link>
                </li>
            </ul>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <div v-if="!isLoggenIn">
                    <router-link to="/login"
                        class="text-xs transition bg-blue-500 hover:bg-blue-600 text-white px-3 p-2 rounded">เข้าสู่ระบบ</router-link>
                    <router-link to="/register"
                        class="text-xs transition bg-gray-500 hover:bg-gray-600 text-white px-3 p-2 rounded ms-2">สมัครสมาชิก</router-link>
                </div>
                <div v-else class="flex gap-2 items-center">
                    <h1 class="text-blue-500 font-bold">{{ username }}</h1> |
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="text-blue-500">
                            <i class="fa-solid fa-circle-user text-3xl"></i>
                        </div>
                        <ul tabindex="0" class="dropdown-content menu rounded-xl z-1 w-40 p-2 py-5 gap-4 shadow-sm bg-white left-0 -translate-x-20 translate-y-2 text-center">
                            <h1 class="text-black">Profile : {{ username }}</h1>
                            <router-link v-if="roleCheck" to="/admin">
                                Dashboard Admin
                            </router-link>
                            <button class="text-red-500 underline" @click="sendLogout" type="submit">ออกจากระบบ</button>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Header',
    data() {
        return {
            isLoggenIn: false,
            username: '',
            roleCheck: '',
        }
    },
    methods: {
        sendLogout() {
            if (confirm("คุณต้องการออกจากระบบ ใช่ไหม?")) {
                localStorage.removeItem('user_login'); //ลบประวัติการเข้าสู่ระบบ
                this.isLoggenIn = false;
                this.$router.push('/login')
            }
        }
    },
    created() {
        const loginUser = localStorage.getItem('user_login');
        if (loginUser) {
            this.isLoggenIn = true
            this.username = localStorage.getItem('username')
        }
        const role = localStorage.getItem('role');
        if(role === 'admin'){
            this.roleCheck = role;
        }
    }
}
</script>