<template>
  <section v-if="restaurant">
      <div class="jumbotron">
          <img :src="restaurant.img" :alt="restaurant.name">
      </div>
      <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-2">
                <ul>
                    <li v-for="category in filteredCategories" :key="`category-${category.id}`">
                        <a :href="`#category-${category.id}`">{{category.name}}</a>
                    </li>
                </ul>
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
                <div v-for="category in filteredCategories" :key="`category-${category.id}`" :id="`category-${category.id}`">
                    <h3>{{category.name}}</h3>
                    <div v-for="dish in restaurant.dishes"
                    :key="`dish-${dish.id}`" class="text-left p-4 menu-card hover"
                    v-show="dish.category_id==category.id" @click="showPopup(dish)">
                        <h5>{{dish.name}}</h5>
                        <p>{{dish.description}}</p>
                        <h6>{{(dish.price).toFixed(2)}} &euro;</h6>
                    </div>
                </div>
            </div>
            <!-- scheda popup-->
            <div class="popup d-flex justify-content-center align-items-center" v-if="popup">
                <div class="popup-item menu-card">
                    <h4>{{ singleDish.name }}</h4>
                    <span>{{ singleDish.description }}</span>
                    <div class="quantity">
                        <i class="fas fa-minus-circle" @click="minusOne"></i>
                        {{ quantity }}
                        <i class="fas fa-plus-circle" @click="plusOne"></i>
                    </div>
                    <h6>
                        Prezzo: {{ (singleDish.price * quantity).toFixed(2) }} &#8364;
                    </h6>
                    <button @click="addCart">Aggiungi al carrello</button>
                    <button @click="closePopup">Annulla</button>
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
            categories: [],
            filteredCategories: [],
            popup: false,
            singleDish: null,
            quantity: 1,
            cart: []
        }
    },
    created() {
        this.getRestaurant(this.$route.params.slug);
    },
    methods: {
        showPopup(dish) {
            this.popup = true;
            this.singleDish = dish;
        },
        plusOne: function() {
            this.quantity += 1;
        },
        minusOne: function() {
            if (this.quantity > 1) this.quantity -= 1;
          },
        addCart() {
            let obj = {
                dish: this.singleDish,
                quantita: this.quantity
            }
            if(this.cart.length == 0){
                    this.cart.push(obj);
            }else {
                let flag=false;
                for(let i=0; i< this.cart.length; i++){     
                    if(this.cart[i].dish.id == obj.dish.id){
                        flag=true;
                        this.cart[i].quantita += obj.quantita;
                    }   
                }
                if(!flag){
                    this.cart.push(obj);
                }
            }
            this.closePopup();
            console.log(this.cart);
        },
        closePopup() {
            this.popup = false;
            this.singleDish = null;
            this.quantity = 1;
        },
        getRestaurant(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/restaurant/${slug}`)
                .then(
                    res => {
                        console.log(res.data);
                        this.restaurant = res.data;
                        this.getCategories();
                        // console.log(restaurant);
                    }
                )
                .catch(
                        err => {
                            console.log(err);
                        }
                    );
        },
        getCategories() {
            axios
                .get(`http://127.0.0.1:8000/api/category`)
                .then(
                    res => {
                        console.log(res.data);
                        this.categories = res.data;
                        this.filterCategories();
                        // console.log(category);
                    }
                )
                .catch(
                        err => {
                            console.log(err);
                        }
                    );
        },
        filterCategories() {
            for (let i = 0; i < this.restaurant.dishes.length; i++) {
                const dishCategory = this.restaurant.dishes[i].category_id;
                // console.log(this.restaurant.dishes[i]);

                for (let k = 0; k < this.categories.length; k++) {
                    const category = this.categories[k].id;
                    // console.log(this.categories[k]);

                    if (category == dishCategory) {
                        let exist = false;

                        for (let n = 0; n < this.filteredCategories.length; n++) {
                            if (this.filteredCategories[n].id == category) {
                                exist = true;
                            }
                        }
                        if (!exist) {
                            this.filteredCategories.push(this.categories[k])
                        }
                    }
                }
            }
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
        }

    .menu-card {
        background-color: white;
        border: 1px solid #e2e6e9;
        margin: 0 10px 10px;
        &.hover:hover {
            cursor: pointer;
        }
        h5 {
            font-weight: bold;
        }
        h6 {
            color: #4764CF;
        }
        
    }

    .popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.151);
        .popup-item {
            width: 20%;
            background-color: white;
            padding: 30px;
            box-shadow: 0 2px 4px 0 rgb(0 0 0 / 30%);
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