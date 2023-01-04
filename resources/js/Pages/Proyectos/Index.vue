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
        <div class="col-md-12 pe-0">
          <div class="card-body border-right border-bottom p-3 h-100">
            <div v-if="$page.props.flash.success" class="alert alert-success" role="alert">
              {{ $page.props.flash.success }}
            </div>
            <div class="mb-2 d-flex justify-content-start">
              <Link
                :href="route(`${routeName}create`)"
                class="btn btn-outline-secondary btn-sm"
              >
                <i class="bi bi-plus"></i>
                Agregar Proyecto
              </Link>
              <div class="input-group w-50 ml-2">
                <input
                  type="text"
                  class="
                    form-control form-control-sm form-control
                    bg-light
                    shadow-sm
                  "
                  placeholder="Ingrese un parámetro de búsqueda"
                  v-model="filters.search"
                  @change="search"
                />
                <div class="input-group-append input-group-append-sm">
                  <button
                    @click="search"
                    class="btn btn-outline-secondary btn-sm"
                  >
                    <i class="bi bi-search"></i>
                  </button>
                </div>
              </div>
              <select
                @change="search"
                class="
                  custom-select-sm custom-select
                  bg-light
                  shadow-sm
                  border-0
                  w-25
                  ml-2
                "
                v-model="filters.status"
              >
                <option :value="true">Activos</option>
                <option :value="false">Eliminados</option>
              </select>
            </div><br>

            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Clave</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in proyectos.data" :key="item.id">
                    <td>{{ item.titulo }}</td>
                    <td>{{ item.objectgeneral }}</td>
                    <td>{{ item.key }}</td>
                    <td>
                      <Link :href="route('proyectos.edit', item.id)">
                       <i class="bi bi-pencil" ></i> 
                      </Link>
                    </td>
                    <td>
                      <form action="">
                    <button
                    class="btn btn-outline-danger btn-sm"
                    type="button"
                    @click="eliminar(item.id)"
                  >
                    <i class="bi bi-trash"></i> Eliminar Registro
                  </button>
                </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <RecordsHelper
            :thereAreResults="thereAreResults"
            :loadingResults="loadingResults"
          />
            <pagination :links="proyectos.links" :total="proyectos.total" />
            
          </div>
        </div>
      </div>
    </div>  
</template>
    

<script>
    import AppLayout from "@/Layouts/AppLayout.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import Pagination from "@/Shared/Pagination.vue";
    import RecordsHelper from "@/Shared/RecordsHelper.vue";
    import { computed, onMounted, reactive, toRefs, watch } from "vue";
    import { Inertia } from "@inertiajs/inertia";
    import Input from "@/Jetstream/Input.vue";
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
    import { ref } from "vue";
    import Swal from 'sweetalert2';
    import { useForm } from "@inertiajs/inertia-vue3";
    import JetLabel from "@/Jetstream/Label.vue";
    import JetInput from "@/Jetstream/Input.vue";
    import JetInputError from "@/Jetstream/InputError.vue";
    import JetButton from "@/Jetstream/Button.vue";
    import 'sweetalert2/dist/sweetalert2.min.css';
    
    export default {
        name: "Index",
        props: {
            titulo: { type: String, required: true },
            routeName: { type: String, required: true },
            proyectos: { type: Object, required: true },
            loadingResults: { type: Boolean, required: true, default: true },
            search: { type: String, required: true },
            status: { type: Boolean, required: true, default: true },
        },
        components: {
            AppLayout,
            Link,
            RecordsHelper,
            Pagination,
            Input,
            JetDropdownLink,
            JetLabel,
            JetInput,
            JetInputError,
            JetButton,
        },


        setup(props) {
          const form = useForm({ ...props.proyectos });
            const thereAreResults = computed(() => props.proyectos.total > 0);
            const state = reactive({
                filters: {
                    page: props.proyectos.current_page,
                    search: props.search,
                    status: props.status ?? 1,
                },
            });
            const search = () => {
                props.loadingResults = true;
                Inertia.replace(route(`${props.routeName}index`, state.filters));
            };

            const eliminar = (idel) => {
              Swal.fire({
              title: "¿Esta seguro?",
              text: "Esta acción no se puede revertir",
              icon: "warning",
              showCancelButton: true,
              cancelButtonColor: "#d33",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "Si!, eliminar registro!",
            }).then((res) => {
              if (res.isConfirmed) {
                form.delete(route("proyectos.destroy", idel));
              }
            });
          };

          return {
                ...toRefs(state),
                search,
                thereAreResults,
                eliminar,
                form
            };
        },
    }
</script>
    
    
<style scoped>

  :root{
    --main-color: rgb(23, 33, 123);
    --second-color:rgba(29, 43, 172, 0.795);
    --black: #000000;
    --white: #ffffff;
  }

  .forma1{
  width: 85%;
  border-radius: 20px;
  /*sizing: border-box;*/
  background-color: #ffffff;
  margin-top: 10%;
  margin-left: 8%;
  }

  .contenido{
    background-color: #ffffff;
  }

  .forma{
    padding: 0px;
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
</style>