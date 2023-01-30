<template>
    <Head>   </Head>

    <Alumno v-if="$page.props.user.rol == 1"> </Alumno>
   

<body>
  <div class="contenido">
    <!---<a target="blank" href="https://api.whatsapp.com/send?phone=7774525374&text=Hola,%20%C2%BFme%20puedes%20apoyar?" class="circulo"><i class='bx bxl-whatsapp'></i></a>-->
    <div class="forma1">
      <div class="pestana">
        PASO 1
      </div><br>
      <jet-validation-errors class="mb-3"/>
      
      <div class="formulario forma2"> 
      <form @submit.prevent="guardar" enctype="multipart/form-data">
        <div class=" row pb-5">
        <h2>Carga de documentos</h2><br>
        <p>A continuación se pide llenar el formulario con los respectivos documentos, lo más legible posible</p>
          <div class="col-sm-11 mb-5">
                    <jet-label class="label form-label fs-base" value="*Formato solicitud" />
                    <jet-input type="text" class="form-control form-control-lg" v-model="form.requestform" required  :class="{ 'is-invalid': form.errors.requestform }" />
                    <jet-input type="file" class="form-control form-control-lg" @input="form.requestform = $event.target.files[0]" required  :class="{ 'is-invalid': form.errors.requestform }" />
                    <jet-input-error :message="form.errors.requestform" />
          </div>

          <div class="col-sm-11 mb-5">
                    <jet-label class="label form-label fs-base" value="*Carta academica" />
                    <jet-input type="file" class="form-control form-control-lg" @input="form.academicdoc = $event.target.files[0]" required  :class="{ 'is-invalid': form.errors.academicdoc }" />
                    <jet-input-error :message="form.errors.academicdoc" />
          </div>

          <div class="col-sm-11 mb-5">
                    <jet-label class="label form-label fs-base" value="*Carta motivos" />
                    <jet-input type="file" class="form-control form-control-lg" @input="form.motivedoc = $event.target.files[0]" required  :class="{ 'is-invalid': form.errors.motivedoc }" />
                    <jet-input-error :message="form.errors.motivedoc" />
          </div>

          <div class="col-sm-11 mb-5">
                    <jet-label class="label form-label fs-base" value="*INE" />
                    <jet-input type="file" class="form-control form-control-lg" @input="form.ine = $event.target.files[0]" required  :class="{ 'is-invalid': form.errors.ine }" />
                    <jet-input-error :message="form.errors.ine" />
          </div>

          <div class="col-sm-11 mb-5">
                    <jet-label class="label form-label fs-base" value="*CVU" />
                    <jet-input type="file" class="form-control form-control-lg" @input="form.cvu = $event.target.files[0]" required  :class="{ 'is-invalid': form.errors.cvu }" />
                    <jet-input-error :message="form.errors.cvu" />
          </div>
          
          <div class="col-sm-11 mb-2">
                    <jet-label class="label form-label fs-base" value="*Fotografía" />
                    <jet-input type="file" class="form-control form-control-lg" @input="form.foto = $event.target.files[0]" required  :class="{ 'is-invalid': form.errors.foto }" />
                    <jet-input-error :message="form.errors.foto" />
          </div>
      </div></form></div>
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
    import Alumno from "@/Jetstream/Alumno.vue";
    import Head from '@/Jetstream/Head.vue';

    export default {

      
        name: "Index",
        props: {
          doc: {type: Object, required: true},
          doc2: {type: Object, required: true},
          doc3: {type: Object, required: true},
          doc4: {type: Object, required: true},
          doc5: {type: Object, required: true},
          doc6: {type: Object, required: true},
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
            requestform: props.doc,
            academicdoc: "",
            motivedoc: "",
            ine: "",
            cvu: "",
            foto: "",
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
  width: 75%;
  border-radius: 20px;
  box-sizing: border-box;
  background-color: #ffffffef;
  margin-top: 10%;
  margin-left: 13%;
  box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px rgba(216, 213, 213, 0.137);
  }

  .formulario{
    padding: 0px 0px 0px 50px;
  }

  body{
    margin: 0;
  }

  p{
    margin-bottom: 0 ;
    font-size: 18px;
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

  i[id="boxi3"]{
    padding: 0px 6px 0px 0px;
  }

  .info{
    padding: -10px 20px 0px 0px;
  }

  .pestana{
    background-color: tomato;
    width: 15%;
    border-bottom: 1px solid rgb(12, 12, 12);
  }



</style>