<template>
<Head> </Head>
  <header class="header navbar navbar-expand-lg navbar-light bg-light navbar-sticky">
    <div class="container px-3">
      <a href="index.html" class="navbar-brand pe-3" id="logo">
        <img src="../../../public/img/logo.png" width="47" alt="Silicon">
        TecNM / Cenidet
      </a>
      <div id="navbarNav" class="offcanvas offcanvas-end">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title">Menu</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="dropdown drop" id="cont1">
              <a href="#" class="nav-link active" data-bs-toggle="dropdown" aria-current="page">Proyectos</a>
              <div class="dropdown-menu p-0">
                <div class="d-lg-flex">
                  <div class="mega-dropdown-column pt-lg-3 pb-lg-4">
                    <ul class="list-unstyled mb-0">
                      <li><a id="lista2" :href="route('proyectos.create')" class="dropdown-item">Proyectos 2023</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="dropdown drop" id="cont1">
              <a href="#" class="nav-link active" data-bs-toggle="dropdown" aria-current="page">Profesores</a>
              <div class="dropdown-menu p-0">
                <div class="d-lg-flex">
                  <div class="mega-dropdown-column pt-lg-3 pb-lg-4">
                    <ul class="list-unstyled mb-0">
                      <li><a id="lista" :href="route('proyectos.create')" class="dropdown-item">Profesores 2023</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="dropdown drop" id="cont1">
              <a href="#" class="nav-link active" data-bs-toggle="dropdown" aria-current="page">Acerca de</a>
              <div class="dropdown-menu p-0">
                <div class="d-lg-flex">
                  <div class="mega-dropdown-column pt-lg-3 pb-lg-4">
                    <ul class="list-unstyled mb-0">
                      <li><a id="lista" :href="route('proyectos.create')" class="dropdown-item">Acerca de</a></li>
                      <li><a id="lista" href="https://veranocientifico.cenidet.tecnm.mx/content/convocatorias/Membresia.pdf" class="dropdown-item">Membresia</a></li>
                      <li><a id="lista" href="https://veranocientifico.cenidet.tecnm.mx/content/convocatorias/Membresia.pdf" class="dropdown-item">Videos Tutoriales</a></li>
                      <li><a id="lista" href="https://veranocientifico.cenidet.tecnm.mx/content/convocatorias/Membresia.pdf" class="dropdown-item">Formatos Recomendados</a></li>
                      <li><a id="lista" href="https://veranocientifico.cenidet.tecnm.mx/content/convocatorias/Membresia.pdf" class="dropdown-item">Presentación Reunión</a></li>
                      <li><a id="lista" href="https://veranocientifico.cenidet.tecnm.mx/content/convocatorias/Membresia.pdf" class="dropdown-item">Grabación Reunión</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li class="dropdown drop" id="cont1">
              <a href="#" class="nav-link active" data-bs-toggle="dropdown" aria-current="page">Registro</a>
              <div class="dropdown-menu p-0">
                <div class="d-lg-flex">
                  <div class="mega-dropdown-column pt-lg-3 pb-lg-4">
                    <ul class="list-unstyled mb-0">
                      <li><a id="opt" class="dropdown-item" :href="route('registro.create')">Registrate aquí</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="offcanvas-footer border-top">
          <a :href="route('login')" class="btn btn-primary w-100">
            <i id="boxi" class='bx bx-user bx-flashing' ></i>
           Acceder al sistema
          </a>
        </div>      
      </div>
      <div class="form-check form-switch mode-switch pe-lg-1 ms-auto me-4" data-bs-toggle="mode">
        <input type="checkbox" class="form-check-input" id="theme-mode">
        <label class="form-check-label d-none d-sm-block" for="theme-mode">Light</label>
        <label class="form-check-label d-none d-sm-block" for="theme-mode">Dark</label>
      </div>
      <button type="button" class="navbar-toggler" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a :href="route('login')" class="btn btn-primary btn-sm fs-sm rounded d-none d-lg-inline-flex">
        <i id="boxi" class='bx bx-user bx-flashing' ></i>
           Acceder al sistema
      </a>
    </div>
  </header>
</template>

<script>
import Carousel from "../../../public/assets/carousel/Carousel.vue"
import { defineComponent } from "vue"
import { Link } from '@inertiajs/inertia-vue3';
import { Swiper, SwiperSlide } from "swiper/vue";
import Head from '@/Jetstream/Head.vue';

export default defineComponent({
  components: {
    Link,
    Carousel,
    Swiper,
    SwiperSlide,
    Head
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
      z-index: 1;
    }

    .drop{
    font-size: 18px;
    margin-right: 20px;
    }

  a[id="logo"]{
    height: 60px;
  }

  a[id="lista"]:hover{
    background-color:rgba(195, 197, 214, 0.795);
    border-radius: 15px;
  }

  li[id="cont1"]::after, li[id="cont1"]::before{
    content: '';
    position: absolute;
    background-color: rgb(22, 9, 82);
    width: 3px;
    height: 10px;
    top: 17px;
    border-radius: 5px;
    transition: all 0.3s;
  }

  li[id="cont1"]{
    min-height: 30px;
    position: relative;
    width: 110px;
    margin-left: 20px;
    text-align: center;
    cursor: pointer;
    color: #092252; 
  }

  li[id="cont1"]::after{
    transform: rotate(45deg);
    left:101%;
  }

  li[id="cont1"]::before{
    transform: rotate(-45deg);
    left:105%;
  }

  li[id="cont1"]:hover::after{
    transform: rotate(135deg);
  }

  li[id="cont1"]:hover::before{
    transform: rotate(-135deg);
  }
  
</style>