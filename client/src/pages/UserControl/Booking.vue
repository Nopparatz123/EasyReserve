<template>
    <div class="mt-10  px-10 md:mx-auto container">
        <div class="flex justify-between mb-10">
            <div class="px-3">
                <router-link to="" class="text-blue-500 me-1 text-sm">Home </router-link>>
                <router-link to="" class="ms-1 text-sm text-gray-600">
                    Booking
                </router-link>
            </div>
        </div>
        <div class="grid grid-cols-12 h-screen">
            <div class="bg-white row-span-1 hidden md:block col-span-2 ms-3">
                <div class="bg-white w-full max-w-xs">
                    <h1 class="font-bold text-2xl unde mb-4"><i class="fa-solid fa-filter"></i> Filter by </h1>

                    <!-- filter -->
                    <div class="flex justify-between items-center mb-1">
                        <p class="text-sm">Price</p>
                        <small class="text-gray-600">฿ <span>{{ filterPrice }}</span></small>
                    </div>
                    <input type="range" min="0" max="10000" value="50" v-model="filterPrice"
                        class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer mb-10">

                    <div>
                        <h1 class="font-bold text-xl mb-2">Stars</h1>
                        <div class="flex gap-1">
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-yellow-400"></i>
                            <i class="fa-solid fa-star text-gray-300"></i>
                            <i class="fa-solid fa-star text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-r-gray-300 border-r-2 hidden md:block "></div>

            <div class=" row-span-1 col-span-12 md:col-span-8 mx-auto container px-3 md:px-7 ms-0 md:ms-3">
                <h1 class="ms-1 text-2xl font-bold">Properties found</h1>

                <div v-if="dataRooms.length > 0">
                    <div class="bg-white shadow-md w-full flex flex-col md:flex-row mt-10" v-for="data in dataRooms"
                        :key="data.id">
                        <div class="w-full md:w-1/3  h-50 md:h-auto">
                            <img src="../../assets/image/hotel/579006448.jpg"
                                class="rounded-l-xl w-full h-full object-cover" alt="">
                        </div>
                        <div class="px-4 pt-1 relative">
                            <h1 class="font-bold mt-1 text-xl md:text-2xl">{{ data.room_name }}</h1>
                            <p class="text-gray-600 text-xs mb-2">{{ data.description }}</p>
                            <div class="space-x-1 mt-1">
                                <i class="fa-solid fa-star text-yellow-400" v-for="countStar in data.star"
                                    :key="countStar"></i>
                            </div>
                            <p class="mt-3 text-gray-500 inline text-sm">{{ data.country }} | {{ data.hotel_name }} </p>

                            <div class="flex gap-3 mb-4 mt-2">
                                <div
                                    class="bg-neutral-100 shadow-sm rounded-xl w-28 text-sm py-1 text-gray-600 text-center">
                                    2เตียง</div>
                                <div
                                    class="bg-neutral-100 shadow-sm rounded-xl w-28 text-sm py-1 text-gray-600 text-center">
                                    2เตียง</div>
                                <div
                                    class="bg-neutral-100 shadow-sm rounded-xl w-28 text-sm py-1 text-gray-600 text-center">
                                    2เตียง</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <h1 class="mt-2">‼️ข้อมูลยังโหลด รอแปปหนึ่ง....</h1>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: 'booking',
    data() {
        return {
            dataRooms: [],
            filterPrice: 1000,
        }
    },
    computed: {
        filterRangPrice() {
            return this.dataRooms.filter(room => Number(room.price) <= this.filterPrice);
        }
    },
    methods: {
        async getRooms() {
            try {
                const res = await axios.get('http://localhost/backend/Manager/HandleRooms.php?action=getRooms');
                this.dataRooms = res.data;
                console.log(res.data);
            } catch (err) {
                console.error("เกิดข้อผิดพลาด", err)
            }
        }
    },
    mounted() {
        this.getRooms();
    }
}
</script>