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
        
      <!---<a target="blank" href="https://api.whatsapp.com/send?phone=7774525374&text=Hola,%20%C2%BFme%20puedes%20apoyar?" class="circulo"><i class='bx bxl-whatsapp'></i></a>-->
        
      <div class="forma1">

        <div class="alumno" v-if="form.tipouser === 4"><br>
          <h2>Solicitud de Registro para Estudiantes</h2><br>
          <p>Para registrarte en algunas de las temáticas del verano debes primero tener un perfil.</p>
          <p>Ingresa la siguiente información para crearlo. Posteriormente, revisa la bandeja de entrada</p>
          <p>del correo proporcionado y activa tu cuenta. Dependiendo de la configuración del correo</p> 
          <p>proporcionado, puede ser que dicho correo se encuentre en su Spam.</p><br><br>
        </div>

        <div class="revisor" v-if="form.tipouser === 3"><br>
          <h2>Solicitud de Registro para Revisores Institucionales</h2><br>
          <p>Para registrarte en algunas de las temáticas del verano debes primero tener un perfil.</p>
          <p>Ingresa la siguiente información para crearlo. Posteriormente, revisa la bandeja de entrada</p>
          <p>del correo proporcionado y activa tu cuenta. Dependiendo de la configuración del correo</p> 
          <p>proporcionado, puede ser que dicho correo se encuentre en su Spam.</p><br>
          <a target="_blank" href="https://docs.google.com/document/d/1WzD9VWNIoyt1FG8hrDlhd6KOn8KFq4Gq/edit"><button type="button" class="btn btn-info"><i id="boxi2" class='bx bxs-file-pdf'></i> Descargar Formato de Solicitud de Participación</button></a><br><br><br>
        </div>

        <div class="profesor2" v-if="form.tipouser === 2"><br>
          <h2 class="h2pro">Solicitud de Registro para Profesores Nuevo</h2>
          <h2 class="h2pro">Ingreso</h2><br>
          <p>Ingresa los siguientes datos. Posteriormente, el Administrador validará tu cuenta. Una vez</p>
          <p>que te notifique el Administrador que tu cuenta ya fue activada, ya podrás empezar a crear</p>
          <p>proyectos.</p><br><br>
        </div>

        <jet-validation-errors class="mb-3"/>
        <div class="forma2"> 
          
        <form @submit.prevent="guardar" enctype="multipart/form-data">
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
            <select id="institucionproced" v-model="form.institution_id">
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
            <select id="areaconoci" :class="{'is-invalid':form.errors.thematic_id}" v-model="form.thematic_id">
              <option disabled value="">Seleccione un elemento</option>
              <option v-for="tema in tematica"  v-bind:value="tema.id" v-bind:key="tema.id">{{ tema.name }}</option>
            </select>
            <select id="subareaconoc" :class="{'is-invalid':form.errors.subareaconoc}" v-model="form.subthematic_id">
              <option disabled value="">Seleccione un elemento</option>
              <option v-for="sub in subtematica" v-bind:value="sub.id" v-bind:key="sub.id">{{ sub.name }}</option>
            </select>
          </div>

          <div class="forma" v-if="form.tipouser === 2">
            <label for="gradomax">*Grado Maximo de Estudios</label><label for="lineainv">*Su Línea de Investigación</label><label for="nivelsni">Nivel SNI*</label>
            <input  id="nivelsni" type="text"  v-model="form.extension" required placeholder="Teclee su Nivel SNI" />         
            <input  id="gradomax" type="text"  v-model="form.gradomax" required  placeholder="Teclee su Máximo Grado de Estudios" />
            <input  id="lineainv" type="text"  v-model="form.lineainv" required  placeholder="Teclee su Línea de Investigación" />
          </div>

          <div class="forma" v-if="form.tipouser === 2">
            <label for="puesto">*Puesto que desempeña</label><label for="constancia">*Constancia</label><br>
            <input  id="puesto" type="text"  v-model="form.puesto" required  placeholder="Teclee su Puesto que Desempeña" />
            <input id="constancia"
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                type="file" @input="form.constancia = $event.target.files[0]" />
                <jet-input-error :message="form.errors.constancia" />
               
          </div>         
    
          <div class="revisorins" v-if="form.tipouser === 3">
            <label for="formatosolicitud">*Formato de solicitud</label><br>
            <input id="formatosolicitud"
                class="block w-full text-lg text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                type="file" @input="form.formatosolicitud = $event.target.files[0]" />
                <jet-input-error :message="form.errors.formatosolicitud" />
          </div>

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
              <a :href="route('login')"><button id="cuenta" type="button" class="btn btn-info"><i id="boxi3" class="bi bi-box-arrow-in-right"></i> ¿Ya tienes cuenta?</button></a>

              <button @click="guardar" id="guardar" :class="{ 'text-white-50': form.processing }" :disabled="form.password != form.password_confirmation">
                  <i id="boxi3" class="bi bi-save"></i> Guardar
              </button>
          </div><br>
        </form>
      </div>
    </div>
  </div><br><br><hr><br><br><br>
        <div class="pie">
          <h1>Accede a Nuestro Sistema o </h1>
          <h1>Suscríbete</h1><br>
          <p>© Todos los derechos Reservados. Hecho con por el <i class='bx bxs-heart bx-flashing' style='color:#f30909'></i> <a id="linktec" target="blank" href="https://cenidet.tecnm.mx/">TecNM/Cenidet</a></p><br><br>
        </div>
  </template>

  <script>
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
        institution_id:"", 
        formatosolicitud:"", 
        thematic_id:"", 
        subthematic_id:"",  
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

    form select[id="areaconoci"], [id="subareaconoc"]{
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

    .revisorins{
      margin-top: -10%;
      padding: 0px 10px 10px 365px;
      margin-left: 5px;
    }

    form label[for="nombre"],[for="apellidop"], [for="apellidom"], [for="tipouser"], [for="puesto"], [for="constancia"], [for="password_confirmation"], [for="password"], [for="curp"], [for="correo"],[for="correocon"],[for="telefono"],[for="rfc"], [for="institucionproced"], [for="extension"], [for="nivelsni"], [for="gradomax"], [for="lineainv"]{
      padding: 0px 257px 0px 0px;
      padding: 0;
      margin: 19px;
      width: 30%;
      margin-left: 15px;
      font-weight:bold;
      color: black;
      font-size: 16px;
    }

    form label[for="formatosolicitud"]{
      margin: 18px;
      width: 45%;
      font-weight:bold;
      color: black;
      font-size: 16px;
    }

    form input[id="formatosolicitud"], input[for="constancia"]{
      border-color: rgba(39, 38, 38, 0.363);
      width: 95%;
      padding: 0px 120px 0px 0px;
      padding: 11px;
      margin: 18px;
      margin-top: -28px;
      border-radius: 6px;
    }

    .info{
      margin-left: -17px;
      padding: 10px 0px 5px 0px;
    }

    [id="cuenta"]{
      background-color: #a70d0d;
      color: rgb(255, 255, 255);
      width: 16%;
      border-radius: 10px;
      padding: 12px;
      margin-left: 40px;
      margin-right: -8%;
      border: #a70d0d;
    }

    a{
      text-decoration: none;
    }

    a[id="linktec"]{
      text-decoration:underline;
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

    .alumno, .revisor, .profesor2{
      text-align: center;
    }

    p{
      margin-bottom: 0 ;
      font-size: 18px;
    }

    .h2pro{
      margin-bottom: 0;
    }

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
  </style>