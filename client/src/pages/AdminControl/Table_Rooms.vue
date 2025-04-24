<template>
    <div class="p-3">
        <div class="flex mb-4 justify-between items-center">
            <h1 class=" font-bold text-2xl "><i class="fa-solid fa-list"></i> Rooms List</h1>
            <input type="checkbox" id="form-modal" class="modal-toggle" />
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
                            <i class="fa-solid fa-circle-user"></i> ROOM NAME
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-envelope"></i> ROOM NUMBER
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-envelope"></i> PRICE
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <i class="fa-solid fa-user-tie"></i> STATUS
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ON/OFF
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="data in Datarooms" :key="data.id"
                        class="bg-white  text-gray-600 hover:text-black hover:bg-gray-100 transition">
                        <th scope="row" class="px-6 py-4 font-medium">
                            {{ data.id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ data.room_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ data.room_number }}
                        </td>
                        <td class="px-6 py-4">
                            {{ data.price }} ฿
                        </td>
                        <td class="px-6 py-4">
                            <div v-if="data.status === 1"
                                class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-1 rounded-xl">
                                ใช้งานตามปกติ
                            </div>
                            <div v-else class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-1 rounded-xl">
                                ปิดใช้บริการชั่วคราว
                            </div>
                        </td>
                        <td class="px-6 py-4 space-x-1">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="checkbox" :checked="data.status === 1" @click="changeStatus(data.id, data.status)" class="sr-only peer">
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                            </label>
                        </td>

                        <td class="px-6 py-4 space-x-1">
                            <!-- sendDelete -->
                            <button @click="sendDeleteRooms(data.id)"
                                class="font-medium transition bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-xl">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'Rooms',
    data() {
        return {
            Datarooms: [],
        }
    },
    methods: {
        //ฟังชั่น ลบข้อมูลห้อง
        async sendDeleteRooms(id) {
            if (confirm("คุณต้องการลบจริงๆใช่ไหม")) {
                try {
                    const res = await axios.post('http://localhost/backend/Manager/HandleRooms.php', {
                        action: 'sendDeleteRooms',
                        table: 'rooms',
                        id: id
                    })
                    this.getRooms();
                } catch (err) {
                    console.error("error", err);
                }
            }
        },
        //ฟังชั่น เปลี่ยนStatus ห้อง
        async changeStatus(id, status){
            try{
                const newStatus = status === 1 ? 0 : 1;
                const res = await axios.post('http://localhost/backend/Manager/HandleRooms.php',{
                    action: 'changeStatus',
                    table: 'rooms',
                    id: id, 
                    status: newStatus,
                });
                this.getRooms();
                console.log(res.data);
            }catch(err){
                console.error("เกิดข้อผิดพลาดในการเปลี่ยน", err)
            }
        },
        // ดึงข้อมูลห้อง
        async getRooms() {
            try {
                const res = await axios.get('http://localhost/backend/Manager/HandleRooms.php?action=getRooms');
                this.Datarooms = res.data;
            } catch (err) {
                console.error("error", err);
            }
        }
    },
    mounted() {
        this.getRooms();
    }
}
</script>