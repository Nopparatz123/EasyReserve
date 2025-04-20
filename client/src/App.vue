<template>
    <Header v-if="disbleHeader" />
    <router-view />
</template>


<script>
import Header from './components/UI/Header.vue';
export default {
    components: {
        Header
    },
    computed: {
        disbleHeader() {
            const hiddenPaths = [
                '/login', '/register',  //user
                '/admin', '/admin/users', '/admin/hotel', '/admin/accommodation',     //admim
            ];
            return !hiddenPaths.includes(this.$route.path);
        }
    }
}
</script>

<style>
/* colormain
        - orange-400
    
    */

.main-ladingpage {
    background-color: var(--color-sky-200);
    padding-bottom: 300px;
}

.title-ladingpage {
    margin-top: 100px;
}
</style>