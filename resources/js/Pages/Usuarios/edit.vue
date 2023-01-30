<template>
    <Head>   </Head>
  
    <Admin v-if="$page.props.user.rol == 1"> </Admin>
    <Profe v-if="$page.props.user.rol == 2"></Profe>

<body>
  <div class="page-wrapper">
    <section class="container pt-5">
      <div class="row">
        <aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
            <div class="position-sticky top-0">
              <div class="text-center pt-5">
                <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                  <img :src="user.profile_photo_url" class="d-block rounded-circle" ref="photo"  width="120" alt="John Doe">
                  <button  type="button" class="btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 mt-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change picture">
                    <i class="bx bx-refresh"></i>
                  </button>
                </div>
                <h2 class="h5 mb-1">{{ $page.props.user.name}} {{ $page.props.user.lastnamep}} {{ $page.props.user.lastnamem }}</h2>
                <p class="mb-3 pb-3">{{ $page.props.user.email}}</p>
                <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                  <i class="bx bxs-user-detail fs-xl me-2"></i>
                  Menú
                  <i class="bx bx-chevron-down fs-lg ms-1"></i>
                </button>
                <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
                  <a href="account-details.html" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                    Bienvenido
                  </a>
                  <a :href="route('registro.edit', $page.props.user.id )" class="list-group-item list-group-item-action d-flex align-items-center active">
                    <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                    Detalles de la cuenta
                  </a>
                  <a :href="route('profile.show')" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-lock-alt fs-xl opacity-60 me-2"></i>
                    Seguridad de la cuenta
                  </a>
                  <a href="account-notifications.html" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-bell fs-xl opacity-60 me-2"></i>
                    Notificaciones
                  </a>
                  <a href="account-signin.html" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-log-out fs-xl opacity-60 me-2"></i>
                    Cerrar sesión
                  </a>
                </div>
              </div>
            </div>
          </aside>
    <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h2 pt-xl-1 pb-3"><i class='bx bx-lock-open-alt bx-flashing' style='color:#07179a'></i> B I E N V E N I D O</h1><hr><br>

              <!-- Basic info -->
              <h2 class="h5 text-primary mb-4">Información sobre tu cuenta</h2>
              <form class="needs-validation border-bottom pb-3 pb-lg-4" enctype="multipart/form-data" @submit.prevent="update">
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 1">
                    <jet-label class="form-label fs-base" for="name" value="Nombre" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.name"  :class="{ 'is-invalid': form.errors.name }" autocomplete="name"  required />
                    <jet-input-error :message="form.errors.name" />
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 1">
                    <jet-label class="form-label fs-base" for="name" value="Apellido Paterno" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.lastnamep"  :class="{ 'is-invalid': form.errors.name }" autocomplete="name"   />
                    <jet-input-error :message="form.errors.lastnamep" />
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 1">
                    <jet-label class="form-label fs-base" for="name" value="Apellido Materno" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.lastnamem"  :class="{ 'is-invalid': form.errors.name }" autocomplete="name"  r/>
                    <jet-input-error :message="form.errors.lastnamem" />
                  </div>
                  <div class="col-sm-6 mb-4" >
                    <jet-label class="form-label fs-base" for="name" value="Teléfono" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.phone"  :class="{ 'is-invalid': form.errors.name }" autocomplete="name"  />
                    <jet-input-error :message="form.errors.phone" />
                  </div>
                  <div class="col-sm-6 mb-4" >
                    <jet-label class="form-label fs-base" for="name" value="Email" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.email"  :class="{ 'is-invalid': form.errors.email }" autocomplete="name"  />
                    <jet-input-error :message="form.errors.email" />
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 2">
                    <jet-label class="form-label fs-base" value="Institución de procedencia:" />
                      <select class="form-control form-control-lg" :class="{'is-invalid':form.errors.institution_id}" v-model="form.institution_id">
                      <option id="sn"  v-for="ins in instituto" disabled  value="">{{ ins.name }}</option>
                      <option id="sn"  v-for="ins in instituciones"  v-bind:value="ins.id" v-bind:key="ins.id">{{ ins.name }}</option>
                      </select>
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 2">
                    <jet-label class="form-label fs-base" value="Temática:" />
                      <select class="form-control form-control-lg" :class="{'is-invalid':form.errors.thematic_id}" v-model="form.thematic_id">
                      <option id="sn"  v-for="tema in tematica" disabled  value="">{{ tema.name }}</option>
                      <option id="sn"  v-for="tema in tematicas"  v-bind:value="tema.id" v-bind:key="tema.id">{{ tema.name }}</option>
                      </select>
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 2">
                    <jet-label class="form-label fs-base" value="Institución de procedencia:" />
                      <select class="form-control form-control-lg" :class="{'is-invalid':form.errors.subthematic_id}" v-model="form.subthematic_id">
                      <option id="sn"  v-for="sub in subtematica" disabled  value="">{{ sub.name }}</option>
                      <option id="sn"  v-for="sub in subtematicas"  v-bind:value="sub.id" v-bind:key="sub.id">{{ sub.name }}</option>
                      </select>
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 2">
                    <jet-label class="form-label fs-base" for="name" value="Puesto" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.job"  :class="{ 'is-invalid': form.errors.job }" autocomplete="name"  />
                    <jet-input-error :message="form.errors.job" />
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 2">
                    <jet-label class="form-label fs-base" for="name" value="Nivel SNI" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.snilevel"  :class="{ 'is-invalid': form.errors.snilevel }" autocomplete="name"  />
                    <jet-input-error :message="form.errors.snilevel" />
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 2">
                    <jet-label class="form-label fs-base" for="name" value="Línea de investigación" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.invline"  :class="{ 'is-invalid': form.errors.invline }" autocomplete="name"  />
                    <jet-input-error :message="form.errors.invline" />
                  </div>
                  <div class="col-sm-6 mb-4" v-if="$page.props.user.rol == 2">
                    <jet-label class="form-label fs-base" for="name" value="Grado Máximo" />
                    <jet-input type="text" id="sn" class="form-control form-control-lg" v-model="form.maxgrade"  :class="{ 'is-invalid': form.errors.maxgrade }" autocomplete="name"  />
                    <jet-input-error :message="form.errors.maxgrade" />
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <button type="submit" class="btn btn-primary"><i class="bx bx-save fs-xl opacity-60 me-2"></i> Guardar cambios</button>
                </div>
              </form>
            </div>
          </div>
        </div>
</section> 
</div>
</body>
</template>

<script>
import Admin from "@/Jetstream/Admin.vue";
import Profe from "@/Jetstream/Profe.vue";
import Head from '@/Jetstream/Head.vue';
import Revisor from '@/Jetstream/Revisor.vue';
import Alumno from '@/Jetstream/Alumno.vue';
import JetInput from '@/Jetstream/Input.vue'
import JetInputError from '@/Jetstream/InputError.vue'
import JetLabel from '@/Jetstream/Label.vue'
import { defineComponent } from 'vue'
import JetSecondaryButton from '@/Jetstream/SecondaryButton.vue'

export default defineComponent({
  name:"Dashboard",
  props: {
    user:{type: Object, required: true},
    instituto: { type: Object, required: true },
    subtematicas: { type: Object, required: true },
    subtematica: { type: Object, required: true },
    tematicas: { type: Object, required: true },
    tematica: { type: Object, required: true },
    instituciones: { type: Object, required: true },
  },
  components: {
    Admin,
    Profe, 
    Head,
    Alumno,
    Revisor,
    JetInput,
    JetInputError,
    JetLabel,
    JetSecondaryButton,
  },
  
  setup(props) {
        const form = useForm({ ...props.registro });
        const update = () => {
          form.put(route("registro.update", props.registro.id));
        };
        return { form, update};
      },      
        
        

data() {
  return {
    form: this.$inertia.form({
      _method: 'PUT',
      name: this.user.name,
      lastnamep: this.user.lastnamep,
      lastnamem: this.user.lastnamem,
      phone: this.user.phone,
      institution_id: this.user.institution_id,
      thematic_id: this.user.thematic_id,
      subthematic_id: this.user.subthematic_id,
      snilevel: this.user.snilevel,
      maxgrade: this.user.maxgrade,
      invline: this.user.invline,
      job: this.user.job,
      email: this.user.email,
      photo: null,
    }),

    photoPreview: null,
  }
},

methods: {
  function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 10);
        };
      },

   // update() {
     // if (this.$refs.photo) {
      //  this.form.photo = this.$refs.photo.files[0]
      //}

      //this.form.post(route('registro.update'), {
        //errorBag: 'updateProfileInformation',
        //preserveScroll: true,
        //onSuccess: () => (this.clearPhotoFileInput()),
      //})
    //},
}
});




</script>

<style>

h1{
  text-align: center;
}
.page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #131022;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
</style>
