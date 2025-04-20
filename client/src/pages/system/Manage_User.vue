<template>
    <div class="p-3">
        <div class="flex mb-2 justify-between items-center">
            <h1 class=" font-bold text-1xl">จัดการผู้ใช้งาน</h1>
            <input type="text" class=" border-1 border-zinc-300 p-1 px-auto rounded-xl bg-gray-100"
                placeholder="ค้นหาผู้ใช้งาน...">
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs bg-gray-200 text-black ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Firstname
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Lastname
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody v-if="users">
                    <tr v-for="user in users" :key="user.id" class="bg-white  text-gray-600 hover:text-black hover:bg-gray-100 transition">
                        <th scope="row" class="px-6 py-4 font-medium">
                            {{user.id}}
                        </th>
                        <td class="px-6 py-4">
                            {{ user.username }}
                        </td>
                        <td class="px-6 py-4">
                            {{ user.email }}
                        </td>
                        <td class="px-6 py-4">
                            {{ user.password }}
                        </td>
                        <td class="px-6 py-4 text-right space-x-1">
                            <!-- sendDelete -->
                            <a href="#" class="font-medium transition bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-1 rounded-xl">
                                <i class="bi bi-pencil-square"></i> Edit</a>
                            <button @click="sendDelete(user.id)" class="font-medium transition bg-red-400 hover:bg-red-500 text-white px-4 py-1 rounded-xl">
                                <i class="bi bi-trash3-fill"></i> Delte
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
        }
    },
    methods: {
        async getUser(){
            const res = await axios.get('http://localhost/backend/Manager/HandleUser.php?table=users');
            this.users = res.data
            // console.log(res.data)
        },
        async sendDelete(id){
            if(confirm("คุณต้องการลบจริงๆใช่ไหม")){
                try{
                    const response = await axios.post('http://localhost/backend/Manager/HandleUser.php',{
                        action: 'deleteUser',
                        id: id,
                        table: 'users' 
                    });
                    this.getUser();
                    console.log(response.data);
                }catch(err){
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