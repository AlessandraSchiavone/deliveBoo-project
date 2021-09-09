<template>
  <section v-if="restaurant">
      <div class="jumbotron">
          <img :src="restaurant.img" :alt="restaurant.name">
      </div>
      <div class="container">
        <div class="position-relative row d-flex justify-content-center">
            <div class="col-md-2">
                <ul class="sticky-top category-list">
                    <li v-for="category in filteredCategories" :key="`category-${category.id}`" @click="setActive(category.id)">
                        <a :href="`#category-${category.id}`" :class="category.id == activeCategoryId ? 'active':''">{{category.name}}</a>
                    </li>
                </ul>
            </div>
            <div class="box col-md-5">
                <div class="box-top text-center py-5">
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
                        <p class="text-capitalize">{{dish.description}}</p>
                        <h6>{{(dish.price).toFixed(2)}} &euro;</h6>
                    </div>
                </div>
            </div>
            <div class="box col-md-5">
                <div class="box-top sticky-top">
                    <div class="cart-summary">
                        <h3>Il tuo ordine</h3>
                        <div class="box-allergy">
                            <ul class="d-flex flex-direction-row align-items-center">
                                <li><i class="fas fa-exclamation-circle"></i></li>
                                <li>Hai un'allergia o un'intolleranza alimentare? Se hai un'allergia o un'intolleranza alimentare, telefona immediatamente al ristorante.</li>
                            </ul>
                        </div>
                        <div class="box-modalita">
                            <ul class="d-flex align-items-center justify-content-between">
                                <li id="active"><i class="fas fa-shipping-fast"></i><span> Consegna</span></li>
                                <li>Ritiro non disponibile</li>
                            </ul>
                        </div>
                        <!-- carrello con singoli piatti -->
                        <!-- mettere funzione calcolo prezzo finale -->
                        <div v-for="item,i in cart"
                        :key="item.id">
                        <ul class="d-flex flex-direction-row cart-item justify-content-between">
                            <div class="summary-left d-flex">
                                <li class="d-flex align-items-center">
                                    <i
                                        class="fas fa-minus-circle"
                                        @click="minusOneCart(i)"
                                    ></i>
                                    <span> {{ item.quantita }} </span>
                                    <i
                                        class="fas fa-plus-circle"
                                        @click="plusOneCart(i)"
                                    ></i>
                                </li>
                                <li>{{item.dish.name}}</li>
                            </div>
                            <div class="summary-right d-flex align-items-center">
                                <li class="item-delete" @click="removeCart(i)"><i class="fas fa-trash-alt"></i></li>
                                <li>{{(item.dish.price * item.quantita).toFixed(2)}} &euro;</li>
                            </div>                            
                        </ul>
                        </div>
                        <!-- riepilogo totale -->
                        <!-- sistemare v-if visualizzazione totale -->
                        <div class="cart-total" v-if="cart.length">
                            <h6>Costo di consegna: {{ consegna == 0 ? 'Gratis': `${consegna} &euro;` }}</h6>
                            <h6>Totale: {{ total().toFixed(2) }} &#8364;</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- scheda popup-->
            <div class="popup d-flex justify-content-center align-items-center" v-if="popup">
                <div class="popup-item menu-card text-center">
                    <h3 class="mt-3 font-weight-bold">{{ singleDish.name }}</h3>
                    <h5 class="my-3">{{(singleDish.price).toFixed(2)}} &euro;</h5>
                    <span class="px-5 text-capitalize">{{ singleDish.description }}</span>
                    <div class="quantity my-3">
                        <i class="fas fa-minus" @click="minusOne"></i>
                        <span class="popup-quantity">{{ quantity }}</span>
                        <i class="fas fa-plus" @click="plusOne"></i>
                    </div>
                    <div class="button-container">
                        <button class="btn d-flex justify-content-between font-weight-bold add-cart" @click="checkCart"><span>Aggiungi all' ordine</span><span>{{ (singleDish.price * quantity).toFixed(2) }} &#8364;</span></button>
                    </div>
                    <span class="close-popup" @click="closePopup"><i class="fas fa-times"></i></span>
                </div>
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
            activeCategoryId: null,
            filteredCategories: [],
            popup: false,
            consegna: null,
            singleDish: null,
            quantity: 1,
            cart: [],
        }
    },
    created() {
        this.getRestaurant(this.$route.params.slug);
    },
    watch: {
        popup() {
            if (this.popup) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }

        }
    },
    methods: {
        setActive(id) {
            this.activeCategoryId = id;
        },
        updateLocalStorage: function() {
            localStorage.setItem("cart", JSON.stringify(this.cart));
            localStorage.restaurant_id = this.restaurant.id;
            // localStorage.clear();
        },
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
        checkCart() {
            if (!localStorage.cart || localStorage.restaurant_id == this.restaurant.id) {
                this.addCart();
            } 
            else {
                let yes = confirm('Vuoi creare un nuovo carrello?\nQuello precedente verrà eliminato.');
                if (yes) {
                    this.addCart();
                } else {
                    this.closePopup();
                }
            }
        },
        addCart() {
            let obj = {
                dish: this.singleDish,
                quantita: this.quantity,                
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
            this.updateLocalStorage();
            this.closePopup();
            console.log(this.cart);
        },
        plusOneCart: function(i) {
            this.cart[i].quantita += 1;
            this.updateLocalStorage();
        },
        minusOneCart: function(i) {
            if (this.cart[i].quantita > 1) {
                this.cart[i].quantita -= 1;
                this.updateLocalStorage();
            } else {
                this.removeCart(i);
            }
        },
        removeCart: function(i) {
            this.cart.splice(i, 1);
            this.updateLocalStorage();
        },
        total: function() {
            let total = 0;
            for (var i = 0; i < this.cart.length; i++) {
                total += this.cart[i].dish.price * this.cart[i].quantita;
            }
            return total + this.consegna  ;
        },
        closePopup() {
            this.popup = false;
            this.singleDish = null;
            this.quantity = 1;
        },
        syncCart() {
            if (localStorage.cart && localStorage.restaurant_id == this.restaurant.id) {
                this.cart = JSON.parse(localStorage.getItem("cart"));
                console.log(this.cart);
            }
        },
        getRestaurant(slug) {
            axios
                .get(`http://127.0.0.1:8000/api/restaurant/${slug}`)
                .then(
                    res => {
                        //console.log(res.data);
                        this.restaurant = res.data;
                        this.consegna=this.restaurant.price_shipping;
                        this.syncCart();
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
                        //console.log(res.data);
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
        .sticky-top {
            z-index: 0;
        }

        .category-list {
            padding-top: 30px;
            margin-left: -20px;
            list-style: none;
            a {
                border-left: 1px solid #c5ccd3;
                display: block;
                overflow: hidden;
                padding: 10px 0 10px 5px;
                text-decoration: none;
                color: #5e6b77;
                &:hover,
                &.active {
                    border-left: 2px solid black;
                    font-weight: bold;
                    color: black;
                }
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
                position: relative;
                width: 20%;
                background-color: white;
                padding-top: 30px;
                box-shadow: 0 2px 4px 0 rgb(0 0 0 / 30%);
                z-index: 1050;
                .close-popup {
                    position: absolute;
                    top: 0;
                    right: 0;
                    padding: 10px 20px;
                    font-size: 18px;
                    &:hover {
                        cursor: pointer;
                    }
                }
                .button-container {
                    box-shadow: 0 -2px 4px 0 rgba(0,0,0,.12);
                    padding: 24px;
                    .add-cart {
                        background-color: #f36d00;
                        color: white;
                        width: 100%;
                    }
                }
                .popup-quantity {
                    padding: 0 10px;
                    font-size: 20px;
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
        .cart-summary {
            padding: 20px;
            h3 {
                font-weight: bold;
                padding-bottom: 10px;
                border-bottom: 1px solid #e2e6e9;
            }
            .box-allergy {
                background-color: #F1F2F4;
                padding: 10px;
                ul {
                    margin: 0;
                    li {
                        color:#125FCA;
                        list-style: none;
                        font-size: 14px;
                    
                        i {
                            margin-right: 10px;
                            font-size: 20px;
                        }
                    }
                }
                
            }
            .box-modalita {
                margin-top: 20px;
                margin-bottom: 20px;
                background-color:#E2E6E9;
                border-radius: 50px;
                padding: 4px;
                ul {
                    margin: 0;
                    li {
                        list-style: none;
                        font-size: 12px;
                        padding: 10px 16px;
                    }
                    #active {
                        font-size: 14px;
                        background-color: white;
                        border-radius: 50px;
                        color:#125FCA;
                    }
                }
            }
            .cart-item {

                li {
                    padding: 0 8px;
                    list-style: none;
                    }

                    .summary-left {
                color: #125FCA;
                }
                .summary-right {
                    .item-delete {
                        color: #D50525;
                    }
                }
            }

            .cart-total {
                padding-top: 10px;
                border-top: 1px solid #e2e6e9;
            }
        }

    }

</style>