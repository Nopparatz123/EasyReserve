<template>
    <div class="flex justify-center items-center h-100 mt-30">
        <div class="bg-white shadow-lg px-18 p-10 rounded-2xl">
            <h1 class="text-center font-bold text-2xl text-blue-500">Welcome!</h1>
            <p class="text-center text-sm">Please, log in to your account below.</p>

            <div class="mt-10">
                <div class="mb-4">
                    <label for="helper-text" class="block mb-1 text-sm  text-black">Email address</label>
                    <input type="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-96 p-2.5" placeholder="Enter email">
                </div>

                <div class="mb-4">
                    <label for="helper-text" class="block mb-1 text-sm  text-black">Password :</label>
                    <input type="password" class="bg-gray-50 border border-gray-300 mb-1 text-gray-900 text-sm rounded-lg block w-96 p-2.5" placeholder="Enter password">
                </div>

                <div class="mb-4 text-center">
                    <button class="bg-blue-500 text-white w-full btn-rounded p-1 mb-2">เข้าสู่ระบบ</button>
                    <p class="inline text-sm">คุณยังไม่มีบัญชีใช่ไหม </p>
                    <router-link to="/register" class="inline text-blue-600 underline font-bold text-sm">สมัครสมาชิก</router-link>
                </div>

                <div class="flex gap-4 justify-center">
                    <img src="../assets/image/facebook.png" width="30" alt="">
                    <img src="../assets/image/google.png" width="30" alt="">
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Login'
}
</script>


<style>
    .btn-rounded{
        border-radius: 10px;
    }
</style>