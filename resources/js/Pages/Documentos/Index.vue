<template>
  <Head>   </Head>

  <Alumno v-if="$page.props.user.rol == 4"> </Alumno>
 

<body>
  <div class="forma1">
    <div v-bind:style="{ 'background-image': 'url(' + imageUrl + ')'}" class="pestana">
      <iframe  :src="pdfPreview" style="width: 500px; height: 100%"></iframe>
    </div><br>
    <jet-validation-errors class="mb-3"/>
    <div class="formulario forma2"> 
    <form @submit.prevent="guardar" enctype="multipart/form-data">
      <br><h2><i class='bx bxs-up-arrow-square bx-flashing' style='color:#04023f' ></i> Carga de documentos</h2><br>
      <p>A continuación se pide llenar el formulario con los respectivos documentos, lo más legible posible</p><br>
        <div class="col-sm-8 mb-5">
                  <jet-label class="label form-label fs-base" value="*Formato solicitud" />
                  <jet-input  id="request" type="file"  @change="previewRequest" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.requestform }" />
                  <jet-input-error :message="form.errors.requestform" />

        </div>

        <div class="col-sm-8 mb-5">
                  <jet-label class="label form-label fs-base" value="*Carta academica" />
                  <jet-input id="academic" type="file" @change="previewAca" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.academicdoc }" />
                  <jet-input-error :message="form.errors.academicdoc" />
        </div>

        <div class="col-sm-8 mb-5">
                  <jet-label class="label form-label fs-base" value="*Carta motivos" />
                  <jet-input id="motive" type="file" @change="previewMotive" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.motivedoc }" />
                  <jet-input-error :message="form.errors.motivedoc" />
        </div>

        <div class="col-sm-8 mb-5">
                  <jet-label class="label form-label fs-base" value="*INE" />
                  <jet-input id="ine" type="file" @change="previewIne" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.ine }" />
                  <jet-input-error :message="form.errors.ine" />

        </div>

        <div class="col-sm-8 mb-5">
                  <jet-label class="label form-label fs-base" value="*CVU" />
                  <jet-input id="cvu" type="file" @change="previewCvu" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.cvu }" />
                  <jet-input-error :message="form.errors.cvu" />
        </div>
        
        <div class="col-sm-8 mb-2">
                  <jet-label class="label form-label fs-base" value="*Fotografía" />
                  <jet-input id="foto" type="file" @change="previewFoto" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.foto }" />
                  <jet-input-error :message="form.errors.foto" />
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

<div class="no1 col-sm-3 mb-5">
    <button title="Ver" v-on:click="ver('request')" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp; 
    <button title="Ocultar" v-on:click="ocultar" class="btn btn-warning btn-sm">
      <i class='boxi bi bi-eye-slash-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar('request')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button> 
</div>
<div class="no2 col-sm-3 mb-5">
    <button title="Ver" v-on:click="ver('academic')" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp; 
    <button title="Ocultar" v-on:click="ocultar" class="btn btn-warning btn-sm">
      <i class='boxi bi bi-eye-slash-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar('academic')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff'></i>
    </button> 
</div>
<div class="no3 col-sm-3 mb-5">
    <button title="Ver" v-on:click="ver('motivedoc')" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp; 
    <button title="Ocultar" v-on:click="ocultar" class="btn btn-warning btn-sm">
      <i class='boxi bi bi-eye-slash-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar('motivedoc')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button> 
</div>
<div class="no4 col-sm-3 mb-5">
    <button title="Ver" v-on:click="ver('ine')" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp; 
    <button title="Ocultar" v-on:click="ocultar" class="btn btn-warning btn-sm">
      <i class='boxi bi bi-eye-slash-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar('ine')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button> 
</div>
<div class="no5 col-sm-3 mb-5">
    <button title="Ver" v-on:click="ver('cvu')" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp; 
    <button title="Ocultar" v-on:click="ocultar" class="btn btn-warning btn-sm">
      <i class='boxi bi bi-eye-slash-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar('cvu')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button> 
</div>
<div class="no6 col-sm-3 mb-5">
    <button title="Ver" v-on:click="ver('foto')" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp; 
    <button title="Ocultar" v-on:click="ocultar" class="btn btn-warning btn-sm">
      <i class='boxi bi bi-eye-slash-fill' style='color:#ffffff' ></i>
    </button>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar('foto')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button> 
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
    documento1: { type: String, required: true },
    documento2: { type: String, required: true },
    documento3: { type: String, required: true },
    documento4: { type: String, required: true },
    documento5: { type: String, required: true },
    documento6: { type: String, required: true },
    user: { type: Object, required: true },
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

    data() {
      return {
        pdfPreview: '',
        requestform:'',
        academicdoc:'',
        motivedoc:'',
        ine:'',
        cvu:'',
        foto:'',
        imageUrl: '../../../../public/assets/img/avatar/02.jpg',
      }
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


  methods: {
    ver: function (archivo) {
      if(archivo == 'request'){
        
        if(this.documento1 != ''){
          this.pdfPreview = this.documento1
        }else{
          this.pdfPreview = this.requestform
        }
        
      }

      if(archivo == 'academic'){
        this.pdfPreview = this.academicdoc
      }

      if(archivo == 'motive'){
        this.pdfPreview = this.motivedoc
      }

      if(archivo == 'ine'){
        this.pdfPreview = this.ine
      }

      if(archivo == 'cvu'){
        if(this.documento1 != ''){
          this.pdfPreview = this.documento5
        }else{
          this.pdfPreview = this.cvu
        }

      }

      if(archivo == 'foto'){
        this.pdfPreview = this.foto
      }
      this.form.ver = 'mostrar'

    },

    ocultar: function (event) {
      this.form.ver = ''
      this.pdfPreview = ''
      
    },

    borrar: function (archivo) {
      if(archivo == 'request'){
        const $elemento = document.querySelector("#request");
        $elemento.value = ""
        this.form.requestform = ""
        this.requestform = ""
        this.pdfPreview = ""
      }

      if(archivo == 'academic'){
        const $elemento = document.querySelector("#academic");
        $elemento.value = ""
        this.form.academicdoc = ""
        this.academicdoc = ""
        this.pdfPreview = ""
      }

      if(archivo == 'motive'){
        const $elemento = document.querySelector("#motive");
        $elemento.value = ""
        this.form.motivedoc = ""
        this.motivedoc = ""
        this.pdfPreview = ""
      }

      if(archivo == 'ine'){
        const $elemento = document.querySelector("#ine");
        $elemento.value = ""
        this.form.ine = ""
        this.ine = ""
        this.pdfPreview = ""
      }

      if(archivo == 'cvu'){
        const $elemento = document.querySelector("#cvu");
        $elemento.value = ""
        this.form.cvu = ""
        this.cvu = ""
        this.pdfPreview = ""
      }

      if(archivo == 'foto'){
        const $elemento = document.querySelector("#foto");
        $elemento.value = ""
        this.form.foto = ""
        this.foto = ""
        this.pdfPreview = ""
      }

    },

    previewRequest(event) {
      const reader = new FileReader()
      reader.readAsDataURL(event.target.files[0])
      reader.onload = (e) => {
        this.requestform = e.target.result
        this.form.requestform = event.target.files[0]
      }
    },

    previewAca(event) {
      const reader = new FileReader()
      reader.readAsDataURL(event.target.files[0])
      reader.onload = (e) => {
        this.academicdoc = e.target.result
        this.form.academicdoc = event.target.files[0]
      }
    },

    previewMotive(event) {
      const reader = new FileReader()
      reader.readAsDataURL(event.target.files[0])
      reader.onload = (e) => {
        this.motivedoc = e.target.result
        this.form.motivedoc = event.target.files[0]
      }
    },

    previewIne(event) {
      const reader = new FileReader()
      reader.readAsDataURL(event.target.files[0])
      reader.onload = (e) => {
        this.ine = e.target.result
        this.form.ine = event.target.files[0]
      }
    },

    previewCvu(event) {
      const reader = new FileReader()
      reader.readAsDataURL(event.target.files[0])
      reader.onload = (e) => {
        this.cvu = e.target.result
        this.form.cvu = event.target.files[0]
      }
    },

    previewFoto(event) {
      const reader = new FileReader()
      reader.readAsDataURL(event.target.files[0])
      reader.onload = (e) => {
        this.foto = e.target.result
        this.form.foto = event.target.files[0]
      }
    }
  }
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