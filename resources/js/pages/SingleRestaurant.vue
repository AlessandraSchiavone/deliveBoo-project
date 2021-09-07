<template>
  <section v-if="restaurant">
      <div class="jumbotron">
          <img :src="restaurant.img" :alt="restaurant.name">
      </div>
      <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-2">
                x
            </div>
            <div class="box col-md-6">
                <div class="box-top py-5 text-center">
                    <h2>{{restaurant.name}}</h2>
                    <h6>
                    <span v-for="cuisine in restaurant.cuisines"
                    :key="cuisine.id">{{cuisine.name}}  </span>
                    </h6>
                    <h6>
                    <span class="euro" v-for="n in restaurant.price_rating"
                    :key="n">&euro;</span>
                    </h6>
                    <h6>{{restaurant.location}}</h6>
                    <div class="consegna">
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-md-6">
                                <h5>Consegna</h5>
                            </div>
                            <div class="col-md-6">
                                <h6>{{ restaurant.price_shipping == 0 ? 'Gratis': `${restaurant.price_shipping} &euro;`}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-for="dish in restaurant.dishes"
                :key="dish.id" class="text-left p-4 menu-card">
                    <h5>{{dish.name}}</h5>
                    <p>{{dish.description}}</p>
                    <h6>{{dish.price}} €</h6>
                </div>
            </div>
            <div class="box col-md-3">
                <div class="box-top">x</div>
            </div>  
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
            categories: []
        }
    },
    created() {
        this.getRestaurant(this.$route.params.slug);
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
        background-image: linear-gradient(to bottom, rgba(255, 255, 255, 1.0), rgba(0, 0, 0, 0), rgba(0,0,0,0));
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
            .box-top {
                background-color: white;
                margin: -80px 10px 50px;
                border-radius: 4px;
                padding: 0;

                h2 {
                    font-weight: bold;
                }

                .euro {
                    color: #F36D00;
                    font-weight: bold;
                }
            }

            .menu-card {
                background-color: white;
                border: 1px solid #e2e6e9;
                margin: 0 10px 10px;
                h5 {
                    font-weight: bold;
                }
                h6 {
                    color: #4764CF;
                }
            }
        }

    



        .consegna {
            background-color: #F1F2F4;
            width: 60%;
            margin: auto;
            margin-top: 20px;
            box-shadow: 1px 2px 3px #e2e6e9;
            padding: 5px 2px;
            h5, h6 {
                margin: 0;
            }
            h5 {
                font-weight: bold;
            }
        }

    }

</style>