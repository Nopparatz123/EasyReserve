<template>
    <form @submit.prevent="sendInsertAc">
        <input type="text" v-model="Datas.room_name" placeholder="ชื่อห้อง">
        <select v-model.number="Datas.hotel_id">
            <option disabled>เลือกโรงแรม</option>
            <option v-for="hotel in datahotel" :key="hotel.id" :value="hotel.id">
                {{ hotel.name }}
            </option>
        </select>
        <input type="text" v-model="Datas.description" placeholder="รายละเอียด">
        <input type="text" v-model="Datas.price" placeholder="ราคา">
        <input type="nubmer" v-model="Datas.capacity" placeholder="จัดกัดคนพักกี่คน">
        <input type="text" v-model="Datas.beds" placeholder="จำนวนเตียง">
        <button type="submit">ส่ง</button>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    name: 'ManageAccommodation',
    data() {
        return {
            Datas: {
                room_name: '',
                hotel_id: null,
                description: '',
                price: '',
                capacity: '',
                beds: '',
            },
            data: [],
            datahotel: []
        }
    },

    methods: {
        async getHotel() {
            const res = await axios.get('http://localhost/backend/Manager/HandleHotel.php?table=hotels');
            this.datahotel = res.data;
            console.log(res.data)
        },
        async sendInsertAc() {
            try {
                const res = await axios.post('http://localhost/backend/Manager/HandleAccomodation.php', {
                    action: 'insertAc',
                    room_name: this.Datas.room_name,
                    hotel_id: this.Datas.hotel_id,
                    description: this.Datas.description,
                    price: this.Datas.price,
                    capacity: this.Datas.capacity,
                    beds: this.Datas.beds,
                });
                console.log(res.data);
            } catch (err) {
                console.error("die", err)
            }
        },
        async getDataAn() {
            const res = await axios.get('http://localhost/backend/Manager/HandleAccomodation.php?table=accommodations');
            this.data = res.data;
            console.log(res.data)
        }
    },
    mounted() {
        this.getDataAn();
        this.getHotel();
    },
}
</script>