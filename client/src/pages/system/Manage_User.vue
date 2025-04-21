<template>
    <div class="p-3">
        <div class="flex mb-4 justify-between items-center">
            <h1 class=" font-bold text-2xl ">Manage User</h1>
            <label for="form-modal"
                class="transition bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl text-sm font-bold">
                <i class="fa-solid fa-user-plus"></i> Add New
            </label>
            <input type="checkbox" id="form-modal" class="modal-toggle" />
            <!-- modal -->
            <div class="modal">
                <div class="modal-box bg-white rounded-2xl shadow-md">
                    <h3 class="font-bold mb-7 text-2xl">เพิ่มข้อมูลผู้ใช้งาน</h3>
                    <form class="mt-4 space-y-4" @submit.prevent="sendInsertUsers">
                        <div class="grid grid-cols-2">
                            <div class="mb-1">
                                <label class="block text-gray-700 font-medium mb-2">Email :</label>
                                <input type="email" placeholder="Enter Email" v-model="dataUser.email" class=" px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-white" />
                            </div>

                            <div class="mb-1">
                                <label class="block text-gray-700 font-medium mb-2">Password :</label>
                                <input type="text" placeholder="Enter Password" v-model="dataUser.password" class=" px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-white" />
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Username :</label>
                            <input type="text" placeholder="Enter Username" v-model="dataUser.username" class="w-full px-4 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-white" />
                        </div>
                        <div class="modal-action">
                            <label for="form-modal"
                                class="transition bg-gray-500 hover:bg-gray-600 text-white px-5 py-2 rounded-xl text-sm font-bold">ยกเลิก</label>
                            <button type="submit"
                                class="transition bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-xl text-sm font-bold">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end MODAL -->
        </div>
        <hr class="mb-5 border-1 border-gray-300">
        <div class="relative overflow-x-auto rounded-t-2xl">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs uppercase tracking-wide bg-gray-200 text-black ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-fingerprint"></i> ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-circle-user"></i> Username
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-envelope"></i> Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-envelope"></i> Create_at
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-user-tie"></i> Role
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody v-if="users" class="">
                    <tr v-for="user in users" :key="user.id"
                        class="bg-white  text-gray-600 hover:text-black hover:bg-gray-100 transition">
                        <th scope="row" class="px-6 py-4 font-medium">
                            {{ user.id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ user.username }}
                        </td>
                        <td class="px-6 py-4">
                            {{ user.email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ user.created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ user.role }}
                        </td>
                        <td class="px-6 py-4 space-x-1">
                            <!-- sendDelete -->
                            <button @click="sendDelete(user.id)"
                                class="font-medium transition bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-xl">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>



                </tbody>
                <tbody v-else>
                    <h1 class="text-gray-500 text-xl m-2">ไม่มีข้อมูลจ้า..........</h1>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ManageUser',
    data() {
        return {
            users: [],
            dataUser: {
                email: '',
                password: '',
                username: ''
            }
        }
    },
    methods: {
        async sendInsertUsers(){
            try{
                const res = await axios.post('http://localhost/backend/Manager/HandleUser.php',{
                    action: 'insertUser',
                    email: this.dataUser.email,
                    password: this.dataUser.password,
                    username: this.dataUser.username,
                });
                console.log(res.data);
                this.getUser();

                this.dataUser = {
                    email: '',
                    password: '',
                    username: ''
                }
            }catch(err){
                console.error("error", err)
            }
        },
        async getUser() {
            const res = await axios.get('http://localhost/backend/Manager/HandleUser.php?table=users');
            this.users = res.data
            // console.log(res.data)
        },
        async sendDelete(id) {
            if (confirm("คุณต้องการลบจริงๆใช่ไหม")) {
                try {
                    const response = await axios.post('http://localhost/backend/Manager/HandleUser.php', {
                        action: 'deleteUser',
                        id: id,
                        table: 'users'
                    });
                    this.getUser();
                    console.log(response.data);
                } catch (err) {
                    console.error('error : ', err)
                }
            }
        }
    },
    mounted() {
        this.getUser();
    },
}
</script>