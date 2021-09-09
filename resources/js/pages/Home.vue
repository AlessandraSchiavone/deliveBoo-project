<template>
    <div class="main">
        <div class="jumbotron"></div>
        <div class="box col-md-6 d-flex flex-column justify-content-center align-items-center">
            <h1>Il bello è prenderci gusto</h1>
            <h2>Ordina online dai tuoi ristoranti preferiti</h2>
            <a href="#restaurants" class="hover-none"><div class="d-flex justify-content-center align-items-center"><i class="fas fa-angle-down"></i></div></a>
        </div>
        <div id="cuisines" >
            <div class="container">
              <h2>Le cucine più amate</h2>
              <h6>Trova le cucine più amate dai ristoranti nella tua zona e ordina online a domicilio.</h6>  
              <div class="container box-card d-flex flex-wrap justify-content-center align-items-center">
                  <button 
                    v-show="current_page > 1"
                    class="btn btn-prev mr-2"
                    @click="getCuisines(current_page - 1)"
                    ><i class="fas fa-chevron-left"></i></button>
                    <div class="cuisine-card text-center " 
                        v-for="cuisine in cuisines"
                        :key="`cusine-${cuisine.id}`"
                        @click="filterCuisine(cuisine)">
                        <img :src="require(`../assets/${cuisine.name}.png`)" :alt="cuisine.name">
                        <h3>{{cuisine.name}}</h3>
                    </div> 
                    <button 
                    v-show="current_page < last_page"
                    class="btn btn-next"
                    @click="getCuisines(current_page + 1)"
                    >
                    <i class="fas fa-chevron-right"></i>
                    </button>
              </div>
            </div>    
        </div>
        <div id="restaurants" >
            <div class="container">
                <h2>I nostri ristoranti </h2>
                <div class=" container box-card d-flex flex-wrap justify-content-center" v-if="filteredRestaurants.length == 0">
                    <div class="restaurant-card"
                        v-for="restaurant in restaurants"
                        :key="`restaurant-${restaurant.id}`">
                        <router-link :to="{ name:'single-restaurant', params: { slug: restaurant.slug  } }" class="card-link">
                            <img class="text-center" :src="restaurant.img" :alt="restaurant.name">
                            <h3>{{restaurant.name}}</h3>
                            <h6><i class="fas fa-map-marker-alt"></i> {{restaurant.location}}</h6>
                            <h6>
                                <i class="fas fa-shipping-fast"></i>
                                Consegna: {{ restaurant.price_shipping == 0 ? 'Gratis': `${restaurant.price_shipping} &euro;`}}
                                <span class="badge-icon"></span> 
                                Fascia prezzo:
                                <span v-for="n in restaurant.price_rating"
                                :key="n">&euro;</span>
                            </h6> 
                            <h6><i class="fas fa-clock"></i> Orario apertura: {{restaurant.opening_time}}</h6>
                        </router-link>       
                    </div>  
                      
                </div>
                <div class=" container box-card d-flex flex-wrap justify-content-center" v-else>
                    <div class="restaurant-card"
                        v-for="restaurant in filteredRestaurants"
                        :key="`restaurant-${restaurant.id}`">
                        <router-link :to="{ name:'single-restaurant', params: { slug: restaurant.slug  } }" class="card-link">
                            <img class="text-center" :src="restaurant.img" :alt="restaurant.name">
                            <h3>{{restaurant.name}}</h3>
                            <h6><i class="fas fa-map-marker-alt"></i> {{restaurant.location}}</h6>
                            <h6>
                                <i class="fas fa-shipping-fast"></i>
                                Consegna: {{ restaurant.price_shipping == 0 ? 'Gratis': `${restaurant.price_shipping} &euro;`}}
                                <span class="badge-icon"></span> 
                                Fascia prezzo:
                                <span v-for="n in restaurant.price_rating"
                                :key="n">&euro;</span>
                            </h6> 
                            <h6><i class="fas fa-clock"></i> Orario apertura: {{restaurant.opening_time}}</h6>
                        </router-link>       
                    </div>  
                      
                </div>
            </div>
        </div>
        <div class="container box-app my-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-md-6 app-img">
                    <img src="../assets/appname.png" alt="App Food Now">
                </div>
                <div class="col-md-6 app-info">
                    <p>Il bello è prenderci gusto</p>
                    <h6>Scarica l'app di Food Now e ordina dove vuoi, qualunque cosa desideri.</h6>
                    <div class="row d-flex justify-content-center align-items-center my-3 ">
                        <div class="col-md-4">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 135 40">
  <path d="M130 40H5c-2.8 0-5-2.2-5-5V5c0-2.8 2.2-5 5-5h125c2.8 0 5 2.2 5 5v30c0 2.8-2.2 5-5 5z"/>
  <path d="M130 .8c2.3 0 4.2 1.9 4.2 4.2v30c0 2.3-1.9 4.2-4.2 4.2H5C2.7 39.2.8 37.3.8 35V5C.8 2.7 2.7.8 5 .8h125m0-.8H5C2.2 0 0 2.3 0 5v30c0 2.8 2.2 5 5 5h125c2.8 0 5-2.2 5-5V5c0-2.7-2.2-5-5-5z" fill="#a6a6a6"/>
  <path d="M68.1 21.8c-2.4 0-4.3 1.8-4.3 4.3 0 2.4 1.9 4.3 4.3 4.3s4.3-1.8 4.3-4.3c0-2.6-1.9-4.3-4.3-4.3zm0 6.8c-1.3 0-2.4-1.1-2.4-2.6s1.1-2.6 2.4-2.6c1.3 0 2.4 1 2.4 2.6 0 1.5-1.1 2.6-2.4 2.6zm-9.3-6.8c-2.4 0-4.3 1.8-4.3 4.3 0 2.4 1.9 4.3 4.3 4.3s4.3-1.8 4.3-4.3c0-2.6-1.9-4.3-4.3-4.3zm0 6.8c-1.3 0-2.4-1.1-2.4-2.6s1.1-2.6 2.4-2.6c1.3 0 2.4 1 2.4 2.6 0 1.5-1.1 2.6-2.4 2.6zm-11.1-5.5v1.8H52c-.1 1-.5 1.8-1 2.3-.6.6-1.6 1.3-3.3 1.3-2.7 0-4.7-2.1-4.7-4.8s2.1-4.8 4.7-4.8c1.4 0 2.5.6 3.3 1.3l1.3-1.3c-1.1-1-2.5-1.8-4.5-1.8-3.6 0-6.7 3-6.7 6.6 0 3.6 3.1 6.6 6.7 6.6 2 0 3.4-.6 4.6-1.9 1.2-1.2 1.6-2.9 1.6-4.2 0-.4 0-.8-.1-1.1h-6.2zm45.4 1.4c-.4-1-1.4-2.7-3.6-2.7s-4 1.7-4 4.3c0 2.4 1.8 4.3 4.2 4.3 1.9 0 3.1-1.2 3.5-1.9l-1.4-1c-.5.7-1.1 1.2-2.1 1.2s-1.6-.4-2.1-1.3l5.7-2.4-.2-.5zm-5.8 1.4c0-1.6 1.3-2.5 2.2-2.5.7 0 1.4.4 1.6.9l-3.8 1.6zM82.6 30h1.9V17.5h-1.9V30zm-3-7.3c-.5-.5-1.3-1-2.3-1-2.1 0-4.1 1.9-4.1 4.3s1.9 4.2 4.1 4.2c1 0 1.8-.5 2.2-1h.1v.6c0 1.6-.9 2.5-2.3 2.5-1.1 0-1.9-.8-2.1-1.5l-1.6.7c.5 1.1 1.7 2.5 3.8 2.5 2.2 0 4-1.3 4-4.4V22h-1.8v.7zm-2.2 5.9c-1.3 0-2.4-1.1-2.4-2.6s1.1-2.6 2.4-2.6c1.3 0 2.3 1.1 2.3 2.6s-1 2.6-2.3 2.6zm24.4-11.1h-4.5V30h1.9v-4.7h2.6c2.1 0 4.1-1.5 4.1-3.9s-2-3.9-4.1-3.9zm.1 6h-2.7v-4.3h2.7c1.4 0 2.2 1.2 2.2 2.1-.1 1.1-.9 2.2-2.2 2.2zm11.5-1.8c-1.4 0-2.8.6-3.3 1.9l1.7.7c.4-.7 1-.9 1.7-.9 1 0 1.9.6 2 1.6v.1c-.3-.2-1.1-.5-1.9-.5-1.8 0-3.6 1-3.6 2.8 0 1.7 1.5 2.8 3.1 2.8 1.3 0 1.9-.6 2.4-1.2h.1v1h1.8v-4.8c-.2-2.2-1.9-3.5-4-3.5zm-.2 6.9c-.6 0-1.5-.3-1.5-1.1 0-1 1.1-1.3 2-1.3.8 0 1.2.2 1.7.4-.2 1.2-1.2 2-2.2 2zm10.5-6.6l-2.1 5.4h-.1l-2.2-5.4h-2l3.3 7.6-1.9 4.2h1.9l5.1-11.8h-2zm-16.8 8h1.9V17.5h-1.9V30z" fill="#fff"/>
  <linearGradient id="a" gradientUnits="userSpaceOnUse" x1="21.8" y1="173.29" x2="5.017" y2="156.508" gradientTransform="matrix(1 0 0 -1 0 182)">
    <stop offset="0" stop-color="#00A0FF"/>
    <stop offset=".007" stop-color="#00A1FF"/>
    <stop offset=".26" stop-color="#00BEFF"/>
    <stop offset=".512" stop-color="#00D2FF"/>
    <stop offset=".76" stop-color="#00DFFF"/>
    <stop offset="1" stop-color="#00E3FF"/>
  </linearGradient>
  <path d="M10.4 7.5c-.3.3-.4.8-.4 1.4V31c0 .6.2 1.1.5 1.4l.1.1L23 20.1v-.2L10.4 7.5z" fill="url(#a)"/>
  <linearGradient id="b" gradientUnits="userSpaceOnUse" x1="33.834" y1="161.999" x2="9.637" y2="161.999" gradientTransform="matrix(1 0 0 -1 0 182)">
    <stop offset="0" stop-color="#FFE000"/>
    <stop offset=".409" stop-color="#FFBD00"/>
    <stop offset=".775" stop-color="orange"/>
    <stop offset="1" stop-color="#FF9C00"/>
  </linearGradient>
  <path d="M27 24.3l-4.1-4.1v-.3l4.1-4.1.1.1 4.9 2.8c1.4.8 1.4 2.1 0 2.9l-5 2.7z" fill="url(#b)"/>
  <linearGradient id="c" gradientUnits="userSpaceOnUse" x1="24.827" y1="159.704" x2="2.069" y2="136.946" gradientTransform="matrix(1 0 0 -1 0 182)">
    <stop offset="0" stop-color="#FF3A44"/>
    <stop offset="1" stop-color="#C31162"/>
  </linearGradient>
  <path d="M27.1 24.2L22.9 20 10.4 32.5c.5.5 1.2.5 2.1.1l14.6-8.4" fill="url(#c)"/>
  <linearGradient id="d" gradientUnits="userSpaceOnUse" x1="7.297" y1="181.824" x2="17.46" y2="171.661" gradientTransform="matrix(1 0 0 -1 0 182)">
    <stop offset="0" stop-color="#32A071"/>
    <stop offset=".069" stop-color="#2DA771"/>
    <stop offset=".476" stop-color="#15CF74"/>
    <stop offset=".801" stop-color="#06E775"/>
    <stop offset="1" stop-color="#00F076"/>
  </linearGradient>
  <path d="M27.1 15.8L12.5 7.5c-.9-.5-1.6-.4-2.1.1L22.9 20l4.2-4.2z" fill="url(#d)"/>
  <path d="M27 24.1l-14.5 8.2c-.8.5-1.5.4-2 0l-.1.1.1.1c.5.4 1.2.5 2 0L27 24.1z" opacity=".2"/>
  <path d="M10.4 32.3c-.3-.3-.4-.8-.4-1.4v.1c0 .6.2 1.1.5 1.4v-.1h-.1zm21.6-11l-5 2.8.1.1 4.9-2.8c.7-.4 1-.9 1-1.4 0 .5-.4.9-1 1.3z" opacity=".12"/>
  <path d="M12.5 7.6L32 18.7c.6.4 1 .8 1 1.3 0-.5-.3-1-1-1.4L12.5 7.5c-1.4-.8-2.5-.2-2.5 1.4V9c0-1.5 1.1-2.2 2.5-1.4z" opacity=".25" fill="#fff"/>
  <path d="M41.3 13V7h1.8c.9 0 1.7.3 2.2.8.6.6.8 1.3.8 2.2 0 .9-.3 1.6-.8 2.2-.5.5-1.3.8-2.2.8h-1.8zm.7-.7h1.1c.7 0 1.2-.2 1.6-.6.4-.4.6-1 .6-1.7s-.2-1.3-.6-1.7c-.4-.4-1-.6-1.6-.6H42v4.6zm5.2.7V7h.8v6h-.8zm3.9.1c-.4 0-.9-.1-1.3-.4-.4-.3-.7-.7-.8-1.2l.7-.3c.1.3.3.6.5.8.3.2.6.3.9.3.3 0 .6-.1.9-.3.2-.2.4-.4.4-.7 0-.3-.1-.6-.4-.8-.2-.2-.6-.4-1.1-.5-.5-.2-.9-.4-1.2-.6-.3-.3-.4-.6-.4-1s.2-.8.5-1.1c.2-.3.7-.4 1.2-.4s.9.1 1.2.4c.3.3.5.5.6.8l-.7.3c0-.2-.1-.4-.3-.6-.2-.2-.5-.2-.8-.2-.3 0-.5.1-.8.2-.1.2-.2.4-.2.7 0 .2.1.4.3.6.2.2.5.3.9.4.3.1.5.2.7.3.2.1.4.2.6.4.2.1.4.3.5.6.1.2.2.5.2.8s-.1.6-.2.8c-.1.2-.3.4-.5.5-.3 0-.5.1-.7.1-.3.1-.5.1-.7.1zm3.8-.1h-.8V7h2c.5 0 .9.2 1.3.5s.6.8.6 1.3-.2.9-.6 1.3c-.4.3-.8.5-1.3.5h-1.3V13zm0-3.2h1.3c.3 0 .6-.1.8-.3.2-.2.3-.5.3-.7s-.1-.5-.3-.7c-.2-.2-.5-.3-.8-.3h-1.3v2zm9.1 2.4c-.6.6-1.3.9-2.2.9-.9 0-1.6-.3-2.2-.9-.6-.6-.9-1.3-.9-2.2s.3-1.6.9-2.2c.6-.6 1.3-.9 2.2-.9.9 0 1.6.3 2.2.9.6.6.9 1.3.9 2.2 0 .9-.3 1.6-.9 2.2zm-3.9-.5c.4.4 1 .7 1.6.7s1.2-.2 1.6-.7c.4-.4.7-1 .7-1.7s-.2-1.3-.7-1.7c-.4-.4-1-.7-1.6-.7s-1.2.2-1.6.7a2.413 2.413 0 0 0 0 3.4zm5.8 1.3V7h.9l2.9 4.7V7h.8v6h-.8l-3.1-4.9V13h-.7zm6 0V7h.8v6h-.8zm2.2 0V7h2.2c.5 0 .9.2 1.2.5.3.3.5.7.5 1.1 0 .3-.1.5-.2.8-.1.2-.3.4-.6.5.3.1.5.3.7.5.2.2.3.5.3.9 0 .5-.2.9-.5 1.2-.4.3-.8.5-1.3.5h-2.3zm.8-3.4h1.4c.3 0 .5-.1.7-.3.2-.2.3-.4.3-.6s-.2-.5-.3-.7c-.2-.2-.4-.3-.7-.3h-1.4v1.9zm0 2.7h1.6c.3 0 .5-.1.7-.3.2-.2.3-.4.3-.7 0-.2-.1-.5-.3-.7-.2-.2-.4-.3-.7-.3H75v2zm4.3.7V7h.8v6h-.8zm2.2 0V7h.8v5.3h2.6v.7h-3.4zm7.8-5.3h-2.7v1.9H89v.7h-2.5v1.9h2.7v.8h-3.5V7h3.5v.7zm4.7 5.4c-.4 0-.9-.1-1.3-.4-.4-.3-.7-.7-.8-1.2l.7-.3c.1.3.3.6.5.8.3.2.6.3.9.3.3 0 .6-.1.9-.3.2-.2.4-.4.4-.7 0-.3-.1-.6-.4-.8-.2-.2-.6-.4-1.1-.5-.5-.2-.9-.4-1.2-.6-.3-.3-.4-.6-.4-1s.2-.8.5-1.1c.3-.3.8-.5 1.3-.5s.9.1 1.2.4c.3.3.5.5.6.8l-.7.4c-.1-.2-.2-.4-.4-.5-.2-.2-.5-.2-.8-.2-.3 0-.5.1-.8.2-.2.2-.3.4-.3.6 0 .2.1.4.3.6.2.2.5.3.9.4.3.1.5.2.7.3.2.1.4.2.6.4.2.1.4.3.5.6.1.2.2.5.2.8s-.1.6-.2.8c-.1.2-.3.4-.5.5-.2 0-.4.1-.6.1-.3.1-.5.1-.7.1zm5.2 0c-.7 0-1.2-.2-1.6-.7-.4-.4-.6-1-.6-1.7V7h.8v3.8c0 .5.1.9.4 1.2.2.3.6.4 1.1.4.5 0 .8-.1 1.1-.4.2-.3.4-.7.4-1.2V7h.8v3.8c0 .7-.2 1.3-.6 1.7-.6.4-1.1.6-1.8.6z" fill="#fff" stroke="#fff" stroke-width=".2" stroke-miterlimit="10"/>
                            </svg> 
                        </div>
                        <div class="col-md-4">
                           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 135 40">
  <path fill="#A6A6A6" d="M130.197 40H4.73C2.12 40 0 37.872 0 35.267V4.727C0 2.12 2.122 0 4.73 0h125.467C132.803 0 135 2.12 135 4.726v30.54c0 2.606-2.197 4.734-4.803 4.734z"/>
  <path d="M134.032 35.268c0 2.116-1.714 3.83-3.834 3.83H4.728c-2.118 0-3.838-1.714-3.838-3.83V4.725C.89 2.61 2.61.89 4.73.89h125.467c2.12 0 3.834 1.72 3.834 3.835l.01 30.543z"/>
  <path fill="#FFF" d="M30.133 19.784c-.03-3.223 2.64-4.79 2.76-4.864-1.51-2.203-3.852-2.504-4.675-2.528-1.967-.207-3.875 1.177-4.877 1.177-1.02 0-2.56-1.16-4.22-1.13-2.14.03-4.14 1.27-5.24 3.19-2.26 3.92-.57 9.69 1.6 12.86 1.09 1.55 2.36 3.28 4.02 3.22 1.63-.07 2.23-1.04 4.2-1.04 1.95 0 2.52 1.03 4.21.99 1.74-.03 2.84-1.56 3.89-3.13 1.26-1.78 1.76-3.53 1.78-3.62-.04-.01-3.39-1.29-3.42-5.15zm-3.2-9.478c.874-1.093 1.472-2.58 1.306-4.09-1.27.057-2.85.876-3.76 1.945-.81.95-1.53 2.49-1.34 3.94 1.42.11 2.88-.71 3.79-1.79zM53.65 31.504h-2.272l-1.244-3.91H45.81l-1.185 3.91h-2.21l4.283-13.308h2.646l4.305 13.308zm-3.89-5.55l-1.126-3.474c-.12-.355-.342-1.19-.67-2.507h-.04c-.132.566-.343 1.402-.633 2.507l-1.1 3.475h3.58zm14.906.634c0 1.632-.44 2.922-1.323 3.87-.79.842-1.77 1.263-2.942 1.263-1.26 0-2.17-.45-2.72-1.36h-.04v5.06h-2.13V25.07c0-1.026-.02-2.08-.08-3.16h1.87l.12 1.522h.04c.71-1.15 1.79-1.72 3.24-1.72 1.13 0 2.08.447 2.84 1.34.76.898 1.14 2.076 1.14 3.537zm-2.172.078c0-.934-.21-1.704-.632-2.31-.46-.632-1.08-.948-1.856-.948-.526 0-1.004.176-1.43.523-.43.35-.71.81-.84 1.38-.066.27-.1.48-.1.65v1.6c0 .7.215 1.29.643 1.77s.98.72 1.66.72c.8 0 1.43-.31 1.87-.92.45-.62.67-1.43.67-2.45zm13.21-.078c0 1.632-.44 2.922-1.325 3.87-.79.842-1.77 1.263-2.95 1.263-1.27 0-2.17-.45-2.73-1.36h-.04v5.06h-2.13V25.07c0-1.026-.03-2.08-.08-3.16h1.87l.12 1.522h.04c.71-1.15 1.79-1.72 3.24-1.72 1.13 0 2.07.447 2.83 1.34.75.898 1.13 2.076 1.13 3.537zm-2.173.078c0-.934-.21-1.704-.63-2.31-.46-.632-1.08-.948-1.85-.948-.52 0-1 .176-1.43.523-.42.35-.7.81-.83 1.38-.06.27-.1.48-.1.65v1.6c0 .7.22 1.29.64 1.77.43.48.99.72 1.67.72.81 0 1.43-.31 1.88-.92.45-.62.67-1.43.67-2.45zm14.52 1.106c0 1.132-.39 2.053-1.18 2.764-.86.777-2.07 1.165-3.62 1.165-1.43 0-2.58-.27-3.45-.82l.5-1.77c.94.57 1.97.85 3.09.85.81 0 1.43-.18 1.88-.54.45-.36.67-.84.67-1.45 0-.54-.18-.99-.55-1.36-.36-.37-.98-.71-1.83-1.03-2.33-.87-3.49-2.14-3.49-3.81 0-1.09.41-1.99 1.23-2.69.82-.69 1.9-1.04 3.26-1.04 1.21 0 2.22.21 3.02.63l-.55 1.72c-.75-.4-1.6-.61-2.55-.61-.75 0-1.33.19-1.75.56-.35.33-.53.73-.53 1.21 0 .53.208.96.616 1.31.354.317 1 .66 1.935 1.028 1.145.46 1.986 1 2.527 1.62.53.62.8 1.39.8 2.31zm7.05-4.264h-2.35v4.66c0 1.184.42 1.776 1.25 1.776.38 0 .7-.033.95-.1l.06 1.62c-.42.157-.97.236-1.66.236-.84 0-1.5-.257-1.97-.77-.47-.514-.71-1.376-.71-2.587v-4.837h-1.4v-1.6h1.4V20.15l2.1-.633v2.39h2.35v1.6zm10.6 3.12c0 1.474-.42 2.685-1.26 3.632-.88.975-2.05 1.46-3.51 1.46-1.41 0-2.53-.466-3.36-1.4s-1.26-2.113-1.26-3.534c0-1.487.43-2.705 1.3-3.652.86-.948 2.02-1.422 3.49-1.422 1.41 0 2.54.467 3.4 1.402.82.907 1.23 2.078 1.23 3.513zm-2.21.07c0-.887-.19-1.646-.57-2.28-.44-.766-1.08-1.15-1.91-1.15-.85 0-1.51.385-1.95 1.15-.38.634-.57 1.405-.57 2.317 0 .885.19 1.644.57 2.276.47.77 1.11 1.15 1.94 1.15.82 0 1.46-.39 1.92-1.17.4-.64.6-1.41.6-2.29zm9.15-2.915c-.21-.04-.43-.06-.67-.06-.75 0-1.33.284-1.74.85-.35.5-.53 1.133-.53 1.896v5.03h-2.13l.02-6.58c0-1.11-.03-2.12-.08-3.02h1.86l.08 1.83h.06c.23-.63.58-1.14 1.07-1.52.48-.35.99-.52 1.54-.52.2 0 .38.01.53.04v2.03zm9.54 2.47c0 .38-.02.703-.07.966h-6.4c.03.94.34 1.67.93 2.17.54.44 1.24.67 2.09.67.95 0 1.81-.15 2.59-.46l.34 1.48c-.91.39-1.98.59-3.21.59-1.49 0-2.65-.44-3.5-1.32-.85-.88-1.28-2.05-1.28-3.53 0-1.45.4-2.65 1.19-3.62.83-1.03 1.945-1.54 3.35-1.54 1.38 0 2.43.51 3.14 1.54.565.81.848 1.82.848 3.02zm-2.03-.554c.02-.64-.12-1.18-.41-1.64-.37-.6-.93-.89-1.7-.89-.69 0-1.26.29-1.69.87-.35.46-.56 1.01-.63 1.65h4.44zM47.43 11.6c0 .553-.192 1.01-.58 1.354-.425.38-1.02.572-1.78.572-.703 0-1.27-.137-1.694-.41l.24-.872c.46.27.96.41 1.513.41.39 0 .7-.09.92-.27.22-.18.33-.42.33-.717 0-.266-.09-.49-.28-.67-.18-.18-.48-.35-.9-.505-1.15-.428-1.72-1.053-1.72-1.876 0-.54.2-.98.6-1.32.4-.345.93-.517 1.6-.517.59 0 1.09.1 1.48.31l-.26.85c-.37-.2-.79-.3-1.25-.3-.37 0-.66.09-.87.27-.18.16-.26.36-.26.59 0 .26.1.47.3.64.17.15.49.32.95.5.56.22.97.49 1.24.79.26.31.39.68.39 1.14zm4.967-2.76l-.2.796c-.267-.13-.57-.195-.913-.195-.46 0-.822.16-1.09.46-.27.31-.403.7-.403 1.17 0 .5.15.9.43 1.19s.64.43 1.07.43c.33 0 .64-.07.95-.2l.15.79c-.34.17-.77.25-1.3.25-.72 0-1.29-.21-1.71-.65s-.64-1.02-.64-1.75.23-1.33.69-1.8 1.07-.7 1.85-.7c.44 0 .82.07 1.13.22zm4.968 4.59h-.94l-.074-.543h-.03c-.32.432-.78.65-1.37.65-.44 0-.8-.144-1.07-.428-.24-.26-.37-.58-.37-.96 0-.58.24-1.02.73-1.32.48-.31 1.16-.46 2.04-.45v-.08c0-.62-.32-.93-.98-.93-.46 0-.87.11-1.23.34l-.21-.69c.44-.27.98-.41 1.62-.41 1.23 0 1.85.65 1.85 1.95v1.74c-.01.47.02.84.06 1.12zm-1.083-1.62v-.727c-1.16-.02-1.74.297-1.74.95 0 .246.066.43.2.553.135.12.306.18.51.18.23 0 .446-.08.643-.22s.316-.33.36-.56c.013-.05.02-.117.02-.188zm5.34-2.173c-.105-.02-.214-.03-.33-.03-.37 0-.65.14-.855.418-.172.24-.26.55-.26.93v2.47h-1.05l.01-3.23c0-.55-.01-1.04-.036-1.49h.9l.04.9h.03c.11-.31.29-.56.52-.747.24-.17.49-.25.76-.25.1 0 .19.003.26.02v.995zm2.5-2.33c0 .19-.062.34-.184.457-.123.117-.28.175-.476.175-.176 0-.323-.06-.44-.18-.12-.12-.18-.27-.18-.45s.06-.33.183-.45.275-.18.457-.18c.18 0 .33.06.454.17.12.11.183.26.183.44zm-.12 6.12h-1.047V8.72H64v4.713zm5.23-4.586l-.203.8c-.27-.13-.57-.19-.92-.19-.46 0-.83.16-1.09.46-.26.31-.4.7-.4 1.17 0 .5.14.9.42 1.19s.64.43 1.08.43c.32 0 .64-.07.95-.2l.15.79c-.35.17-.78.25-1.3.25-.72 0-1.29-.21-1.72-.65s-.64-1.02-.64-1.75.23-1.33.69-1.8 1.08-.7 1.85-.7c.44 0 .82.076 1.13.22zm4.964 4.59h-.94l-.077-.54h-.03c-.33.43-.79.65-1.38.65-.45 0-.81-.14-1.08-.43-.25-.26-.37-.58-.37-.96 0-.58.24-1.01.72-1.32.48-.3 1.15-.45 2.03-.44v-.08c0-.62-.33-.93-.98-.93-.47 0-.88.12-1.23.35l-.22-.68c.43-.27.97-.4 1.61-.4 1.23 0 1.85.65 1.85 1.95v1.74c0 .47.02.84.06 1.12zm-1.086-1.62v-.72c-1.16-.02-1.737.3-1.737.95 0 .25.07.43.21.56.14.12.31.18.51.18.23 0 .45-.08.65-.22.196-.15.317-.33.36-.56.016-.05.02-.11.02-.19zm8.564.27c0 .44-.16.79-.484 1.06-.322.27-.77.4-1.338.4-.537 0-.992-.1-1.367-.32l.223-.77c.36.22.746.33 1.154.33.537 0 .805-.19.805-.59 0-.17-.06-.32-.174-.43-.11-.11-.32-.22-.62-.33-.84-.31-1.26-.76-1.26-1.36 0-.4.16-.74.47-1.02.31-.27.73-.4 1.23-.4.47 0 .87.1 1.2.29l-.222.75c-.3-.18-.62-.27-.96-.27-.22 0-.39.05-.51.16s-.18.23-.18.4.07.295.2.4c.11.09.32.2.64.32.82.31 1.23.78 1.23 1.42zm5.638 1.35h-.923l-.06-.72h-.02c-.33.55-.83.83-1.5.83-.47 0-.84-.14-1.12-.44-.33-.35-.5-.89-.5-1.61V8.72h1.04v2.6c0 .905.31 1.357.93 1.357.46 0 .79-.226.97-.68.04-.115.07-.248.07-.397V8.72h1.04v3.355c0 .446.01.9.04 1.358z"/>
                            </svg> 
                        </div>
                    </div>
                    
                    
                </div>
            </div>
            
            
        </div>      
    </div>
</template>

<script>
export default {
    name: 'Home',
    data() {
        return {
            restaurants: [],
            cuisines: [],
            filteredCuisines: [],
            filteredRestaurants: [],
            current_page: 1,
            last_page: 1,
        }
    },
    methods: {
        filterCuisine(item) {
            let exist = false;
            for (let i = 0; i < this.filteredCuisines.length; i++) {
                const cuisine = this.filteredCuisines[i];
                if (cuisine == item.id) {
                    exist = true;
                    this.filteredCuisines.splice(i, 1);
                }
            }
            if (!exist) {
                this.filteredCuisines.push(item.id);
            }
            console.log(this.filteredCuisines);

            for (let k = 0; k < this.restaurants.length; k++) {
                const cuisines = this.restaurants[k].cuisines;
                // console.log(cuisines);
                let toggle = false;
                for (let n = 0; n < cuisines.length; n++) {
                    if (this.filteredCuisines.includes(cuisines[n].id)) {
                        toggle = true;
                    }
                    // else {
                        
                }
                if (!this.filteredRestaurants.includes(this.restaurants[k]) && toggle) {
                    this.filteredRestaurants.push(this.restaurants[k]);
                    console.log('push');
                } else if (this.filteredRestaurants.includes(this.restaurants[k]) && !toggle) {
                    for (let j = 0; j < this.filteredRestaurants.length; j++) {
                        const element = this.filteredRestaurants[j];
                        if (element.id == this.restaurants[k].id) {
                            this.filteredRestaurants.splice(j, 1);
                            console.log('splice');
                        }
                    }
                }
                console.log(toggle);
            }
            console.log(this.filteredRestaurants);
        },
        getRestaurants() {
            axios
                .get('http://127.0.0.1:8000/api/restaurant')
                .then(
                    res => {
                        console.log(res.data);
                        this.restaurants = res.data;
                    }
                )
                .catch(
                        err => {
                            console.log(err);
                        }
                    );
        },
        getCuisines() {
            axios
                .get('http://127.0.0.1:8000/api/cuisine')
                .then(
                    res => {
                        console.log(res.data);
                        this.cuisines = res.data;
                    }
                )
                .catch(
                        err => {
                            console.log(err);
                        }
                    );
        }
    },
    created() {
        this.getRestaurants();
        this.getCuisines();
    }
}
</script>

<style lang="scss" scoped>
    .jumbotron {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.425), rgba(0, 0, 0, 0)), url('../assets/jumbotron.png');
        height: 650px;
        background-size: cover;
        border-radius: 0;
        margin: 0;
        
    }
    .hover-none {
        &:hover {
            text-decoration: none;
        }
    }
    .box{
        margin: -184px auto 20px auto ;
        height:220px;
        box-shadow:0 2px 4px 0 rgb(0 0 0 / 16%);
        max-width:800px;
        padding:16px;
        background-color: white;
            h1{
                color:#f36d00;
                font-weight:700;
                font-size: 45px;
                line-height: 1.17;
                margin:12px 0;
            }
            h2{
                color:#5e6b77;
                font-size: 22px;
                line-height: 1.4;
            }
            
            div{
                width:30px;
                height:30px;
                border-radius:50%;
                background-color:#f36d00;
                box-shadow:0 2px 4px 0 rgb(0 0 0 / 18%);
                margin:12px 0;
                i{
                   color:white;
                   font-size: 25px;      
                }
            }
        }
    #cuisines{
        padding:30px;
        h2{
            font-size:35px;
            font-weight: bold;
        }
        h6{
            margin-bottom:10px;
        }     
    }
    .box-card{
        background-color: transparent;
        .cuisine-card{
            width:calc(100% / 6 - 20px);
            // padding:10px;
            height:150px;
            margin:10px 0px;
            img{
                width:70%;
            }
            h3{
                padding:10px 0px;
                font-size:16px;
                font-weight:300;
                color:#5e6b77;
            }
        }
        .restaurant-card{
            // padding:10px;
            .card-link {
                color: black;
                &:hover {
                    color: black;
                }
            }
            margin:10px;
            width:calc(100% / 3 - 20px);
            img{
                width:100%;
                object-fit: cover;
                background-color:lightgrey ;
                height:130px; 
            }
            h3{
                padding-top:15px ;
                font-size:20px;
                font-weight:bold;
            }
            .badge-icon::after{
              content: "•";
              display: inline-block;
              color: #727475;
            }
        }
    }
    #restaurants{
        background-color:#FFEAE4 ;
        padding: 30px 0;
        h2{
            margin:30px 10px;
            font-size:35px;
            font-weight: bold;
        }        
            }

    .box-app{
        .row{
            .app-img{
                text-align: center;
                height:350px;
                img{
                    height:100%;
                }
            }
            .app-info{
                text-align: center;
                p{
                    margin-bottom:0;
                    font-size:32px;
                    font-weight: bold;
                }
            }
        }
    }
</style>