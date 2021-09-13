<template>
    <!-- <div class="container" v-if="" >
        <h1>{{this.$route.params.restaurant.name}}</h1>
        <div v-for="prodotto in this.$route.params.cartProducs" :key="prodotto.id">
            {{prodotto.dish.name + ' ' +  prodotto.quantita + 'x'}}  
        </div>
    </div> -->
    <section>
        <Header />
        <div class="pattern"></div>

        <div class="container py-5">
            
            <div class="summary">
                <h2>Il tuo ordine da {{restaurantName}}</h2>
                <div v-for="prodotto in cartProducs" :key="prodotto.id">
                    {{prodotto.dish.name + ' ' +  prodotto.quantita + 'x'}}
                </div>
                <div class="price-total mt-2">Totale: {{orderTotal}} &euro;</div>
            </div>
            <router-link :to="{ name:'single-restaurant', params: { slug: restaurantSlug  } }" class="btn my-3">Ritorna al carrello</router-link>

            <form id="payment-form" action="api/token" @submit="checkForm" method="post"> 
                <p v-if="errors.length">
                    <b>Please correct the following error(s):</b>
                    <ul>
                        <li v-for="error,index in errors" :key="index">{{ error }}</li>
                    </ul>
                </p> 

                <div class="form-group">
                    <label for="payer_name">Nome</label>
                    <input type="text" v-model="name" maxlength="100" class="form-control" name="payer_name" id="payer_name" placeholder="Inserisci il tuo nome" required>
                </div>

                <div class="form-group">
                    <label for="payer_surname">Cognome</label>
                    <input type="text" v-model="surname" maxlength="100" class="form-control" name="payer_surname" id="payer_surname" placeholder="Inserisci il tuo cognome" required>
                </div>

                <div class="form-group">
                    <label for="payer_address">Indirizzo</label>
                    <input type="text" v-model="address" maxlength="100" class="form-control" name="payer_address" id="payer_address" placeholder="Inserisci il tuo indirizzo" required>
                </div>

                <div class="form-group">
                    <label for="payer_email">Email</label>
                    <input type="email" v-model="email" maxlength="100" class="form-control" name="payer_email" id="payer_email" placeholder="Inserisci la tua email" required>
                </div>

                <div id="dropin-container"></div>
                <div class="wrap">
                    <input class="btn" type="submit" :disabled="sending" :value="sending ? 'Invio in corso...':'Invia il pagamento'">
                </div>

                <input type="hidden" id="nonce" name="payment_method_nonce"/>
                <input type="hidden" id="cart" name="cart"/>
                <input type="hidden" id="orderTotal" name="orderTotal"/>
                <input type="hidden" id="restaurantSlug" name="restaurantSlug"/>
                <!-- <form  method="post">
                    <div id="dropin-container"></div>
                    <input type="submit" />
                    <input type="hidden" id="nonce" name="payment_method_nonce"/>
                </form> -->
            </form> 

        
        </div>
        <Footer />
    </section>
    


</template>
    
<script>
import Header from '../components/Header.vue';
import Footer from '../components/Footer.vue';
export default {
  components: {
      Footer,
      Header
    },
    name:'Payment',
    data(){
        return{
            errors: [],
            restaurantName: null,
            restaurantSlug: null,
            cartProducs :[],
            orderTotal:null,
            name:'',
            sending: false,
            surname:'',
            address:'',
            email:'',

        }
    },
    created() {
        localStorage.orderRestaurantSlug = this.$route.params.restaurant.slug;
        localStorage.orderRestaurantName = this.$route.params.restaurant.name;
        localStorage.orderTotal = this.$route.params.total;
    },
    mounted(){
        this.cartProducs = JSON.parse(localStorage.getItem("cart"));
        this.orderTotal = localStorage.orderTotal;
        this.restaurantName = localStorage.orderRestaurantName;
        this.restaurantSlug = localStorage.orderRestaurantSlug;
        // console.log(localStorage.cart);
            let recaptchaScript = document.createElement('script')
            recaptchaScript.setAttribute('src', "https://js.braintreegateway.com/web/dropin/1.31.2/js/dropin.min.js")
            document.head.appendChild(recaptchaScript)
            console.log('Component payment mounted.');
            var data;
            axios.get('/api/token')
            .then(response =>{             
                data = response.data;
                // call `braintree.dropin.create` code here
                const form = document.getElementById('payment-form');
                braintree.dropin.create({
                    authorization: data,
                    container: '#dropin-container'
                }, (error, dropinInstance) => {
                    if (error) console.error(error);
                    form.addEventListener('submit', event => {
                        event.preventDefault();
                        dropinInstance.requestPaymentMethod((error, payload) => {
                            if (error) console.error(error);                 
                            document.getElementById('nonce').value = payload.nonce;
                            document.getElementById('cart').value = JSON.stringify(this.cartProducs);
                            document.getElementById('orderTotal').value = this.orderTotal;
                            document.getElementById('restaurantSlug').value = this.restaurantSlug;
                            form.submit();
                            this.sending = true;
                        }); 
                    });
                });
            })
            .catch(error =>{
            });
        },
    methods:{
        checkForm: function (e) {
                if (this.name && this.surname && this.address && this.email) {
                    return true;
                }
                this.errors = [];
                if (!this.name) {
                    this.errors.push('Name required.');
                }
                if (!this.surname) {
                    this.errors.push('Surname required.');
                }
                if (!this.address) {
                    this.errors.push('Address required.');
                }
                if (!this.email) {
                    this.errors.push('Email required.');
                }
                e.preventDefault();
            }
    }
}
</script>

<style scoped lang="scss">
    .pattern{
        background: linear-gradient( 178deg, #D00606 57.8%, white 63%);
        height: 140px;
    }
    .btn {
        color: white;
        font-weight: bold;
        background-color: #FF8000;
        &:hover {
            background-color: #FFB700;
        }
    }
</style>