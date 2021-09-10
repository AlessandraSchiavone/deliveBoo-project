<template>
    <div class="error404">
        <div class="pattern">

        </div>
        <div class="content">
            <img src="../assets/burgerNotFound.png" alt="">
            <h1>Pagina non trovata</h1>
            <div>Siamo spiacenti, la pagina che stai cercando non esiste. <br>
                Ma c'è altro da vedere!
            </div>
            <router-link :to="{name:'home'}"><button class="btn ">Vai alla home</button></router-link>
        </div>       
    </div>
</template>

<script>
export default {
    name: 'NotFound'
}
</script>

<style lang="scss" scoped>
  .error404{  
    height: 100vh;
   
    .pattern{
        background: url("../assets/pattern2.png") repeat-x 0 0;
        height:180px;
    }
    .content{
      text-align: center;
      max-width: 30%;
      margin: -100px auto auto;
      img{
          width:300px;
          height:200px;
      }
      h1{
        font-size: 45px;
      }
      & > div{
        font-size: 22px;
        margin-bottom: 30px;
      }
      button{
        padding: 0.5em 1em;
        border-radius: 4px;
        background-color:#FFCC00;
        color: #fff;
        font-weight: bold;
        margin-bottom: 20px;
        &:hover{
            background-color: #FF8000;
        }
      }
    }
  }
  @media screen and (max-width: 851px){
  .error404{
    .content{
      max-width: 60%;
      h1{
        font-size: 36px;
      }
    }
  }
}
</style>