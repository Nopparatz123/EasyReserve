<template>
    <div class="grid md:grid-cols-3 grid-cols-1 gap-7 m-10">

        <div class=" bg-blue-500 hover:bg-blue-600 transition h-32 rounded-2xl shadow-md">
            <div class="relative text-center">
                <i
                    class="fa-solid fa-user absolute text-3xl transform -translate-x-1/2 -translate-y-1/2 text-white bg-blue-500 p-2 px-3 rounded-full border-2"></i>
            </div>
            <div class="overflow-hidden h-full">
                <div class="text-center mt-9">
                    <h1 class="font-bold text-white text-2xl md:text-xl lg:text-2xl mb-1">ยอดจองที่พักวันนี้</h1>
                    <p class="text-white text-xl">2 คน</p>
                    <div class="relative text-center over">
                        <i
                            class="fa-solid fa-user absolute text-9xl translate-x-45 -translate-y-27 md:translate-x-13 md:-translate-y-25 text-white opacity-15"></i>
                    </div>
                </div>
            </div>
        </div>


        <div class=" bg-emerald-500 hover:bg-emerald-600 transition h-32 rounded-2xl shadow-md">
            <div class="relative text-center">
                <i
                    class="fa-solid fa-money-bill-1 absolute text-3xl transform -translate-x-1/2 -translate-y-1/2 text-white bg-emerald-500 p-2 px-3 rounded-full border-2"></i>
            </div>
            <div class="overflow-hidden h-full">
                <div class="text-center mt-9">
                    <h1 class="font-bold text-white text-2xl md:text-xl lg:text-2xl mb-1">ยอดจองที่พักวันนี้</h1>
                    <p class="text-white text-xl">2 คน</p>
                    <div class="relative text-center over">
                        <i
                            class="fa-solid fa-money-bill-1 absolute text-9xl translate-x-45 -translate-y-27 md:translate-x-13 md:-translate-y-25 text-white opacity-15"></i>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
export default {
    name: 'ManageDashboard',
}
</script>