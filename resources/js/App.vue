<template>
    <div>
        <Header />
        
        <main>
            <router-view></router-view>
        </main>

        <Footer />
    </div>
</template>

<script>
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
export default {
    name: 'App',
    components: {
        Header,
        Footer
    }
}
</script>

<style lang="scss">
    @import '../sass/front.scss';
    main{
        margin-top: 150px;
    }

  
    @import "https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css";

</style>