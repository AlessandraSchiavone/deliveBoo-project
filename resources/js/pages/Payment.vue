<template>
    <!-- <div class="container" v-if="" >
        <h1>{{this.$route.params.restaurant.name}}</h1>
        <div v-for="prodotto in this.$route.params.cartProducs" :key="prodotto.id">
            {{prodotto.dish.name + ' ' +  prodotto.quantita + 'x'}}  
        </div>
    </div> -->
    
    <div class="container">
        
        <h1 v-if="this.$route.params.restaurant">{{this.$route.params.restaurant.name}}</h1>
        <div v-for="prodotto in cartProducs" :key="prodotto.id">
            {{prodotto.dish.name + ' ' +  prodotto.quantita + 'x'}}  
        </div>

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
                <input class="payment_btn" type="submit" value="Invia il pagamento">
                <a class="payment_btn">ritorna carrello</a>
            </div>

            <input type="hidden" id="nonce" name="payment_method_nonce"/>
            <input type="hidden" id="cart" name="cart"/>
            <input type="hidden" id="orderTotal" name="orderTotal"/>
            <!-- <form  method="post">
                <div id="dropin-container"></div>
                <input type="submit" />
                <input type="hidden" id="nonce" name="payment_method_nonce"/>
            </form> -->
        </form> 

       
    </div>
    


</template>
    
<script>
export default {
    name:'Payment',
    data(){
        return{
            errors: [],
            cartProducs :[],
            orderTotal:null,
            name:'',
            surname:'',
            address:'',
            email:'',

        }
    },
    mounted(){
        this.cartProducs = JSON.parse(localStorage.getItem("cart"));
        this.orderTotal = this.$route.params.total;
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

                            form.submit();
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

<style>

</style>