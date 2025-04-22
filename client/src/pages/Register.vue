<template>
    <div class="flex justify-center items-center h-100 mt-30">
        <div class="bg-white shadow-lg px-18 p-10 rounded-2xl">
            <h1 class="text-center font-bold text-2xl text-blue-500">Welcome!</h1>
            <p class="text-center text-sm">Please, l in to your account below.</p>

            <div class="mt-10">
                <form @submit.prevent="sendRegister">
                    <div class="mb-4">
                        <label for="helper-text" class="block mb-1 text-sm  text-black">Email address</label>
                        <input type="email" v-model="register.email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-96 p-2.5"
                            placeholder="Enter email">
                    </div>

                    <div class="mb-4">
                        <label for="helper-text" class="block mb-1 text-sm  text-black">Password :</label>
                        <input type="password"  v-model="register.password"
                            class="bg-gray-50 border border-gray-300 mb-1 text-gray-900 text-sm rounded-lg block w-96 p-2.5"
                            placeholder="Enter password">
                    </div>

                    <div class="mb-4"> 
                        <label for="helper-text" class="block mb-1 text-sm  text-black">Username :</label>
                        <input type="text" v-model="register.username"
                            class="bg-gray-50 border border-gray-300 mb-1 text-gray-900 text-sm rounded-lg block w-96 p-2.5"
                            placeholder="Enter Username">
                    </div>

                    <div class="mb-4 text-center">
                        <button class="bg-blue-500 text-white w-full btn-rounded p-1 mb-2" type="submit">สมัครสมาชิก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    name: 'Register',
    data() {
        return {
            register: {
                email: '',
                password: '',
                username: ''
            }
        }
    },
    methods: {
        async sendRegister() {
            try {
                const res = await axios.post('http://localhost/backend/Auth/auth.php', { //ur api sendRegister User
                    action: 'sendRegister',
                    email: this.register.email,
                    password: this.register.password,
                    username: this.register.username
                })
                console.log(res.data);
                this.register = {
                    email: '',
                    password: '',
                    username: ''
                }
                this.$router.push('/login');
            } catch (err) {
                console.log("เกิดข้อผิดพลาด", err)
            }
        }
    }
}
</script>