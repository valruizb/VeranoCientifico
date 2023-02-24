<template>
  <Head>   </Head>

  <Alumno v-if="$page.props.user.rol == 4"> </Alumno>


<body>
  <div class="forma1">
    <br>
    {{ $mensaje }}
    <jet-validation-errors class="mb-3"/>
    <div class="formulario forma2">
    <form @submit.prevent="guardar" enctype="multipart/form-data">

      <br><h2><i class='bx bxs-up-arrow-square bx-flashing' style='color:#04023f' ></i> Carga de documentos</h2><br>
      <p>A continuación se pide llenar el formulario con los respectivos documentos, lo más legible posible</p><br>
        <div class="col-sm-8 mb-5">
            <jet-label class="label form-label fs-base" value="*Formato solicitud" />
            <jet-input v-if="requestform === ''" id="request" type="file" ref="request" @change="saveStorage($event, 'request')" class="form-control form-control-lg" :class="{ 'is-invalid': form.errors.requestform }" />
            <jet-input v-if="requestform != ''" id="request" type="text" v-model="form.requestform" />
            <jet-input-error :message="form.errors.requestform" />


        </div>

        <div class="col-sm-8 mb-5">
            <jet-label class="label form-label fs-base" value="*Carta academica" />
            <jet-input v-if="academicdoc === ''" id="academic" type="file" @change="saveStorage($event, 'academicdoc')" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.academicdoc }" />
            <jet-input v-if="academicdoc != ''" id="request" type="text" v-model="form.academicdoc" />
            <jet-input-error :message="form.errors.academicdoc" />
        </div>

        <div class="col-sm-8 mb-5">
            <jet-label class="label form-label fs-base" value="*Carta motivos" />
            <jet-input v-if="motivedoc === ''" id="motivedoc" type="file" @change="saveStorage($event, 'motivedoc')" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.motivedoc }" />
            <jet-input v-if="motivedoc != ''" id="motivedoc" type="text" v-model="form.motivedoc" />
            <jet-input-error :message="form.errors.motivedoc" />
        </div>

        <div class="col-sm-8 mb-5">
            <jet-label class="label form-label fs-base" value="*INE" />
            <jet-input v-if="ine === ''" id="ine" type="file" @change="saveStorage($event, 'ine')" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.ine }" />
            <jet-input v-if="ine != ''" id="ine" type="text" v-model="form.ine" />
            <jet-input-error :message="form.errors.ine" />
        </div>

        <div class="col-sm-8 mb-5">
                  <jet-label class="label form-label fs-base" value="*CVU" />
                  <jet-input v-if="cvu === ''" id="cvu" type="file" @change="saveStorage($event, 'cvu')" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.cvu }" />
                  <jet-input v-if="cvu != ''" id="cvu" type="text" v-model="form.cvu" />
                  <jet-input-error :message="form.errors.cvu" />
        </div>

        <div class="col-sm-8 mb-2">
            <jet-label class="label form-label fs-base" value="*Fotografía" />
            <jet-input v-if="foto === ''" id="foto" type="file" @change="saveStorage($event, 'foto')" class="form-control form-control-lg" required  :class="{ 'is-invalid': form.errors.foto }" />
            <jet-input v-if="foto != ''" id="foto" type="text" v-model="form.foto" />
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
    <a :href="requestform" target="_blank"><button title="Ver" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button></a>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar(requestform, 'request')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button>
</div>
<div class="no2 col-sm-3 mb-5">
    <a :href="academicdoc" target="_blank"><button title="Ver" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button></a>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar(academicdoc, 'academicdoc')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff'></i>
    </button>
</div>
<div class="no3 col-sm-3 mb-5">
    <a :href="motivedoc" target="_blank"><button title="Ver" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button></a>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar(motivedoc, 'motivedoc')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button>
</div>
<div class="no4 col-sm-3 mb-5">
    <a :href="ine" target="_blank"><button title="Ver" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button></a>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar(ine, 'ine')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button>
</div>
<div class="no5 col-sm-3 mb-5">
    <a :href="cvu" target="_blank"><button title="Ver" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button></a>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar(cvu, 'cvu')" class="btn btn-danger btn-sm">
      <i class='boxi bi bi-trash-fill' style='color:#ffffff' ></i>
    </button>
</div>
<div class="no6 col-sm-3 mb-5">
    <a :href="foto" target="_blank"><button title="Ver" class="btn btn-info btn-sm">
      <i class='boxi bi bi-eye-fill' style='color:#ffffff' ></i>
    </button></a>&nbsp;&nbsp;
    <button title="Borrar" v-on:click="borrar(foto, 'foto')" class="btn btn-danger btn-sm">
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
import axios from 'axios';
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



  setup(props) {
    const form = useForm({
      requestform: props.documento1,
      academicdoc: props.documento2,
      motivedoc: props.documento3,
      ine: props.documento4,
      cvu: props.documento5,
      foto: props.documento6,
      ver:"",
    });


    const guardar = () => {
      form.post(route("docuser.store"));
    };

    return {guardar, form};
  },

  data() {
      return {

        requestform: this.documento1,
        academicdoc: this.documento2,
        motivedoc: this.documento3,
        ine: this.documento4,
        cvu: this.documento5,
        foto: this.documento6,
        curp: this.user.curp,
        id: this.user.id,
        imageUrl: '../../../../public/assets/img/avatar/02.jpg',
      }
  },


  methods: {
    saveStorage(event, doc) {
        let formData = new FormData();
        const archivo = event.target.files[0];
        if(doc == 'request'){
            formData.append('namedoc', 'formato_solicituD');
            formData.append('curp', this.curp);
            formData.append('id', this.id);
            formData.append('archivo', archivo);
            axios.post('/guardar-archivo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(response => {
                console.log(this.requestform);
                this.requestform = response.data.url;
                this.form.requestform = this.requestform;
            })
            .catch(error => {
            // Manejar el error
            });
        }

        if(doc == 'academicdoc'){
            formData.append('namedoc', 'carta_academicA');
            formData.append('curp', this.curp);
            formData.append('id', this.id);
            formData.append('archivo', archivo);
            axios.post('/guardar-archivo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(response => {
                console.log(this.requestform);
                this.academicdoc = response.data.url;
                this.form.academicdoc = this.academicdoc

            })
            .catch(error => {
            // Manejar el error
            });
        }

        if(doc == 'motivedoc'){
            formData.append('namedoc', 'carta_motivos');
            formData.append('curp', this.curp);
            formData.append('id', this.id);
            formData.append('archivo', archivo);
            axios.post('/guardar-archivo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(response => {
                console.log(this.requestform);
                this.motivedoc = response.data.url;
                this.form.motivedoc = this.motivedoc;
            })
            .catch(error => {
            // Manejar el error
            });
        }

        if(doc == 'ine'){
            formData.append('namedoc', 'INE');
            formData.append('curp', this.curp);
            formData.append('id', this.id);
            formData.append('archivo', archivo);
            axios.post('/guardar-archivo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(response => {
                console.log(this.requestform);
                this.ine = response.data.url;
                this.form.ine = this.ine;
            })
            .catch(error => {
            // Manejar el error
            });
        }

        if(doc == 'cvu'){
            formData.append('namedoc', 'CVU');
            formData.append('curp', this.curp);
            formData.append('id', this.id);
            formData.append('archivo', archivo);
            axios.post('/guardar-archivo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(response => {
                console.log(this.requestform);
                this.cvu = response.data.url;
                this.form.cvu = this.cvu;
            })
            .catch(error => {
            // Manejar el error
            });
        }

        if(doc == 'foto'){
            formData.append('namedoc', 'fotografia');
            formData.append('curp', this.curp);
            formData.append('id', this.id);
            formData.append('archivo', archivo);
            axios.post('/guardar-archivo', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
            })
            .then(response => {
                console.log(this.requestform);
                this.foto = response.data.url;
                this.form.foto = this.foto;
            })
            .catch(error => {
            // Manejar el error
            });
        }



    },

    borrar: function (path, archivo) {
        let formData = new FormData();
        let inputId = '#' + archivo;
        const $elemento = document.querySelector(inputId);

        formData.append('path', path);
        axios.post('/eliminar-archivo', formData, {
        })
        .then(response => {
            if(archivo == 'request'){
                this.requestform = '';
                $elemento.value = ""
            }
            if(archivo == 'academicdoc'){
                this.academicdoc = '';
                $elemento.value = ""
            }
            if(archivo == 'motivedoc'){
                this.motivedoc = '';
                $elemento.value = ""
            }
            if(archivo == 'ine'){
                this.ine = '';
                $elemento.value = ""
            }
            if(archivo == 'cvu'){
                this.cvu = '';
                $elemento.value = ""
            }
            if(archivo == 'foto'){
                this.foto = '';
                $elemento.value = ""
            }
        })
        .catch(error => {
            // Manejar el error
        });
    },

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