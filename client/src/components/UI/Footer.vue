<template>
    <footer class="bg-white shadow-sm dark:bg-gray-900 mt-20">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <span class="text-2xl font-bold text-white">
                        Easy.com
                    </span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ Year }} <a
                    href="" class="hover:underline">Easy™</a>. All Rights Reserved.</span>
        </div>
    </footer>
</template>


<script>
export default {
    name: 'Footer',
    data() {
        return {
            Year: ''
        }
    },
    created(){
        const fullYear = new Date().getUTCFullYear();
        this.Year = fullYear;
    }
}
</script>