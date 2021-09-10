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

        <!-- <form method="post"> -->

        <!-- Putting the empty container you plan to pass to
        `braintree.dropin.create` inside a form will make layout and flow
        easier to manage -->

            <!-- <p>
                <b>Please correct the following error(s):</b>
                <ul>
                    <li v-for="error in errors">{{ error }}</li>
                </ul>
            </p> -->

            <!-- <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" v-model="name" maxlength="100" class="form-control" name="name" id="name" placeholder="Inserisci il tuo nome" required>
            </div>

            <div class="form-group">
                <label for="surname">Cognome</label>
                <input type="text" v-model="surname" maxlength="100" class="form-control" name="surname" id="surname" placeholder="Inserisci il tuo cognome" required>
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input type="text" v-model="address" maxlength="100" class="form-control" name="address" id="address" placeholder="Inserisci il tuo indirizzo" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" v-model="email" maxlength="100" class="form-control" name="email" id="email" placeholder="Inserisci la tua email" required>
            </div>

            <div id="dropin-container"></div>
            <div class="wrap">
                <input class="payment_btn" type="submit" value="Invia il pagamento">
                <a class="payment_btn">ritorna carrello</a>
            </div>

            <input type="hidden" id="nonce" name="payment_method_nonce"/>
            <input type="hidden" id="cart" name="cart"/>

        </form> -->

        <form id="payment-form" action="api/token" method="post">
            <!-- Putting the empty container you plan to pass to
            `braintree.dropin.create` inside a form will make layout and flow
            easier to manage -->
            <div id="dropin-container"></div>
            <input type="submit" />
            <input type="hidden" id="nonce" name="payment_method_nonce"/>
        </form>
    </div>
    


</template>
    
<script>
export default {
    name:'Payment',
    data(){
        return{
            cartProducs :[],
            name:'',
            surname:'',
            address:'',
            email:'',

        }
    },
    mounted(){
        this.cartProducs = JSON.parse(localStorage.getItem("cart"));
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
                            // Step four: when the user is ready to complete their
                            //   transaction, use the dropinInstance to get a payment
                            //   method nonce for the user's selected payment method, then add
                            //   it a the hidden field before submitting the complete form to
                            //   a server-side integration
                            document.getElementById('nonce').value = payload.nonce;
                        
                            // document.getElementById('cart').value = JSON.stringify(this.$store.state.cart);
                            form.submit();
                        });
                    });
                });
            })
            .catch(error =>{
            });
        }
        // Step two: create a dropin instance using that container (or a string
        //   that functions as a query selector such as `#dropin-container`)
        // braintree.dropin.create({
        // container: document.getElementById('dropin-container'),
        // // ...plus remaining configuration
        // }, (error, dropinInstance) => {
        // // Use `dropinInstance` here
        // // Methods documented at https://braintree.github.io/braintree-web-drop-in/docs/current/Dropin.html
        //     dropinInstance.requestPaymentMethod((error, payload) => {
        //         if (error) console.error(error);
        //             // Step four: when the user is ready to complete their
        //             //   transaction, use the dropinInstance to get a payment
        //             //   method nonce for the user's selected payment method, then add
        //             //   it a the hidden field before submitting the complete form to
        //             //   a server-side integration
        //             document.getElementById('nonce').value = payload.nonce;
        //             // document.getElementById('cart').value = JSON.stringify('we');
        //             form.submit();
        //         });
        // });
    

    // methods:{
    //     async wtf(){
           
    //        await this.cartProducs;
    //     }
    // }
}
</script>

<style>

</style>