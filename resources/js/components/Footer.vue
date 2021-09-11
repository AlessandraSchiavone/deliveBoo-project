<template>
    <div class="footer">
        <div class="container">
            <div class="links-footer row">
                <div class="links col-lg-3 col-md-3 col-6">
                    <h3>Scopri Food Now</h3>
                    <ul>
                        <li><a href="#">Investitori</a></li>
                        <li><a href="#">Chi siamo</a></li>
                        <li><a href="#">Ristoranti</a></li>
                        <li><a href="#">Altro</a></li>
                        <li><a href="#">Pressroom</a></li>
                        <li><a href="#">Il nostro blog</a></li>
                        <li><a href="#">Programmazione</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Lavora con noi</a></li>
                        <li><a href="#">Diventa nostro partner</a></li>
                    </ul>
                </div>
                <div class="links col-lg-3 col-md-3 col-6">
                    <h3>Note legali</h3>
                    <ul>
                        <li><a href="#">Termini &amp; condizioni</a></li>
                        <li><a href="#">Informativa sulla privacy</a></li>
                        <li><a href="#">Cookies</a></li>
                    </ul>
                </div>
                <div class="links col-lg-3 col-md-3 col-6">
                    <h3>Servizio Clienti</h3>
                    <ul>
                        <li><a href="#">Contatti</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Tipi di cucina</a></li>
                        <li><a href="#">Mappa del sito</a></li>
                    </ul>
                </div>
                <div class="links col-lg-3 col-md-3 col-6">
                    <h3>Seguici su:</h3>
                    <ul class="d-flex">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style lang="scss" scoped>
    .footer {
        // .container{
        //     background-color: yellow;
        // }
        padding: 20px 0;
        background-color: #E2E6E9;
        h3{
            margin-top:20px;
            font-weight:bold;
        }
        ul {
            list-style: none;
            margin-top:10px;
            margin-bottom: 0;
            li{
                padding:5px 0px;
                a {
                    color: #2a3846;
                    &:hover{
                        color:#537DB0;
                    }
                    i {
                        font-size: 25px;
                        margin:0px 10px;
                    }
                }  
            }
            
        }
    }

    
    @media (min-width: 0px) and (max-width:576px) { 
        .links-footer{
            .links{
                font-size: 20px;
            }
        }
    }
</style>