<template>
  <!-- <Head>
 
 </Head>
    <header class="header navbar navbar-expand-lg navbar-light bg-light border-bottom border-light shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand nav-link p-0" id="logo">
          <img src="/public/img/logo.png" width="47" alt="Silicon">
            TecNM/Cenidet 
        </a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse5" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="dropdown order-lg-3 ms-4" id="cont">
          <a href="#" class="d-flex nav-link p-0" data-bs-toggle="dropdown" >
            <img src="/public/assets/img/avatar/09.jpg" class="rounded-circle" width="47" alt="Silicon">
              <div class="d-none d-sm-block ps-2">
                  <div class="fs-xs lh-1 opacity-60">Hola,</div>
                  <div class="fs-sm dropdown-toggle">{{ $page.props.user.name}} {{ $page.props.user.lastnamep}}</div>
              </div>
          </a>
          <ul class="dropdown-menu" id="menu">
            <form @submit.prevent="logout">
              <jet-dropdown-link as="button">
                 Salir del Sistema
              </jet-dropdown-link>
            </form> 
          </ul>
        </div>
      <nav id="navbarCollapse5" class="collapse navbar-collapse order-lg-2">
        <hr class="d-lg-none mt-3 mb-2">
          <ul class="navbar-nav me-auto">
            <li class="dropdown drop" id="cont1">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">Gestión catálogos</a>
                  <ul class="dropdown-menu">
                    <li><a id="lista" :href="route('instituciones.index')" class="nav-link">Instituciones</a></li>
                    <li><a id="lista" :href="route('proyectos.index')" class="nav-link">Temáticas</a></li>
                    <li><a id="lista" :href="route('proyectos.index')" class="nav-link">Subtemáticas</a></li>
                  </ul>
            </li>
            <li class="dropdown drop" id="cont1">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">Gestión Usuarios</a>
                  <ul class="dropdown-menu">
                    <li><a id="lista" :href="route('proyectos.index')" class="nav-link">Profesores</a></li>
                    <li><a id="lista" :href="route('proyectos.index')" class="nav-link">Revisores</a></li>
                    <li><a id="lista" :href="route('proyectos.index')" class="nav-link">Alumnos</a></li>
                  </ul>
            </li>
            <li class="dropdown drop1" id="cont">
                <a href="#" class="nav-link" data-bs-toggle="dropdown">Seguridad</a>
                  <ul class="dropdown-menu">
                    <li><a id="lista" :href="route('modulo.index')" class="nav-link">Profesores</a></li>
                    <li><a id="lista" :href="route('proyectos.index')" class="nav-link">Revisores</a></li>
                    <li><a id="lista" :href="route('proyectos.index')" class="nav-link">Alumnos</a></li>
                  </ul>
            </li>
          </ul>
    </nav>
  </div>
 </header> -->
 <main>
   <body><br><br>
     <br>
     <div class="row">
       
       <div v-for="proyecto in proyectos" :key="proyecto.id" class="cardproyectos prueba col-12 col-lg-4">
         <aside class="ver"><p class="vertical">
          {{ proyecto.thematics.name }}
         </p></aside>
         <div class="info">
           <h3>{{ proyecto.title }}
 Institución que la imparte: CENIDET
 Temática: Tecnología 4.0
 Subtemática: Software como servicio
 Número de Alumnos Permitidos: 2
 Modalidad: Híbrida
 Profesor: ALFREDO TERRAZAS PORCAYO
 Fecha de Creación de Proyecto: 2022-11-18</h3>
         </div>
       </div>
     </div>
   </body>
 </main>
 </template>
 
 <script>
  import { Link } from '@inertiajs/inertia-vue3'
   import 'sweetalert2/dist/sweetalert2.min.css';
   import axios from 'axios';
   import AppLayout from "@/Layouts/AppLayout.vue";
   import JetLabel from "@/Jetstream/Label.vue";
   import JetInput from "@/Jetstream/Input.vue";
   import JetInputError from "@/Jetstream/InputError.vue";
   import JetButton from "@/Jetstream/Button.vue";
   import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
   import Head from '@/Jetstream/Head.vue';
   
     
     
     export default {
       name: "Create",
       props: ['proyectos'],
       components: {
         AppLayout,
         Head,
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
 .cardproyectos{
     border-color: black;
     background-color: aqua;
     height: 350px;
     margin-left: 50px;
     width: 400px;
     
   }
 
   .info{
     background-color: blueviolet;
     margin-left: 30px;
     width: 357px;
     margin-top: -340px;
   }
 
   .vertical {
     writing-mode: vertical-lr;
     transform: rotate(180deg);
     background-color: rgb(8, 8, 102);
     color: azure;
     height: 340px;
     width: 25px;
     margin-left: 8px ;
     text-align: center;
 }
 
 .ver{
   background-color: red;
   height: 350px;
   width: 40px;
   margin-left: -12px;
 }
 
 aside{
   margin: 0;
   padding: 0;
   background-color: #0fb3ff;
 }
 
 .row{
   
 }
 </style>