<template>
    <nav class="shadow-lg bg-white fixed top-0 w-full z-30 p-1">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3 pt-3 ms-6">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-2xl font-bold
                bg-gradient-to-r from-blue-400 via-blue-600 to-blue-700  text-transparent bg-clip-text"
                ><i class="fa-solid fa-table-columns"></i> Next Project </span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
    </nav>
</template>

<script>
export default {
    name: 'Navbar'
}
</script>