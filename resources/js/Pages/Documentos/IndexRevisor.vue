<template>
    <Head>   </Head>

    <Revisor> </Revisor>


  <body>
    <div class="forma1">

        <jet-validation-errors class="mb-3"/>
        <div class="formulario forma2">
            <form @submit.prevent="guardar">
            br><h2><i class='bx bxs-up-arrow-square bx-flashing' style='color:#04023f' ></i> Revision de expedientes</h2><br>
            <p>A continuación se pide verificar cuidadosamente cada uno de los documentos que le ha enviado el alumno.</p><br>
            <div v-for="item in docs" class="col-sm-8 mb-5">
                <jet-label class="label form-label fs-base" :value="item.name" />&nbsp;&nbsp;&nbsp;&nbsp;
                <a :href="item.url" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                    <i class='boxi bi bi-eye-fill' style='color:#ffffff'></i>
                </button>&nbsp;&nbsp;  </a>
                <br>




        </div>
        <jet-input id="foto" type="text" v-model="form.status" />
        <jet-label class="label form-label fs-base" value="Estado del Expediente: " /> &nbsp;&nbsp;
        <br>
        <jet-label class="label form-label fs-base" value="Aceptado" /> &nbsp;&nbsp;
        <input name="estado" value="Aceptado" type="radio" v-model="form.status">
        <br>

        <jet-label class="label form-label fs-base" value="Rechazado" /> &nbsp;&nbsp;
        <input name="estado" value="Rechazado" type="radio" v-model="form.status">
        <br>


        <jet-label class="label form-label fs-base" value="Observaciones Expediente: " /> &nbsp;&nbsp;

        <textarea name="comentario" v-model="form.comments"></textarea>
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
      status: {type: String, required: true}
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
        status: props.status,
        comments: '',
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