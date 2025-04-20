<template>
    <form @submit.prevent="sendInsertHotel">
        <input type="text" v-model="hotel.name" placeholder="ชื่อโรงแรม">
        <input type="text" v-model="hotel.description" placeholder="คำอธิบาย">
        <input type="text" v-model="hotel.location" placeholder="ที่อยู่">
        <input type="text" v-model="hotel.phone" placeholder="เบอร์">
        <button type="submit">letgo</button>
        <!-- <input type="file" v-model="hotel.image" placeholder="รูปภาพ"> -->
    </form>

    <div v-for="hotel in datahotel" :key="hotel.id">
        <h1>{{ hotel.name }} {{ hotel.description }} {{ hotel.phone }} {{ hotel.location }} <button @click="deleteHotel(hotel.id)">ลบ</button></h1>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'ManageHotel',
    data() {
        return {
            hotel: {
                name: '',
                description: '',
                location: '',
                phone: '',
            },
            datahotel: []
        }
    },
    methods: {
        async getHotel() {
            const res = await axios.get('http://localhost/backend/Manager/HandleHotel.php?table=hotels');
            this.datahotel = res.data;
            console.log(res.data)
        },
        async deleteHotel(id){
            try{
                const res = await axios.post('http://localhost/backend/Manager/HandleHotel.php',{
                    action: 'deleteHotel',
                    id: id,
                    table: 'hotels',
                });
                console.log(res.data);
                this.getHotel();
            }catch(err){
                console.error("die", err)
            }
        },
        async sendInsertHotel() {
            try {
                const res = await axios.post('http://localhost/backend/Manager/HandleHotel.php', {
                    action: 'insertHotel',
                    table: 'hotels',
                    name: this.hotel.name,
                    description: this.hotel.description,
                    location: this.hotel.location,
                    phone: this.hotel.phone,
                });
                console.log(res.data)
                this.getHotel();

                this.hotel = {
                    name: '',
                    description: '',
                    location: '',
                    phone: ''
                };
            } catch (err) {
                console.error("die", err)
            }
        }
    },
    mounted() {
        this.getHotel();
    }
}
</script>