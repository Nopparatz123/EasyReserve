<template>
    <Header v-if="disbleHeader" />
    <router-view class="pt-10" />
    <Footer v-if="disbleFooter" />
</template>


<script>
import Footer from './components/UI/Footer.vue';
import Header from './components/UI/Header.vue';

export default {
    components: {
        Header,
        Footer
    },
    computed: {
        disbleHeader() {
            const hiddenPaths = [
                '/login', '/register',  //user
                '/admin', '/admin/users', '/admin/hotel', '/admin/accommodation', '/admin/dashboard'     //admim
            ];
            return !hiddenPaths.includes(this.$route.path);
        },
        disbleFooter(){
            const footerHiddenPaths = [
                '/admin', '/booking'
            ];
            return !footerHiddenPaths.includes(this.$route.path);
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