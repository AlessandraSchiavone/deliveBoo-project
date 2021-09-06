<template>
    <div class="main">
        <div class="jumbotron"></div>        
    </div>
</template>

<script>
export default {
    name: 'Home',
    data() {
        return {
            restaurants: [],
            cuisines: []
        }
    },
    methods: {
        getRestaurants() {
            axios
                .get('http://127.0.0.1:8000/api/restaurant')
                .then(
                    res => {
                        console.log(res.data);
                        this.restaurants = res.data;
                    }
                )
                .catch(
                        err => {
                            console.log(err);
                        }
                    );
        },
        getCuisines() {
            axios
                .get('http://127.0.0.1:8000/api/cuisine')
                .then(
                    res => {
                        console.log(res.data);
                        this.cuisines = res.data;
                    }
                )
                .catch(
                        err => {
                            console.log(err);
                        }
                    );
        }
    },
    created() {
        this.getRestaurants();
        this.getCuisines();
    }
}
</script>

<style lang="scss" scoped>
    .jumbotron {
        
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.425), rgba(0, 0, 0, 0)), url('../assets/jumbotron.png');
        height: 650px;
        background-size: cover;
        border-radius: 0;
        margin: 0;
    }
</style>