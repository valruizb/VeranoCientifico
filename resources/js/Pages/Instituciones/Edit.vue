<template>
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
        <link rel="stylesheet" media="screen" href="/assets/vendor/boxicons/css/boxicons.min.css"/>
     
        <!-- Main Theme Styles + Bootstrap -->
        <link rel="stylesheet" media="screen" href="/assets/css/theme.min.css">
      
      </head>
      <header class="header navbar navbar-expand-lg navbar-light bg-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" id="logo">
          <img src="../../../../public/img/logo.png" width="47" alt="Silicon">
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
              <a id="lista" :href="route('registro.create')" class="nav-link">Mis proyectos</a>
            </li>
            <li class="nav-item">
              <a id="lista" :href="route('registro.create')" class="nav-link">Reportes</a>
            </li>
            <div id="auth" class="dropdown order-lg-3 ms-4">
              <li class="dropdown" id="cont">
          <a href="#" class="d-flex nav-link p-0" data-bs-toggle="dropdown" >
            <img src="../../../../public/assets/img/avatar/09.jpg" class="rounded-circle" width="48" alt="Avatar">
      
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
    
        <div class="contenido">
            <div class="forma1">
              <h2 class="h4 font-weight-bold text-center">
                <br><i class="bi bi-bricks"></i> {{ titulo }}
              </h2>
              <div class="card-body border-right border-bottom p-3 h-100">
                  <form class="row g-3 needs-validation" @submit.prevent="guardar">
                    <div class="col-md-8">
                      <jet-label for="nombre" value="*Nombre del Proyecto:" /><br>
                      <jet-input id="nombre"
                        type="text" 
                        v-model="form.title " 
                        :class="{ 'is-invalid': form.errors.title  }" 
                        required 
                        placeholder="Nombre del proyecto"   />
                      <jet-input-error :message="form.errors.title " />
                    </div>
      
                    <div class="">
                      <jet-label for="Numero" value="*Número de alumnos:" /><jet-label for="modalidad" value="*Modalidad:" />
                      <jet-input
                        type="number"
                        v-model="form.studentnum"
                        :class="{ 'is-invalid': form.errors.studentnum }"
                        required
                        placeholder="Número de alumnos" />
                      <jet-input-error :message="form.errors.studentnum" />
  
                      
                      <select id="modalidad" :class="{'is-invalid':form.errors.modality}" v-model="form.modality">
                        <option disabled value="">Seleccione un elemento</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Virtual">Virtual</option>
                        <option value="Mixta">Mixta</option>
                      </select>
                    </div>
      
                    <div class="profesor">
                      <label for="tematica" >*Temática</label><label for="subtematica">*SubTemática</label>
                      <select id="tematica" :class="{'is-invalid':form.errors.thematic_id}" v-model="form.thematic_id">
                        <option disabled value="">Seleccione un elemento</option>
                        <option v-for="tema in tem"  v-bind:value="tema.id" v-bind:key="tema.id">{{ tema.name }}</option>
                      </select>
  
                      
                      <select id="subtematica" :class="{'is-invalid':form.errors.subthematic_id}" v-model="form.subthematic_id">
                        <option disabled value="">Seleccione un elemento</option>
                        <option v-for="sub in subtem" v-bind:value="sub.id" v-bind:key="sub.id">{{ sub.name }}</option>
                      </select>
                    </div>
      
                    <div class="col-md-8">
                      <jet-label for="objetivo" value="*Objetivo general:" />
                      <jet-input id="objetivo" type="text" v-model="form.generalobject" :class="{ 'is-invalid': form.errors.generalobject }"  
                      required  placeholder="Objetivo General" />
                      <jet-input-error :message="form.errors.generalobject" />
                    </div>
      
                    <div class="col-md-8">
                      <jet-label for="requisitos" value="*Requisitos:" />
                      <jet-input
                        id="requisitos"
                        type="text"  v-model="form.requirements" :class="{ 'is-invalid': form.errors.requirements }" required  placeholder="Requisitos" />
                      <jet-input-error :message="form.errors.requirements" />
                    </div>

                    <div class="col-md-8">
                      <jet-label for="requisitos" value="*Palabras clave:" />
                      <jet-input
                        id="requisitos"
                        type="text" 
                        v-model="form.keywords"
                        :class="{ 'is-invalid': form.errors.keywords }"
                        required
                        placeholder="Requisitos"
                      />
                      <jet-input-error :message="form.errors.keywords" />
                    </div>
      
                    <div class="px-6 py-4">
                      <Link
                        :href="route(`${routeName}index`)"
                        class="btncancelar btn btn-outline-secondary me-4">
                        <i class="bi bi-chevron-left"></i> Cancelar
                      </Link>
                      <jet-button
                        @click="guardar"
                        class="btnguardar btn btn-outline-secondary "
                        :class="{ 'text-white-50': form.processing }"
                        :disabled="form.processing">
                        <i class="bi bi-save"></i> Guardar
                      </jet-button>
                    </div>
                  </form>
              </div>
          </div>             
        </div>
    </template>
    
    <script>
    import AppLayout from "@/Layouts/AppLayout.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import JetLabel from "@/Jetstream/Label.vue";
    import JetInput from "@/Jetstream/Input.vue";
    import JetInputError from "@/Jetstream/InputError.vue";
    import JetButton from "@/Jetstream/Button.vue";
    import { useForm } from "@inertiajs/inertia-vue3";
    import 'sweetalert2/dist/sweetalert2.min.css';
    import { defineComponent } from 'vue'
    import { Head} from '@inertiajs/inertia-vue3'
    import Swal from 'sweetalert2';
    import 'sweetalert2/dist/sweetalert2.min.css';
    import axios from 'axios';
    import { ref } from "vue";
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue'
    
    export default {
      name: "Edit",
      props: {
        titulo: { type: String, required: true },
        proyectos: { type: Object, required: true },
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
      },
      setup(props) {
        const form = useForm({ ...props.proyectos });
        const guardar = () => {
          form.put(route("proyectos.update", props.proyectos.id));
        };
        return { form, guardar};
      },
    };
    </script>
    
    
    <style scoped>
    
      :root{
        --main-color: rgb(23, 33, 123);
        --second-color:rgba(29, 43, 172, 0.795);
        --black: #000000;
        --white: #ffffff;
      }
    
      /* FORMULARIO */
    
      .btncancelar{
        background-color: #920707;
        color: #ffffff;
      }
    
      .btnguardar{
        background-color: #092252;
        color: #ffffff;
      }

      form input[type="number"], select{
      display: inline;
      border-color: rgba(3, 3, 3, 0.466);
      background-color:#2b4f7400  ;
      color: #000000;
      width: 45%;
      padding: 11px;
      margin: 15px;
      margin-top: -28px;
      border-radius: 6px;
    }

    form input[id="objetivo"], [id="requisitos"], [id="nombre"] {
      display: inline;
      border-color: rgba(3, 3, 3, 0.466);
      background-color:#2b4f7400  ;
      color: #000000;
      width: 55rem;
      padding: 11px;
      margin: 17px;
      margin-top: -28px;
      border-radius: 6px;
    }

    form select[id="tematica"], [id="subtematica"]{
        display: inline;
      border-color: rgba(3, 3, 3, 0.466);
      background-color:#2b4f7400  ;
      color: #000000;
      width: 45%;
      padding: 11px;
      margin: 15px;
      margin-top: -28px;
      border-radius: 6px;
    }

    form label[for="modalidad"],[for="Numero"], [for="objetivo"], [for="requisitos"], [for="nombre"], [for="tematica"], [for="subtematica"]{
      padding: 0px;
      margin: 18px;
      width: 30%;
      margin-left: 20px;
      margin-right: 150px;
      font-weight:bold;
      color: #092252;
      font-size: 16px;
    }

    form label[for="tematica"], [for="subtematica"]{
      padding: 0px;
      margin: 18px;
      width: 30%;
      margin-left: 20px;
      margin-right: 155px;
      font-weight:bold;
      color: #092252;
      font-size: 16px;
    }

      .forma1{
      width: 65%;
      border-radius: 20px;
      box-sizing: border-box;
      background-color: #ffffff;
      margin-top: 10%;
      margin-left: 17%;
      box-shadow: 10px 14px 14px 20px #cbced1, -14px -14px 20px rgba(216, 213, 213, 0.137);
      }
    
      .contenido{
        background-color: #ffffff;
      }
    
    
      [id="cuenta"]:hover{
        background-color: #c90c0cec;
        color: rgb(255, 255, 255);
        font-style: bold;
      }
    
      [id="btn"]:hover, [id="guardar"]:hover{
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
    
      [id="guardar"]{
        background-color: #092252;
        color: rgb(255, 255, 255);
        width: 16%;
        padding: 12px;
        margin-left:10%;
        border-radius: 10px;
        margin-right: -8%;
        outline: none;
        border: #092252;
      }
    
      i[id="boxi2"]{
        font-size: 21px;
        padding: 5px;
      }
    
      i[id="boxi3"]{
        font-size: 17px;
        padding: 1px;
      }
    
      [id="guardar"]:hover{
        background-color: rgba(6, 42, 107, 0.986);
        color: rgb(255, 255, 255);
        font-style: bold;
      }
    
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