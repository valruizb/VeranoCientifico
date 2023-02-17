<template>
    <Head>   </Head>
  
    <Revisor> </Revisor>
   
  
  <body>
    <div class="forma1">
    
      <jet-validation-errors class="mb-3"/>
      <div class="formulario forma2"> 
      <form @submit.prevent="guardar">
        <br><h2><i class='bx bxs-up-arrow-square bx-flashing' style='color:#04023f' ></i> Revision de expedientes</h2><br>
        <p>A continuación se pide verificar cuidadosamente cada uno de los documentos que le ha enviado el alumno.</p><br>
          <div class="col-sm-8 mb-5">
                    <jet-label class="label form-label fs-base" value="Documento: Formato solicitud" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <a :href="docs[0].url" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                      <i class='boxi bi bi-eye-fill' style='color:#ffffff'></i>
                    </button>&nbsp;&nbsp;  </a>
                    <br>
                    <br>
                    <jet-label class="label form-label fs-base" value="Estado del documento: " /> &nbsp;&nbsp;
                    <select required v-model="form.requestform" class="form-select form-select-sm w-50 p-2" > 
                      <option disable value="Cargado" >Seleccione el estado</option>
                      <option value="Aceptado"> Aceptado</option>
                      <option value="Rechazado">Rechazado</option>
                    </select>
                    

          </div>
  
          <div class="col-sm-8 mb-5">
                    <jet-label class="label form-label fs-base" value="Documento: Carta academica" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <a :href="docs[1].url" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
                    </button>&nbsp;&nbsp;  </a>
                    <br><br>
                    <jet-label class="label form-label fs-base" value="Estado del documento: " /> &nbsp;&nbsp;
                    <select required v-model="form.academicdoc" class="form-select form-select-sm w-50 p-2" > 
                      <option value="Cargado" disabled>Seleccione el estado</option>
                      <option value="Aceptado"> Aceptado</option>
                      <option value="Rechazado">Rechazado</option>
                    </select>
          </div>
  
          <div class="col-sm-8 mb-5">
                    <jet-label class="label form-label fs-base" value="Documento: Carta motivos" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <a :href="docs[2].url" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
                    </button>&nbsp;&nbsp;  </a>
                    <br><br>
                    <jet-label class="label form-label fs-base" value="Estado del documento: " /> &nbsp;&nbsp;
                    <select required v-model="form.motivedoc" class="form-select form-select-sm w-50 p-2" > 
                      <option value="Cargado" disabled>Seleccione el estado</option>
                      <option value="Aceptado"> Aceptado</option>
                      <option value="Rechazado">Rechazado</option>
                    </select>
          </div>
          <div class="col-sm-8 mb-5">
                    <jet-label class="label form-label fs-base" value="Documento: INE" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <a :href="docs[3].url" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
                    </button>&nbsp;&nbsp;  </a>
                    <br><br>
                    <jet-label class="label form-label fs-base" value="Estado del documento: " /> &nbsp;&nbsp;
                    <select v-model="form.ine" class="form-select form-select-sm w-50 p-2" > 
                      <option value="Cargado" disabled>Seleccione el estado</option>
                      <option value="Aceptado"> Aceptado</option>
                      <option value="Rechazado">Rechazado</option>
                    </select>
  
          </div>
  
          <div class="col-sm-8 mb-5">
                    <jet-label class="label form-label fs-base" value="Documento: CVU" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <a :href="docs[4].url" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
                    </button>&nbsp;&nbsp;  </a>
                    <br><br>
                    <jet-label class="label form-label fs-base" value="Estado del documento: " /> &nbsp;&nbsp;
                    <select v-model="form.cvu" class="form-select form-select-sm w-50 p-2" > 
                      <option value="Cargado" disabled>Seleccione el estado</option>
                      <option value="Aceptado"> Aceptado</option>
                      <option value="Rechazado">Rechazado</option>
                    </select>
          </div>
          
          <div class="col-sm-8 mb-2">
                    <jet-label class="label form-label fs-base" value="Documento: Fotografía" />&nbsp;&nbsp;&nbsp;&nbsp;
                    <a :href="docs[5].url" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                      <i class='boxi bi bi-eye-fill' style='color:#ffffff'></i>
                    </button>&nbsp;&nbsp;  </a>
                    <br><br>
                    <jet-label class="label form-label fs-base" value="Estado del documento: " /> &nbsp;&nbsp;
                    <select v-model="form.foto" class="form-select form-select-sm w-50 p-2">
                      <option value="Cargado" disabled>Seleccione el estado</option>
                      <option value="Aceptado"> Aceptado</option>
                      <option value="Rechazado">Rechazado</option>
                    </select>
          </div>
    </form>
      <div class="info">
           <a :href="route('dashboard')"><button id="cuenta" type="button" class="ms-4 add btn btn-danger"><i id="boxi3" class='bx bx-arrow-back' style='color:#ffffff' ></i>Volver</button></a>
  
            <button id="guardar" class="ms-4 add btn btn-primary" :class="{ 'text-white-50': form.processing }">
              <div v-show="form.processing" class="spinner-border spinner-border-sm" role="status">
                 <span class="visually-hidden">Loading...</span>
               </div>  
              <i id="boxi3" class="bi bi-save"></i> Guardar
            </button>
  
            <button @click="guardar" id="enviar" class="ms-4 add btn btn-info" :class="{ 'text-white-50': form.processing }">
              <div v-show="form.processing" class="spinner-border spinner-border-sm" role="status">
                 <span class="visually-hidden">Loading...</span>
               </div>  
               <i id="boxi3" class='bx bx-send' style='color:#ffffff' ></i> Enviar
            </button> 
      </div><br>
      
      
  </div> 
  
  </div>
  

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
  import Revisor from "@/Jetstream/Revisor.vue";
  import Head from '@/Jetstream/Head.vue';
  export default {
  
    props: {
      titulo: { type: String, required: true },
      docs: { type: Object, required: true },
      alumn: { type: String, required: true },
    },
  
    components: {
            Revisor,
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
        requestform: props.docs[0].status,
        academicdoc: props.docs[1].status,
        motivedoc: props.docs[2].status,
        ine: props.docs[3].status,
        cvu: props.docs[4].status,
        foto: props.docs[5].status,
      });
  
      const guardar = () => {

        form.put(route("docuser.update", props.alumn));
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