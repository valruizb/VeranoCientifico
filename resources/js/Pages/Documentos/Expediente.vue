<template>
    <Head>   </Head>
  
    <Alumno> </Alumno>
   
  
  <body>
    <div class="forma1">

      <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="6%" class="col">Nombre del Documento</th>
                  <th width="25%" class="col">Nombre Archivo</th>
                  <th width="25%" class="col">Estado del Archivo</th>
                  <th width="9%" class="col">Ver</th>
                  <th width="9%" class="col">Aceptar</th>
                  <th width="9%" class="col">Rchazar</th>
                </tr>
              </thead>
              <tbody v-for="item in docs" :key="item.id">
                <tr>
                  <td>{{ item.name  }}</td>
                  <td>{{ item.name_doc }}</td>
                  <td>{{ item.status }}</td>
                  
                  <td><a :href="item.url" target="_blank">
                        <button title="Ver" :href="item.url" class="btn btn-info btn-sm">
                          <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
                        </button>&nbsp;&nbsp;  
                      </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
    
       
  
  </div>
  
  
  <!----<div class="no7 col-sm-3 mb-5">
      <button title="Ver" v-on:click="ver('request')" class="btn btn-info btn-sm">
        <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
      </button>&nbsp;&nbsp; 
      <button title="Ocultar" v-on:click="ocultar" class="btn btn-warning btn-sm">
        <i class='boxi bi bi-eye-slash-fill' style='color:#ffffff' ></i>
      </button>&nbsp;&nbsp;
      <button title="Borrar" v-on:click="borrar('request')" class="btn btn-danger btn-sm">
        <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
      </button> 
  </div>--->
  
  <!---<a :href="url" target="_blanck"><button class="ms-4 add btn btn-info" :src="url" >{{ documento1}}</button></a>-->
  
  
  <!--<div>
    <jet-input type="file" @change="previewRequest"  /> <input type="text" v-model="form.requestform" />
    <jet-input type="file" @change="previewAca" @input="form.academicdoc = $event.target.files[0]" /> <input type="text" v-model="form.academicdoc" />
    
  </div>
  
  <button v-on:click="ver('request')" id="enviar" class="ms-4 add btn btn-info">
    <i id="boxi3" class='bx bx-send' style='color:#ffffff' ></i> Ver
  </button> 
  
  <button v-on:click="ocultar" id="enviar" class="ms-4 add btn btn-info">
    <i id="boxi3" class='bx bx-send' style='color:#ffffff' ></i> Ocultar
  </button>
  <p> </p>
  
  <button v-on:click="ver('academic')" id="enviar" class="ms-4 add btn btn-info">
    <i id="boxi3" class='bx bx-send' style='color:#ffffff' ></i> Ver
  </button> 
  
  <button v-on:click="ocultar" id="enviar" class="ms-4 add btn btn-info">
    <i id="boxi3" class='bx bx-send' style='color:#ffffff' ></i> Ocultar
  </button>-->
  </body>
  </template>
  
  <script>
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
  import Alumno from "@/Jetstream/Alumno.vue";
  import Head from '@/Jetstream/Head.vue';
  export default {
  
    props: {
      titulo: { type: String, required: true },
      docs: { type: Object, required: true },

    },
  
    components: {
            Alumno,
            Head,
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
      const form = useForm({ 
        requestform: "",
        academicdoc: "",
        motivedoc: "",
        ine: "",
        cvu: "",
        foto: "",
        ver:"",
      });
  
      const guardar = () => {
        form.post(route("docuser.store"));
      };
  
      return {guardar, form};
    },
  
  
    
  }
  </script>
  <style scoped>
  
  .forma1{
  width: 90%;
  border-radius: 20px;
  box-sizing: border-box;
  background-color: #ffffffef;
  margin-top: 10%;
  margin-left: 5%;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px rgba(216, 213, 213, 0.137);
  display: flex;
  }
  
  h2{
  text-align: center;
  }
  
  .formulario{
    padding: 0px 0px 0px 20px;
  }
  
  body{
    margin: 0;
  }
  
  p{
    margin-bottom: 0 ;
    font-size: 15px;
  }
  .h2pro{
    margin-bottom: 0;
  }
  
  a{
    text-decoration: none;
  }
  
  button[id="cuenta"]{
    text-decoration: none;
  }
  
  .add{
    font-size: 15px;
  }
  
  .boxi{
    font-size: 18px;
  }
  
  .info{
    padding: -10px 20px 0px 0px;
  }
  
  .pestana{
    width: 40%;
    border-bottom: 1px solid rgb(12, 12, 12);
    background-color:rgb(3, 3, 51); 
  }
  
  .no1{
    margin-left: 75%;
    margin-top: -57.5%;
  }
  
  .no2{
    margin-left: 75%;
    margin-top: 2.5%;
  }
  
  .no3{
    margin-left: 75%;
    margin-top: 2.9%;
  }
  
  .no4{
    margin-left: 75%;
    margin-top: 2.6%;
  }
  
  .no5{
    margin-left: 75%;
    margin-top: 2.6%;
  }
  .no6{
    margin-left: 75%;
    margin-top: 2.6%;
  }
  </style>