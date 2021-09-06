<template>
    <div class="header container d-flex justify-content-between align-items-center">
        <a href="/" class="logo">
            <!-- <img :src="../assets/logo-colored.png" alt=""> -->
            <img :src="($route.name == 'home') ? require('../assets/logo-white.png') : require('../assets/logo-colored.png') " alt="">
        </a>
        <div class="login">
            <a href="http://127.0.0.1:8000/admin" :class="($route.name == 'home') ? 'white':'colored'">Accedi</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Header'
}
</script>

<style lang="scss" scoped>
    .header {
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: transparent;
        height: 76px;
        .logo {
            img {
                width: 215px;
            }
        }
        .login {
            a {
                &.white {
                    color: white;
                }
                &.colored {
                    color: #125fca;
                    &:hover {
                    color: #022f6e;
                }
                }
                font-size: 1.14286rem;
                font-weight: bold;
                
            }
        }
    }

</style>