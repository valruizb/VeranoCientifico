<template>
  <Head> </Head>
  <Navbar > </Navbar>
  <body>
    <!----<div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Cargando...</span>
      </div>
    </div>-->
  
  <section class="jarallax dark-mode bg-dark py-xxl-5" data-jarallax data-speed="0.4">
    
        <span class="position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark-translucent"></span>
        <div class="jarallax-img" style="background-image: url(assets/img/landing/software-company/hero-bg.jpg);"></div>
        <div class="position-relative text-center zindex-5 overflow-hidden pt-4 py-md-5">

          <!-- Slider controls (Prev / next) -->
          <button type="button" id="hero-prev" class="btn btn-prev btn-icon btn-xl bg-transparent shadow-none position-absolute top-50 start-0 translate-middle-y d-none d-md-inline-flex ms-n3 ms-lg-2">
            <i class="bx bx-chevron-left fs-1"></i>
          </button>
          <button type="button" id="hero-next" class="btn btn-next btn-icon btn-xl bg-transparent shadow-none position-absolute top-50 end-0 translate-middle-y d-none d-md-inline-flex me-n3 me-lg-2">
            <i class="bx bx-chevron-right fs-1"></i>
          </button>

          <!-- Slider -->
          <div class="container text-center py-xl-5">
            <div class="row justify-content-center pt-lg-5">
              <div class="col-xl-8 col-lg-9 col-md-10 col-11">
                <div class="swiper pt-5 pb-4 py-md-5" data-swiper-options='{
                  "effect": "fade",
                  "speed": 500,
                  "autoplay": {
                    "delay": 5500,
                    "disableOnInteraction": false
                  },
                  "pagination": {
                    "el": ".swiper-pagination",
                    "clickable": true
                  },
                  "navigation": {
                    "prevEl": "#hero-prev",
                    "nextEl": "#hero-next"
                  }
                }'>
                  <div class="swiper-wrapper">

                    <!-- Item -->
                    <div class="swiper-slide">
                      <h2 class="display-2 from-start mb-lg-4">The Best IT Solutions for Your Business</h2>
                      <div class="from-end">
                        <p class="fs-xl text-light opacity-70 pb-2 mb-lg-5">We provide the wide range of high quality IT services and best practices solutions to our customers making their business better.</p>
                      </div>
                      <div class="scale-up delay-1">
                        <a href="#" class="btn btn-primary shadow-primary btn-lg">Start your project</a>
                      </div>

                    </div>

                    <!-- Item -->
                    <div class="swiper-slide">
                      <h2 class="display-2 from-start mb-lg-4">Award-Winning Software Development</h2>
                      <div class="from-end">
                        <p class="fs-xl text-light opacity-70 pb-2 mb-lg-5">We build complex web, desktop and mobile applications. With us you get quality software and perfect service every time.</p>
                      </div>
                      <div class="scale-up delay-1">
                        <a href="#" class="btn btn-primary shadow-primary btn-lg">View case studies</a>
                      </div>
                    </div>

                    <!-- Item -->
                    <div class="swiper-slide">
                      <h2 class="display-2 from-start mb-lg-4">24/7 Tech &amp; Business Support</h2>
                      <div class="from-end">
                        <p class="fs-xl text-light opacity-70 pb-2 mb-lg-5">We ensure lifetime support of all applications we've built. Our support department is a team of professionals who will assist you 24/7.</p>
                      </div>
                      <div class="scale-up delay-1">
                        <a href="#" class="btn btn-primary shadow-primary btn-lg">Work with us</a>
                      </div>
                    </div>
                  </div>

                  <!-- Pagination (bullets) -->
                  <div class="swiper-pagination position-relative d-md-none pt-2 mt-5"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

  <div class="contsistema container ">

<br><br>

    <!---<a target="blank" href="https://api.whatsapp.com/send?phone=7774525374&text=Hola,%20%C2%BFme%20puedes%20apoyar?" class="circulo"><i class='bx bxl-whatsapp'></i></a>-->

        <h1 class="h1 text-center pb-3 pb-md-0 mb-md-5">¿Cómo opera nuestro sistema?</h1>
        <div class="steps">
          <div class="step pt-0 pt-md-3 pb-5">
            <div class="step-number">
              <div class="step-number-inner">1</div>
            </div>
            <div class="step-body d-flex align-items-center ps-xl-5">
              <div class="d-none d-lg-block flex-shrink-0 mx-4 mx-xl-5" data-jarallax-element="10" data-disable-parallax-down="lg">
                <img src="assets/img/landing/online-courses/steps/01-dark.svg" class="d-dark-mode-none" width="306" alt="Illustration">
                <img src="assets/img/landing/online-courses/steps/01-light.svg" class="d-none d-dark-mode-block" width="306" alt="Illustration">
              </div>
              <div class="ps-md-4 ps-xl-5" data-jarallax-element="-10" data-disable-parallax-down="lg">
                <h3 class="subtitulo">Las y los investigadores registran propuestas de proyectos de investigación</h3>
                <p id="operasis" class="mb-0">Las y los investigadores pueden ingresar directamente al portal con su ID del TecNM; si son de reciente ingreso, pueden solicitar su registro desde la misma plataforma. Crearán sus proyectos de investigación y estos serán visibles para nuestra comunidad estudiantil.</p>
              </div>
            </div>
          </div>
          <div class="step pt-0 pt-md-4 pb-5">
            <div class="step-number">
              <div class="step-number-inner">2</div>
            </div>
            <div class="step-body d-flex align-items-center ps-xl-5">
              <div class="d-none d-lg-block flex-shrink-0 mx-4 mx-xl-5" data-jarallax-element="25" data-disable-parallax-down="lg">
                <img src="assets/img/landing/online-courses/steps/02-dark.svg" class="d-dark-mode-none" width="306" alt="Illustration">
                <img src="assets/img/landing/online-courses/steps/02-light.svg" class="d-none d-dark-mode-block" width="306" alt="Illustration">
              </div>
              <div class="ps-md-4 ps-xl-5" data-jarallax-element="-25" data-disable-parallax-down="lg">
                <h3 class="subtitulo">Los y las estudiantes eligen los proyectos de investigación de su interés</h3>
                <p id="operasis" class="mb-0">Los y las estudiantes se registran en el portal para elegir los proyectos de investigación de su interés y desarrollarlo bajo asesoría de una o un investigador.</p>
              </div>
            </div>
          </div>
          <div class="step pt-0 pt-md-4 pb-5">
            <div class="step-number">
              <div class="step-number-inner">3</div>
            </div>
            <div class="step-body d-flex align-items-center ps-xl-5">
              <div class="d-none d-lg-block flex-shrink-0 mx-4 mx-xl-5" data-jarallax-element="10" data-disable-parallax-down="lg">
                <img src="assets/img/landing/online-courses/steps/03-dark.svg" class="d-dark-mode-none" width="306" alt="Illustration">
                <img src="assets/img/landing/online-courses/steps/03-light.svg" class="d-none d-dark-mode-block" width="306" alt="Illustration">
              </div>
              <div class="ps-md-4 ps-xl-5" data-jarallax-element="-10" data-disable-parallax-down="lg">
                <h3 class="subtitulo">Las y los revisores institucionales validan los Expedientes</h3>
                <p id="operasis" class="mb-0">Los Revisores Institucionales evalúan la correcta conformación de los expedientes académicos que los estudiantes cargan en la plataforma como requisito para ser elegibles para desarrollar un proyecto de investigación.</p>
              </div>
            </div>
          </div>
          <div class="step pt-0 pt-md-4 pb-5">
            <div class="step-number">
              <div class="step-number-inner">4</div>
            </div>
            <div class="step-body d-flex align-items-center ps-xl-5">
              <div class="d-none d-lg-block flex-shrink-0 mx-4 mx-xl-5" data-jarallax-element="25" data-disable-parallax-down="lg">
                <img src="assets/img/landing/online-courses/steps/04-dark.svg" class="d-dark-mode-none" width="306" alt="Illustration">
                <img src="assets/img/landing/online-courses/steps/04-light.svg" class="d-none d-dark-mode-block" width="306" alt="Illustration">
              </div>
              <div class="ps-md-4 ps-xl-5" data-jarallax-element="-25" data-disable-parallax-down="lg">
                <h3 class="subtitulo">Se asignan los proyectos a las y los estudiantes considerando sus perfiles académicos</h3>
                <p id="operasis" class="mb-0">Las y los investigadores evalúan los perfiles académicos de los estudiantes para asignarles los proyectos adecuados a sus aptitudes e intereses de investigación.</p>
              </div>
            </div>
          </div>
        </div>
      </div><br><br><br><br><br><br>
      
    <div class="redessociales">
      <h1 class="redes">Visita Nuestra Redes Sociales</h1>
      <p class="siguenos">¡Síguenos y mantente al día con las noticias más recientes!</p><br><br>
      <div class="facebook">
        <a target="blank" href="https://www.facebook.com/TecNMCenidet.mx" class="facebook2" >
          <i class='bx bxl-facebook'></i>
        </a>
            <h5>Facebook</h5>
            <p id="pcenidet">Cenidet</p>
      </div>
      <div class="twitter">
        <a target="blank" href="https://twitter.com/CENIDET" class="twitter2">
          <i class="bx bxl-twitter"></i>
        </a>
          <h5>Twitter</h5>
          <p id="pcenidet">Cenidet</p>
      </div>
      <div class="youtube">
        <a target="blank" href="https://www.youtube.com/channel/UCppsS5lV2CKqImeHeLt5zgw" class="youtube2">
          <i class="bx bxl-youtube"></i>
        </a>
          <h5>Youtube</h5>
          <p id="pcenidet">Cenidet</p>
      </div>
      <div class="insta">
        <a target="blank" href="https://www.instagram.com/cenidet_oficial/" class="insta2" >
          <i class="bx bxl-instagram"></i>
        </a> 
          <h5>Instagram</h5>
          <p id="pcenidet">Cenidet</p>
      </div>
    </div><br><br><hr><br><br><br><br>

<Footer> </Footer>
</body>

<!----<div id="my-carousel" class="carousel" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item d" v-for="slide in slides">
      <img class="d-block w-100" :src="slide">
      <div class="carousel-caption d-none d-md-block">
        <h5>Title</h5>
        <p>Text</p>
      </div>
    </div>
  </div>
</div>--->
</template>

<script>
import Carousel from "../../../public/assets/carousel/Carousel.vue"
import { defineComponent } from "vue"
import { Link } from '@inertiajs/inertia-vue3';
import { Swiper, SwiperSlide } from "swiper/vue";
import Navbar from '@/Jetstream/Navbar.vue';
import Head from '@/Jetstream/Head.vue';
import Footer from '@/Jetstream/Footer.vue';

export default defineComponent({
  components: {
    Link,
    Carousel,
    Swiper,
    SwiperSlide,
    Navbar,
    Head,
    Footer
  },

  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
  
});

let mode = window.localStorage.getItem('mode'),
        root = document.getElementsByTagName('html')[0];
    if (mode !== undefined && mode === 'dark') {
      root.classList.add('dark-mode');
    } else {
    root.classList.remove('dark-mode');
    };

    (function () {
      window.onload = function () {
        const preloader = document.querySelector('.page-loading');
        preloader.classList.remove('active');
        setTimeout(function () {
          preloader.remove();
        }, 1000);
      };
    })(); 
</script>

<style scoped>

.page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #131022;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }

  /*Barra de navegación*/
  .header{
      position: fixed;
      background-color: #ffffff;
    }

    i[id="boxi"]{
      font-size: 19px;
      padding: 5px;
    }

    .navbar{
      width: 100%;
      z-index: 100;
    }

    a[id="text"]{
      font-size: bold;
      padding-top: 10px;
      display: block;
    }

    nav[id="navegador"]{
    font-size: 18px;
    color: #092252; 
    margin-left: 2%;
    }

    li{
      padding: 10px;
    }

    a[id="logo"]{
      margin-left: -8%;
      height: 80px;
    }

    a[id="lista"]:hover{
      background-color:rgba(195, 197, 214, 0.795);
      border-radius: 15px;
    }


    a[id="opt"]:hover{
      background-color:rgba(230, 231, 240, 0.932);
      color: #092252; 
      border-radius: 12px;
    }

    a[id="opt"]{
      cursor: pointer;
      background-color:rgb(255, 255, 255);
      color: #092252; 
      padding-top: 5px;
      border-radius: 10px;
    }

    li[id="cont"]::after, li[id="cont"]::before{
      content: '';
      position: absolute;
      background-color: rgb(22, 9, 82);
      width: 3px;
      height: 12px;
      top: 27px;
      border-radius: 5px;
      transition: all 0.3s;
    }

    li[id="cont"]{
      min-height: 45px;
      position: relative;
      width: 150px;
      margin-left: -10px;
      text-align: center;
      cursor: pointer;
      color: #092252; 
    }

    li[id="cont"]::after{
      transform: rotate(45deg);
      left:85%;
    }

    li[id="cont"]::before{
      transform: rotate(-45deg);
      left:89%;
    }

    li[id="cont"]:hover::after{
      transform: rotate(135deg);
    }

    li[id="cont"]:hover::before{
      transform: rotate(-135deg);
    }

    a[id="linktec"]{
      text-decoration:underline;
    }

    [id="btn"]:hover{
      background-color: rgba(6, 42, 107, 0.986);
      color: rgb(255, 255, 255);
      font-style: bold;
    }

    [id="btn"]{
      background-color: #092252;
      color: rgb(255, 255, 255);
      width: 16%;
      border-radius: 10px;
      padding: 12px;
      margin-left: 40px;
      margin-right: -8%;
    }

    i[id="boxi2"]{
      font-size: 21px;
      padding: 5px;
    }

    i[id="boxi3"]{
      font-size: 17px;
      padding: 1px;
    }

    /*Footer*/

    .pie{
      text-align: center;
    }

    .circulo{
      margin-left: 90%;
      position: fixed;
      width: 70px;
      height: 70px;
      line-height: 70px;
      bottom: 30px;
      right: 30px;
      background-color: #08f808;
      color: #ffffff;
      border-radius: 70px;
      text-align: center;
      font-size: 35px;
      box-shadow: 14px 14px 20px #b2b5b8, -12px -14px 20px rgba(158, 156, 156, 0.137);
    }

    .circulo:hover{
      margin-left: 90%;
      position: fixed;
      width: 70px;
      height: 70px;
      line-height: 70px;
      bottom: 30px;
      right: 30px;
      background-color: #ffffff;
      color: #08f808;
      border-radius: 70px;
      text-align: center;
      font-size: 35px;
    }

    /*Cómo opera nuestro sistema */
    p[id="operasis"]{
      text-align: justify;
      font-size: 17px;
    }

    .subtitulo{
      font-size: 27px;
      text-align: justify;
    }

    .contsistema{
      position: relative;
    }

    /*Redes sociales*/

    .facebook2, .twitter2, .youtube2, .insta2{
      margin-left: 2%;
      line-height: 70px;
      background-color: aliceblue;
      color: #4e4e4e;
      border-radius: 10px;
      text-align: center;
      font-size: 45px;
      margin-top: 2%;
      box-shadow: 14px 14px 20px #b2b5b8, -2px -1px 2px rgba(216, 213, 213, 0.137);
    }

    .facebook2:hover{
      background-color: #2b08a7;
      color: #ffffff;
    }

    .twitter2:hover{
      background-color: #1ea6cf;
      color: #ffffff;
    }

    .youtube2:hover{
      background-color: #d40a0a;
      color: #ffffff;
    }

    .insta2:hover{
      background: rgb(134,12,221);
      background: linear-gradient(47deg, rgba(134,12,221,1) 0%, rgba(227,18,64,1) 35%, rgba(233,183,29,1) 80%);
      color: #ffffff;
    }

    .facebook, .twitter, .youtube, .insta{
      width: 290px;
      height: 180px;
      line-height: 130px;
      margin-left: 2%;
      text-align: center;
      display: inline-block;
    }

    
     .twitter, .youtube, .insta{
      border-left: 1px solid #8886867c;
    }

    p[id="pcenidet"]{
      text-align: center;
      margin-top: -21%;
      margin-left: 41%;
      background-color: #08f808;
      width:10%;
      height: -0%;;
      
    }

    .redessociales{
      margin-left: 70px;
    }

    .redes{
      text-align: center;
      font-size: 45px;
    }

    .siguenos{
      text-align: center;
      font-size: 20px;
    }

    h5{
      margin-left: 37%;
      margin-top: -10%;
      width: 10%;
    }

</style>



