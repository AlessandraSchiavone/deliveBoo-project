<template>
    <div class="footer">
        <div class="container d-flex justify-content-between">
            <div class="links">
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
            <div class="links">
                <h3>Note legali</h3>
                <ul>
                    <li><a href="#">Termini &amp; condizioni</a></li>
                    <li><a href="#">Informativa sulla privacy</a></li>
                    <li><a href="#">Cookies</a></li>
                </ul>
            </div>
            <div class="links">
                <h3>Aiuto</h3>
                <ul>
                    <li><a href="#">Contatti</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Tipi di cucina</a></li>
                    <li><a href="#">Mappa del sito</a></li>
                </ul>
            </div>
            <div class="links">
                <h3>Seguici</h3>
                <ul class="d-flex">
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                </ul>
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
        padding: 20px 0;
        background-color: #E2E6E9;
        ul {
            list-style: none;
            margin-bottom: 0;
            a {
                color: #2a3846;
                i {
                    font-size: 20px;
                    margin-right: 20px;
                }
            }
        }
    }
</style>