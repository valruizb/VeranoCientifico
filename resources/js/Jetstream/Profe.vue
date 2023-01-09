<template >
  <head lang="en"><meta charset="UTF-8"><title>Registro</title>
    <!-- Viewport -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <!-- Favicon and Touch Icons -->
      <link rel="icon" type="image/png" sizes="32x32" href="../../../../public/img/TecNM_logo.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../../../../public/img/TecNM_logo.png">
      <link rel="manifest" href="../assets/favicon/site.webmanifest">
      <link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#6366f1">
      <link rel="shortcut icon" href="../assets/favicon/favicon.ico">
      <meta name="msapplication-TileColor" content="#080032">
      <meta name="msapplication-config" content="../assets/favicon/browserconfig.xml">
      <meta name="theme-color" content="#ffffff">
  
      <!-- Vendor Styles -->
      <link rel="stylesheet" media="screen" href="../assets/vendor/boxicons/css/boxicons.min.css"/>
  
      <!-- Main Theme Styles + Bootstrap -->
      <link rel="stylesheet" media="screen" href="../assets/css/theme.min.css">
    
    </head>
    <header class="header navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" id="logo">
        <img src="../../../public/img/logo.png" width="47" alt="Silicon">
        TecNM/Cenidet 
      </a>
  
      <nav id="navegador" class="collapse navbar-collapse">
        <hr class="d-lg-none mt-3 mb-2">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a id="lista" :href="route('proyectos.index')" class="nav-link">Proyectos</a>
          </li>
          <li class="nav-item">
            <a id="lista" :href="route('registro.create')" class="nav-link">Alumnos</a>
          </li>
          <li class="nav-item">
            <a id="lista" :href="route('proyectos.index')" class="nav-link">Mis proyectos</a>
          </li>
          <li class="nav-item">
            <a id="lista" :href="route('registro.create')" class="nav-link">Reportes</a>
          </li>
          <div id="auth" class="dropdown order-lg-3 ms-4">
            <li class="dropdown" id="cont">
        <a href="#" class="d-flex nav-link p-0" data-bs-toggle="dropdown" >
          <img src="../../../public/assets/img/avatar/09.jpg" class="rounded-circle" width="48" alt="Avatar">
          
            <p id="auth_user">{{ $page.props.user.nombre}} {{ $page.props.user.apellidop}}</p>
          
        </a>
      </li>
        <ul class="dropdown-menu" id="menu">
          <form @submit.prevent="logout">
                    <jet-dropdown-link as="button">
                      Salir del Sistema
                    </jet-dropdown-link>
                  </form> 
        </ul>
          </div>
        </ul>
      </nav>
    </div>
  </header>
  
  
     
  </template>
  
  <script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from 'axios';
import AppLayout from "@/Layouts/AppLayout.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';

  
  
  export default {
    name: "Create",
    props: {
      title: { type: String, required: true },
      routeName: { type: String, required: true },
      tem: {type:Object, required:true},
      subtem: {type:Object, required:true},
    },
    components: {
      AppLayout,
      Link,
      JetLabel,
      JetInput,
      JetInputError,
      JetButton,
      JetDropdownLink,
    },
  
    methods: {
        logout() {
        this.$inertia.post(route('logout'));
        }
      },
     
  };
  
  </script>
  
  <style scoped>     
        /*Barra de navegacion */
        .header{
          position: fixed;
        }
      
        i[id="boxi"]{
          font-size: 19px;
          padding: 5px;
        }
      
       
        .navbar{
          width: 100%;
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
          padding: 18px;
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
          height: 11px;
          top: 35px;
          border-radius: 5px;
          transition: all 0.3s;
        }
      
        div[id="auth"]{
          left: 330px;
        }
      
        p[id="auth_user"]{
          position: absolute;
          left: 50px;
          width: 220px;
          font-size: 15px;
          color: #092352a8;
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
          left:171%;
        }
      
        li[id="cont"]::before{
          transform: rotate(-45deg);
          left:175%;
        }
      
        li[id="cont"]:hover::after{
          transform: rotate(135deg);
        }
      
        li[id="cont"]:hover::before{
          transform: rotate(-135deg);
        }
      
        p{
          margin-bottom: 0 ;
          font-size: 18px;
        }
  
      </style>
  
  