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
      <img src="../../../../public/img/logo.png" width="47" alt="Silicon">
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
          <a id="lista" :href="route('registro.create')" class="nav-link">Acerca del Verano</a>
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
</header>

  <div class="contenido">
    <div class="forma1">
      <jet-validation-errors class="mb-3"/>
      <div class="forma2"> 
        
      <form @submit.prevent="guardar">
        <div class="forma">
          <label for="tipouser">*Tipo de Usuario</label>
          <select class="" id="tipouser" :class="{'is-invalid':form.errors.tipouser}" v-model="form.tipouser">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="rol in roles" v-bind:value="rol.id" v-bind:key="rol.id">{{ rol.name }}</option>
            </select>
          </div>

        <div class="forma">
          <label for="nombre">*Nombre(s)</label> <label for="apellidop">*Apellido Paterno</label><label for="apellidom" >*Apellido Materno</label> 
          <input  :class="{ 'is-invalid': form.errors.nombre }" id="nombre" type="text"  v-model="form.nombre"  required autofocus placeholder="Teclee su Nombre" >
          <input  :class="{ 'is-invalid': form.errors.apellidop }" id="apellidop" type="text"  v-model="form.apellidop" required autofocus placeholder="Teclee su Apellido Paterno" > 
          <input  :class="{ 'is-invalid': form.errors.apellidom }" id="apellidom" type="text"  v-model="form.apellidom" required autofocus placeholder="Teclee su Apellido Materno" >
        </div>

        <div class="forma">
          <label for="curp" value="CURP*" >*CURP</label><label for="correo" >*Correo</label><label for="correocon">*Confirmar correo</label> 
          <input  :class="{ 'is-invalid': form.errors.curp }" id="curp" type="text"  v-model="form.curp" required autofocus placeholder="Teclee su Curp" />
          <input  id="correo" type="email"  v-model="form.correo" required autofocus placeholder="Teclee su Correo" />
          <input  id="correocon" type="email"  v-model="form.correocon" required autofocus placeholder="Teclee nuevamente su Correo" />
        </div>

        <div class="forma">
          <label for="telefono">*Teléfono</label><label for="institucionproced">*Institución de procedencia</label><label for="password">*Contraseña</label><br>
          <input  id="telefono" type="text"  v-model="form.telefono" required autofocus placeholder="Teclee su Número de Telefono" />
          <select id="institucionproced" v-model="form.institucionproced">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="item in instituto" v-bind:value="item.id" v-bind:key="item.id">{{ item.name }}</option>
          </select>
          <input id="password" type="password" v-model="form.password" required placeholder="Teclee su Contraseña" />
        </div>
        
        <div class="forma">
          <label for="password_confirmation">*Confirmar contraseña</label><br>
          <input id="password_confirmation" type="password" v-model="form.password_confirmation" required placeholder="Teclee Nuevamente su Contraseña" />
        </div>

        <div class="profesor" v-if="form.tipouser === 2">
          <label for="areaconoc" >*Área de conocimiento</label><label for="subareaconoc">*Subarea de conocimiento</label><br>
          <select id="areaconoci" :class="{'is-invalid':form.errors.areaconoc}" v-model="form.areaconoc">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="tema in tematica"  v-bind:value="tema.id" v-bind:key="tema.id">{{ tema.name }}</option>
          </select>
          <select id="subareaconoc" :class="{'is-invalid':form.errors.subareaconoc}" v-model="form.subareaconoc">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="sub in subtematica" v-bind:value="sub.id" v-bind:key="sub.id">{{ sub.name }}</option>
          </select>
        </div>

        <!---<div class="forma" v-if="form.tipouser === 2">
          <label for="gradomax">*Grado Maximo de Estudios</label><label for="lineainv">*Su Línea de Investigación</label><label for="nivelsni">Nivel SNI*</label><label for="puesto">*Puesto que desempeña</label>
          <input  id="nivelsni" type="text"  v-model="form.extension" required autofocus placeholder="Teclee su Nivel SNI" />         
          <input  id="gradomax" type="text"  v-model="form.gradomax" required autofocus placeholder="Teclee su Máximo Grado de Estudios" />
          <input  id="lineainv" type="text"  v-model="form.lineainv" required autofocus placeholder="Teclee su Línea de Investigación" />
          <input  id="puesto" type="text"  v-model="form.puesto" required autofocus placeholder="Teclee su Puesto que Desempeña" />
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="constancia">*Constancia</label><label for="password">*Contraseña</label><label for="password_confirmation">*Confirmar contraseña</label>
          <input  id="constancia" type="text"  v-model="form.constancia" required autofocus autocomplete="constancia" />

          <input id="password_confirmation" type="password" v-model="form.password_confirmation" required placeholder="Teclee Nuevamente su Contraseña" />
        </div>

        <div class="forma" v-if="form.tipouser === 3">
          <label for="formatosolicitud">*Formato de solicitud</label><label for="password">*Contraseña</label><label for="password_confirmation">*Confirmar contraseña</label>
          <input  id="formatosolicitud" type="text"  v-model="form.formatosolicitud" required autofocus autocomplete="formatosolicitud" />

          <input id="password" type="password" v-model="form.password" required placeholder="Teclee su Contraseña" />

          <input id="password_confirmation" type="password" v-model="form.password_confirmation" required placeholder="Teclee Nuevamente su Contraseña" />
        </div>-->

        <div class="forma">
          <label 
          for="password" 
          value="Password" 
          v-if="form.password != form.password_confirmation" 
          >No coinciden las Contraseñas*</label>
        </div>

        <div class="forma" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
          <div class="custom-control custom-checkbox">
            <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

            <label class="custom-control-label" for="terms">
              I agree to the <a target="_blank" :href="route('terms.show')">Terms of Service</a> and <a target="_blank" :href="route('policy.show')">Privacy Policy</a>
            </label>
          </div>
        </div>

        <div class="info">
            <!---<Link :href="route('login')" class="link">
              Already registered?
            </Link>-->
            <a :href="route('login')" id="cuenta" class="btn btn-primary"><i class="bi bi-box-arrow-in-right"></i>  ¿Ya tienes cuenta?</a>

            <button @click="guardar" id="guardar" :class="{ 'text-white-50': form.processing }" :disabled="form.password != form.password_confirmation">
                <i class="bi bi-save"></i> Guardar
            </button>
        </div><br>
      </form>
    </div>
    </div>
  </div><br>
</template>

<script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetButton from '@/Jetstream/Button.vue'
import JetInput from '@/Jetstream/Input.vue'
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from '@/Jetstream/Label.vue'
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Head, Link } from '@inertiajs/inertia-vue3'
import { useForm } from "@inertiajs/inertia-vue3";
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from 'axios';


export default{
  name: "Register",
  props: {
    tematica: { type: Object, required: true },
    roles: {type: Object, required: true},
    instituto: {type: Object, required: true},
    subtematica: {type:Object, required:true},

  },

  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link,
  },
    
  setup(props) {
    const form = useForm({ 
      tipouser: "", 
      nombre: "",
      apellidop: "", 
      apellidom:"", 
      correo:"", 
      curp:"",
      correocon:"", 
      telefono:"", 
      institucionproced:"", 
      formatosolicitud:"", 
      areaconoc:"", 
      subareaconoc:"",  
      nivelsni:"",  
      gradomax:"",  
      lineainv:"",  
      puesto:"",  
      constancia:"", 
      password:"", 
      password_confirmation:""});
    const guardar = () => {
      form.post(route("registro.store"));
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

  .forma1{
  width: 75%;
  border-radius: 20px;
  box-sizing: border-box;
  background-color: #ffffff;
  margin-top: 10%;
  margin-left: 13%;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px rgba(216, 213, 213, 0.137);
  }

  .contenido{
    background-color: #ffffff;
  }

  .forma{
    padding: 0px;
  }

  form input[type="text"],[type="email"], [type="password"], select{
    display: inline;
    border-color: rgba(39, 38, 38, 0.363);
    background-color:#f6f7f800  ;
    width: 30%;
    padding: 11px;
    margin: 17px;
    margin-top: -28px;
    border-radius: 6px;
  }

  form input[id=""],[id="areaconoci"], [id="subareaconoc"]{
    border-color: rgba(39, 38, 38, 0.363);
    width: 45%;
    padding: 0px 120px 0px 0px;
    padding: 15px;
    margin: 18px;
    margin-top: -28px;
    border-radius: 6px;
  }

  form label[for="subareaconoc"],[for="areaconoc"], [for="subarea"]{
    margin: 18px;
    width: 45%;
    font-weight:bold;
    color: black;
    font-size: 16px;
  }

  .profesor{
    margin-top: -10%;
    padding: 0px 10px 10px 365px;
    margin-left: 5px;
   }

  form label[for="nombre"],[for="apellidop"], [for="apellidom"], [for="tipouser"], [for="formatosolicitud"], [for="puesto"], [for="constancia"], [for="password_confirmation"], [for="password"], [for="curp"], [for="correo"],[for="correocon"],[for="telefono"],[for="rfc"], [for="institucionproced"], [for="extension"], [for="nivelsni"], [for="gradomax"], [for="lineainv"]{
    padding: 0px 257px 0px 0px;
    padding: 0;
    margin: 19px;
    width: 30%;
    margin-left: 15px;
    font-weight:bold;
    color: black;
    font-size: 16px;
  }

  .info{
    margin-left: 20px;
    padding: 10px 0px 5px 0px;
  }

  [id="btn"], [id="cuenta"]{
    background-color: #092252;
    color: rgb(255, 255, 255);
    width: 16%;
    border-radius: 10px;
    padding: 12px;
    margin-left: 40px;
    margin-right: -8%;
  }

  [id="btn"]:hover, [id="cuenta"]:hover{
    background-color: rgba(6, 42, 107, 0.986);
    color: rgb(255, 255, 255);
    font-style: bold;
  }

  [id="btn"]:hover, [id="cuenta"]:hover{
    background-color: rgba(6, 42, 107, 0.986);
    color: rgb(255, 255, 255);
    font-style: bold;
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

  
</style>