<template>
  <Head title="Register"></Head>

  <div class="contenido">

    <div class="W3-card-4">

      <jet-validation-errors class="mb-3"/>

      <div class="forma2">
        
      <form @submit.prevent="guardar">

        <div class="forma">
          <label for="tipouser" value="Tipo de Usuario*">Tipo de Usuario*</label>
          <select class="" id="tipouser" :class="{'is-invalid':form.errors.tipouser}" v-model="form.tipouser">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="rol in roles" v-bind:value="rol.id" v-bind:key="rol.id">{{ rol.name }}</option>
            </select>
        </div>

        <div class="forma">
          <label for="nombre" value="Nombre(s)" >Nombre(s)</label>
          <input  id="nombre" type="text"  v-model="form.nombre"  required autofocus autocomplete="nombre" >
        </div>
        
        <div class="forma">
          <label for="apellidop" value="Apellido Paterno*" >Apellido Paterno*</label>
          <input  id="apellidop" type="text"  v-model="form.apellidop" required autofocus autocomplete="apellidop" >
        </div>

        <div class="forma">
          <label for="apellidom" value="Apellido Materno*" >Apellido Materno*</label>
          <input  id="apellidom" type="text"  v-model="form.apellidom" required autofocus autocomplete="apellidom" >
        </div>

        <div class="forma">
          <label for="curp" value="CURP*" >CURP*</label>
          <input  id="curp" type="text"  v-model="form.curp" required autofocus autocomplete="curp" />
        </div>

        <div class="forma">
          <label for="correo" value="Correo Institucional*" >Correo*</label>
          <input  id="correo" type="email"  v-model="form.correo" required autofocus autocomplete="correoinst" />
        </div>

        <div class="forma">
          <label for="correocon" value="Confirmar correo*" >Confirmar correo*</label>
          <input  id="correocon" type="email"  v-model="form.correocon" required autofocus autocomplete="correoalt" />
        </div>

        <div class="forma">
          <label for="telefono" value="Teléfono*" >Teléfono*</label>
          <input  id="telefono" type="text"  v-model="form.telefono" required autofocus autocomplete="telefono" />
        </div>

        <div class="forma">
          <label for="institucionproced" value="Institución de procedencia*" >Institución de procedencia*</label>
          <select class="form-select" v-model="form.institucionproced">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="item in instituto" v-bind:value="item.id" v-bind:key="item.id">{{ item.name }}</option>
          </select>
        </div>

        <div class="forma" v-if="form.tipouser === 3">
          <label for="formatosolicitud" value=" Formato de solicitud*" >Formato de solicitud*</label>
          <input  id="formatosolicitud" type="text"  v-model="form.formatosolicitud" required autofocus autocomplete="formatosolicitud" />
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="areaconoc" value="Área de conocimiento*" >Área de conocimiento*</label>
          <select class="form-select" id="areaconoc" :class="{'is-invalid':form.errors.areaconoc}" v-model="form.subareaconoc">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="tema in tematica" v-bind:value="tema.id" v-bind:key="tema.id">{{ tema.name }}</option>
            </select>
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="subareaconoc" value="Subarea de conocimiento*" >Subarea de conocimiento*</label>
          <select class="form-select" id="tipouser" :class="{'is-invalid':form.errors.subareaconoc}" v-model="form.subareaconoc">
            <option disabled value="">Seleccione un elemento</option>
            <option v-for="sub in subtematica" v-bind:value="sub.id" v-bind:key="sub.id">{{ sub.name }}</option>
            </select>
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="nivelsni" value="Nivel SNI*" >Nivel SNI*</label>
          <input  id="nivelsni" type="text"  v-model="form.extension" required autofocus autocomplete="nivelsni" />
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="gradomax" value="Grado Maximo de Estudios*" >Grado Maximo de Estudios*</label>
          <input  id="gradomax" type="text"  v-model="form.gradomax" required autofocus autocomplete="gradomax" />
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="lineainv" value="Linea de Investigación*" >Linea de Investigación*</label>
          <input  id="lineainv" type="text"  v-model="form.lineainv" required autofocus autocomplete="lineainv" />
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="puesto" value="Puesto*" >Puesto*</label>
          <input  id="puesto" type="text"  v-model="form.puesto" required autofocus autocomplete="puesto" />
        </div>

        <div class="forma" v-if="form.tipouser === 2">
          <label for="constancia" value="Constancia*" >Constancia*</label>
          <input  id="constancia" type="text"  v-model="form.constancia" required autofocus autocomplete="constancia" />
        </div>

        <div class="forma">
          <label for="password" value="Password" >Password*</label>
          <input id="password" type="password" v-model="form.password" required autocomplete="new-password" />
        </div>

        <div class="forma">
          <label for="password_confirmation" value="Confirm Password" >Confirm Password*</label>
          <input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" />
        </div>

        <div class="forma" v-if="$page.props.jetstream.hasTermsAndPrivacyPolicyFeature">
          <div class="custom-control custom-checkbox">
            <jet-checkbox name="terms" id="terms" v-model:checked="form.terms" />

            <label class="custom-control-label" for="terms">
              I agree to the <a target="_blank" :href="route('terms.show')">Terms of Service</a> and <a target="_blank" :href="route('policy.show')">Privacy Policy</a>
            </label>
          </div>
        </div>

        <div class="mb-0">
          <div class="d-flex justify-content-end align-items-baseline">
            <Link :href="route('login')" class="text-muted me-3 text-decoration-none">
              Already registered?
            </Link>

            <jet-button
                  @click="guardar"
                  class="btn btn-outline-secondary btn-sm"
                  :class="{ 'text-white-50': form.processing }"
                  :disabled="form.processing"
                >
                  <i class="bi bi-save"></i> Guardar
            </jet-button>
          </div>
        </div>
      </form>
    </div>
    </div>
  </div>
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
    const form = useForm({ tipouser: "", nombre: "",apellidop: "", apellidom:"", correo:"", correocon:"", telefono:"", institucionproced:"", formatosolicitud:"", areaconoc:"", subareaconoc:"",  nivelsni:"",  gradomax:"",  lineainv:"",  puesto:"",  constancia:"", password:"", password_confirmation:""});
    const guardar = () => {
      form.post(route("registro.store"));

      Swal.fire({
      icon: 'success',
      title: 'B I E N V E N I D O',
      text: 'Usuario registrado',
      footer: 'Tecnológico Nacional de México'
    });
  };
    return { form, guardar };
  },

  methods: {
    submit() {
      this.form.post(this.route('register'), {
        onFinish: () => this.form.reset('password', 'password_confirmation'),
      })
    },
  },
}

</script>

<style>

  .contenido{
    width:70%;
    margin-left:15%;
    margin-top: 10%;
    background-color: aqua;
  }

</style>