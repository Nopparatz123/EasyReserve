<template>
    <div class="flex justify-center items-center h-100 mt-30">
        <div class="bg-white shadow-lg px-18 p-10 rounded-2xl">
            <h1 class="text-center font-bold text-2xl text-blue-500">Welcome!</h1>
            <p class="text-center text-sm">Please, log in to your account below.</p>

            <div class="mt-10">
                <form @submit.prevent="sendLogin">
                    <div class="mb-4">
                        <label for="helper-text" class="block mb-1 text-sm  text-black">Email address</label>
                        <input type="email" v-model="dataLogin.email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-96 p-2.5"
                            placeholder="Enter email">
                    </div>

                    <div class="mb-4">
                        <label for="helper-text" class="block mb-1 text-sm  text-black">Password :</label>
                        <input type="password" v-model="dataLogin.password"
                            class="bg-gray-50 border border-gray-300 mb-1 text-gray-900 text-sm rounded-lg block w-96 p-2.5"
                            placeholder="Enter password">
                    </div>

                    <div class="mb-4 text-center">
                        <button class="bg-blue-500 text-white w-full btn-rounded p-1 mb-2" type="submit">เข้าสู่ระบบ</button>
                        <p v-if="errorMessage" class="text-red-500">{{ errorMessage }} !!</p>
                        <p class="inline text-sm">คุณยังไม่มีบัญชีใช่ไหม </p>
                        <router-link to="/register"
                            class="inline text-blue-600 underline font-bold text-sm">สมัครสมาชิก</router-link>
                    </div>
                </form>

                <div class="flex gap-4 justify-center">
                    <img src="../assets/image/facebook.png" width="30" alt="">
                    <img src="../assets/image/google.png" width="30" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Login',
    data() {
        return {
            dataLogin: {
                email: '',
                password: '',
            },
            errorMessage: '',
        }
    },
    methods: {
        async sendLogin(){
            try{
                const res = await axios.post('http://localhost/backend/Auth/auth.php',{ //url api sendLogin User
                    action: 'sendLogin',
                    email: this.dataLogin.email,
                    password: this.dataLogin.password,
                });
                if(res.data.message === 'success'){
                    localStorage.setItem('user_login', JSON.stringify(res.data.user_login))
                    localStorage.setItem('username', res.data.username)
                    localStorage.setItem('role', res.data.role)
                    this.$router.push('/');
                }else{
                    this.errorMessage = res.data.message;
                }
                console.log(res.data);
            }catch(err){
                console.error("เข้าสู่ระบบ เกิดข้อผิดพลาด", err)
            }
        }
    }
}
</script>


<style>
.btn-rounded {
    border-radius: 10px;
}
</style>