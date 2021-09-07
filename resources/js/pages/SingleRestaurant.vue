<template>
  <section v-if="JSON.stringify(restaurant) != '{}'">
      <div class="jumbotron">
          <img :src="restaurant.img" :alt="restaurant.name">
      </div>
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-2">
                x
            </div>
            <div class="box col-md-6 text-center py-5">
                    <h2>{{restaurant.name}}</h2>
                    <h5>
                        <span v-for="cuisine in restaurant.cuisines"
                        :key="cuisine.id">{{cuisine.name}}</span>
                    </h5>
                <h5>
                        <span v-for="n in restaurant.price_rating"
                        :key="n">&euro;</span>
                </h5>
                    <h6>{{restaurant.location}}</h6>
                    <div class="consegna">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-3">
                                <h5>Consegna</h5>
                            </div>
                            <div class="col-md-3">
                                <h6>{{ restaurant.price_shipping == 0 ? 'Gratis': `${restaurant.price_shipping} &euro;`}}</h6>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="box col-md-3">
                x</div>  
            </div>
        </div>
        

  </section>
  <section v-else>
      Caricamento
  </section>
</template>

<script>
export default {
    name: 'SingleRestaurant',
    data() {
        return {
            restaurant: null,
            dishes: [],
            categories: []
        }
    },
    created() {
        this.getRestaurant(this.$route.params.slug);
        // this.getCuisines();
    },
    methods: {
        getRestaurant(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/restaurant/${slug}`)
                .then(
                    res => {
                        console.log(res.data);
                        this.restaurant = res.data;
                        // console.log(restaurant);
                    }
                )
                .catch(
                        err => {
                            console.log(err);
                        }
                    );
        }
    }
}
</script>

<style scoped lang="scss">
    section {
        .jumbotron {
        height: 380px;
        background-size: cover;
        border-radius: 0;
        margin: 0;
        padding: 0;
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.425), rgba(0, 0, 0, 0));
        background-color: transparent;
         & img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            position: relative;
            filter:blur(1px);
         }
        }

        .box {
            background-color: white;
            border: 1px solid #e2e6e9;
            margin: -80px 10px auto;
            h2 {
                font-weight: bold;
            }
        }
    }
</style>