<template>
    <head lang="en"><meta charset="UTF-8"><title>Registro</title>
    <!-- Viewport -->
      <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon and Touch Icons -->
      <link rel="icon" type="image/png" sizes="32x32" href="../../../public/img/TecNM_logo.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../../../public/img/TecNM_logo.png">
      <link rel="manifest" href="../assets/favicon/site.webmanifest">
      <link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#6366f1">
      <link rel="shortcut icon" href="../assets/favicon/favicon.ico">
      <meta name="msapplication-TileColor" content="#080032">
      <meta name="msapplication-config" content="../assets/favicon/browserconfig.xml">
      <meta name="theme-color" content="#ffffff">
      

      <!-- Vendor Styles -->
      <link rel="stylesheet" media="screen" href="../assets/vendor/boxicons/css/boxicons.min.css"/>
      
      <link rel="stylesheet" href="../../../public/assets/vendor/swiper/swiper-bundle.min.css" />
      <link rel="stylesheet" media="screen" href="../assets/vendor/prismjs/themes/prism.css"/>
      <link rel="stylesheet" media="screen" href="../assets/vendor/prismjs/plugins/toolbar/prism-toolbar.css"/>
      <link rel="stylesheet" media="screen" href="../assets/vendor/prismjs/plugins/line-numbers/prism-line-numbers.css"/>

      <!-- Main Theme Styles + Bootstrap -->
      <link rel="stylesheet" media="screen" href="../assets/css/theme.min.css">
    
    </head>
  <header class="header navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" id="logo">
        <img src="../../../public/img/logo.png" width="47" alt="Silicon">
        TecNM/Cenidet 
      </a>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="form-check form-switch mode-switch order-lg-2 ms-4 ms-lg-auto me-lg-4" data-bs-toggle="mode">
        <input type="checkbox" class="form-check-input" id="theme-mode">
        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode">Light</label>
        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode">Dark</label>
      </div>
      <a id="btn" :href="route('login')" class="btn btn-secondary btn-sm fs-sm rounded order-lg-3 my-3 d-none d-lg-inline-flex">
        <i id="boxi" class='bx bx-user bx-flashing' ></i>
        Acceder al sistema
      </a>
      <nav id="navegador" class="collapse navbar-collapse">
        <hr class="d-lg-none mt-3 mb-2">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a id="lista" :href="route('proyectos.create')" class="nav-link">Proyectos</a>
          </li>
          <li class="nav-item">
            <a id="lista" :href="route('registro.create')" class="nav-link">Investigadores</a>
          </li>
          <li class="nav-item">
            <a id="lista" :href="route('acercaverano.index')" class="nav-link">Acerca del Verano</a>
          </li>
          <li class="dropdown" id="cont">
            <a id="text" class="dropdown-item" data-bs-toggle="dropdown" aria-expanded="false">Registro</a>
              <ul class="dropdown-menu" id="menu">
                <li><a id="opt" class="dropdown-item" :href="route('registro.create')">Registrate aquí</a></li>
              </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header><br><br><br><br>



<!-- Hero slider + BG parallax -->
  <section class="jarallax dark-mode bg-dark py-xxl-5" data-jarallax data-speed="0.4">

    <!-- Swiper tabs -->
    <div class="swiper-tabs position-absolute top-0 start-0 w-100 h-100 bg-gradient-dark-translucent">
        <div id="image1" class="position-absolute top-0 start-0 w-100 h-100 bg-position-center bg-repeat-0 bg-size-cover swiper-tab active" style="background-image: url(../../../public/img/campus.jpg);">
            <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-35"></span>
        </div>
        <div id="image-2" class="position-absolute top-0 start-0 w-100 h-100 bg-position-center bg-repeat-0 bg-size-cover swiper-tab" style="background-image: url(../../../public/img/campus.jpg);">
            <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-35"></span>
        </div>
        <div id="image-3" class="position-absolute top-0 start-0 w-100 h-100 bg-position-center bg-repeat-0 bg-size-cover swiper-tab" style="background-image: url(../../../public/img/campus.jpg);">
            <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-35"></span>
        </div>
    </div>


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
               "tabs": true,
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
                            <div class="swiper-slide" data-swiper-tab="#image1">
                                <h2 class="display-2 from-start mb-lg-4">2.° Verano Nacional de Investigación</h2>
                                <div class="from-end">
                                    <p class="fs-xl text-light opacity-70 pb-2 mb-lg-5">en Ciencia y Tecnología del Tecnológico Nacional de México 2023</p>
                                </div>
                                <div class="scale-up delay-1">
                                    <!-- <a href="<?= base_url() ?>/Login/RegisterCongreso" class="btn btn-primary shadow-primary btn-lg">Descarga las Convocatorias</a> -->
                                    <button class="btn btn-primary shadow-primary btn-lg" title="Descargar Convocatorias" type="button" onclick="onChange()" data-toggle="tooltip" data-placement="bottom"><i class='bx bxs-archive-in fs-lg me-2'></i>Descargar Convocatorias
                                    </button>
                                </div>

                            </div>

                            <!-- Item -->
                            <div class="swiper-slide" data-swiper-tab="#image-2">
                                <h4 class="display-2 from-start mb-lg-4">El evento se llevará a cabo del 19 de Junio al 25 de Julio de 2023</h4>
                                <div class="scale-up delay-1">
                                    <!-- <a href="https://veranocientifico.cenidet.tecnm.mx/content/convocatorias/Convocatoria_congreso.pdf" class="btn btn-primary shadow-primary btn-lg" target="_blank">Descarga las Convocatorias</a> -->
                                    <button class="btn btn-primary shadow-primary btn-lg" title="Descargar Convocatorias" type="button" onclick="onChange()" data-toggle="tooltip" data-placement="bottom"><i class='bx bxs-archive-in fs-lg me-2'></i>Descargar Convocatorias
                                    </button>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="swiper-slide" data-swiper-tab="#image-3">
                                <h2 class="display-2 from-start mb-lg-4">Mesas Temáticas</h2>
                                <div class="from-end">
                                    <p class="fs-xl text-light opacity-70 pb-2 mb-lg-5">Área I. Física, Matemáticas y Ciencias de la Tierra. Área II. Biología y Química. Área III. Medicina y Salud. Área IV. Biotecnología y Ciencias Agropecuarias. Área V. Tecnología 4.0. Área VI. Ingeniería e Industria. Área VII. Ciencias Sociales y Administrativas. Área VIII. Cadena de valor de litio.</p>
                                </div>
                                <div class="scale-up delay-1">
                                    <!-- <a href="https://veranocientifico.cenidet.tecnm.mx/content/convocatorias/Convocatoria_congreso.pdf" class="btn btn-primary shadow-primary btn-lg" target="_blank">Descarga las Convocatorias</a> -->
                                    <button class="btn btn-primary shadow-primary btn-lg" title="Descargar Convocatorias" type="button" onclick="onChange()" data-toggle="tooltip" data-placement="bottom"><i class='bx bxs-archive-in fs-lg me-2'></i>Descargar Convocatorias
                                    </button>
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

  

  <div class="pie">
          <h1>Accede a Nuestro Sistema o </h1>
          <h1>Suscríbete</h1><br>
          <p>© Todos los derechos Reservados. Hecho con por el <i class='bx bxs-heart bx-flashing' style="color:#f30909" ></i> <a id="linktec" target="blank" href="https://cenidet.tecnm.mx/">TecNM/Cenidet</a></p><br><br>
  </div>
   

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
import { Head, Link } from '@inertiajs/inertia-vue3';
import { Swiper, SwiperSlide } from "swiper/vue";




export default defineComponent({
  components: {
    Head,
    Link,
    Carousel,
    Swiper,
    SwiperSlide,
  },


  props: {
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
  },
  
});
</script>

<style scoped>


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



