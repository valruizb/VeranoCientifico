<template>
    <Head> </Head>
    <Admin v-if="$page.props.user.rol == 1"></Admin>
  <body>
    <main class="page-wrapper">
     <section class="container pt-3">
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
                    <a href="account-details.html" class="list-group-item list-group-item-action d-flex align-items-center ">
                      <i class="bi bi-house fs-xl opacity-60 me-2"></i> &nbsp;
                      Bienvenido
                    </a>
                    <a :href="route('profile.show')" class="list-group-item list-group-item-action d-flex align-items-center">
                      <i class="bi bi-person-gear fs-xl opacity-60 me-2"></i>&nbsp;
                      Detalles de la cuenta
                    </a>
                    <a :href="route('registro.edit', $page.props.user.id)" class="list-group-item list-group-item-action d-flex align-items-center">
                      <i class="bi bi-file-earmark-lock fs-xl opacity-60 me-2"></i>&nbsp;
                      Seguridad de la cuenta
                    </a>
                    <a v-if="$page.props.user.rol == 1" :href="route('reportes.index')" class="list-group-item list-group-item-action d-flex align-items-center active">
                      <i class="bi bi-archive fs-xl opacity-60 me-2"></i> &nbsp;
                      Reportes PDF
                    </a>
                    <a href="account-signin.html" class="list-group-item list-group-item-action d-flex align-items-center">
                      <i class="bi bi-box-arrow-left fs-xl opacity-60 me-2"></i>&nbsp;
                      Cerrar sesión
                    </a>
                  </div>
                </div>
              </div>
            </aside>
            <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
              <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
                <h1 class="h2 pt-xl-1 pb-1"><i class='bx bxs-report' style='color:#07179a'></i> Reportes en PDF</h1>
              </div>
              <form >
              <select class="col-sm-6 mb-4"  id="tipo" v-model="form.tipo" autofocus required>
                    <option disabled value="">Selecciona tipo</option>
                    <option value="1">Proyecto - Tematica</option>
                    <option value="2">Proyecto - Institución</option>
                    <option value="3">Proyecto - Usuario</option>
            </select>
            <select v-if="form.tipo != '' "  v-model="form.tipo2" class="col-sm-6 mb-4"  id="tipo" autofocus required>
                    <option disabled value="">Seleccione un elemento </option>
                    <option value="">Todas las instituciones</option>
                    <option v-for="item in instituto" v-bind:value="item.id" v-bind:key="item.id">{{ item.name }}</option>
            </select>
            <jet-button @click="guardar" class="ml-4 text-xl" :class="{ 'text-white': form.processing }"
                            :disabled="form.processing">
                            <span class="animate-spin mr-1" v-show="form.processing">&#9696;</span> Generar reporte
                        </jet-button>
            </form>
          </div>
        </div>
  </section> 
  </main>
  </body>
  </template>
  
  <script>
  import Main from "../Main.vue";
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
  import { useForm } from "@inertiajs/inertia-vue3";
  import JetButton from '@/Components/Button.vue';
  
  export default defineComponent({
    name:"Dashboard",
    props: {
      user:{type: Object, required: true},
      instituto: { type: Object, required: true },
    },
    components: {
      Main, 
      Admin,
      Profe, 
      Head,
      Alumno,
      Revisor,
      JetInput,
      JetInputError,
      JetLabel,
      JetSecondaryButton,
      useForm,
      JetButton
    },
    setup(props) {
        const form = useForm({  tipo: "", tipo2: "" , tipo3: "" });

        const guardar = () => {
            form.post(route('pdf'));

        };

        return { form, guardar };
    },
  
  });
  
  </script>
  
  <style>
  h1{
    text-align: center;
  }

  .bx{
    font-size: 38px;
  }
  </style>
  
  
  