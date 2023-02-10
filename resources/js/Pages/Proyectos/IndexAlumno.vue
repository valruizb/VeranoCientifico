<template>
    <Head> </Head>
    <Alumno> </Alumno>
 <main>
   <body><br><br><br><br><br>
    <div class="card-body ">
    <div class="input-group w-50 ml-2 ">
      <input type="text" class="busqueda form-control form-control rounded-3"
        placeholder="Ingrese un parámetro de búsqueda" @change="search" v-model="filters.search"/>
      <div class="input-group-append input-group-append-sm">
        <button type="submit" class="btn btn-icon btn-primary rounded-3 ms-3" @click="search">
          <i class='busqueda bx bx-search'></i>
        </button>
      </div> <button @click="guardar">Carrito</button>
      </div>

      </div><br>
     <div class="row">
       <div v-for="proyecto in proyectos" :key="proyecto.id" class="cardproyectos prueba col-10 col-lg-4">
         <aside class="ver"><p class="upper vertical">
          {{ proyecto.thematics.name }}
         </p></aside>
         <div class="info">
            <h3>{{ proyecto.title }}</h3>
            <p>Institución que la imparte: {{ proyecto.institutions.name }}</p>
            <p>Subtemática:  {{ proyecto.subthematics.name }} </p>
            <p>Número de Alumnos Permitidos: {{ proyecto.studentnum}}</p>
            <p>Modalidad: {{ proyecto.modality}} </p>
            <p>Profesor: {{ proyecto.users.name }}</p>
            <button>Detalles</button><input id="add" type="checkbox" @change="addItem" :value="proyecto.id" v-model="cart">
         </div>
         
       </div>
     </div>

     <h1  v-for="item in cart" :key="item">{{ item}}</h1>
   </body>
 </main>
 </template>
 
 <script>
  import { Link } from '@inertiajs/inertia-vue3'
   import 'sweetalert2/dist/sweetalert2.min.css';
   import AppLayout from "@/Layouts/AppLayout.vue";
   import JetLabel from "@/Jetstream/Label.vue";
   import JetInput from "@/Jetstream/Input.vue";
   import JetInputError from "@/Jetstream/InputError.vue";
   import JetButton from "@/Jetstream/Button.vue";
   import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
   import Head from '@/Jetstream/Head.vue';
   import Alumno from '@/Jetstream/Alumno.vue';
   import { Inertia } from "@inertiajs/inertia";
   import { useForm } from "@inertiajs/inertia-vue3";
   import Swal from 'sweetalert2';
   import { computed, onMounted, reactive, toRefs, watch } from "vue";
     
     
     export default {
       name: "Create",
       data() {
            return {
                cart: []
            }
        },
       props: {
            title: { type: String, required: true },
            routeName: { type: String, required: true },
            proyectos: { type: Object, required: true },
            loadingResults: { type: Boolean, required: true, default: true },
            search: { type: String, required: true },
            status: { type: Boolean, required: true, default: true },
        },
       components: {
         AppLayout,
         Head,
         Link,
         JetLabel,
         JetInput,
         JetInputError,
         JetButton,
         JetDropdownLink,
         Alumno,
       },

       setup(props) {
            

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
                Inertia.replace(route(`verano.index`, state.filters));
            };

            const guardar = () => {
                props.loadingResults = true;
                Inertia.replace(route(`verano.index`, state.filters));
            };

            return {
                ...toRefs(state),
                search,
                thereAreResults,
               
            };
        },

        methods: {
            addItem() {
                if (this.cart.length <= 3) {
                    let timerInterval
                    Swal.fire({
                    icon: 'success',
                    title: 'Auto close alert!',
                    timer: 900,
                    }).then((result) => {
                        if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                    }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                    })
                    this.cart.pop();
                }
            }
        }

        
     };
 </script>
 
 <style scoped>
 .cardproyectos{
     border-color: black;
     background-color: aqua;
     height: 350px;
     margin-left: 50px;
     width: 400px;
     margin-bottom: 45px;
     /*padding-top: 45px;*/
   }

   .upper { 
  text-transform: uppercase;
}
 
   .info{
     background-color: blueviolet;
     margin-left: 30px;
     width: 357px;
     margin-top: -340px;
   }
 
   .vertical {
     writing-mode: vertical-lr;
     transform: rotate(180deg);
     background-color: rgb(8, 8, 102);
     color: azure;
     height: 340px;
     width: 25px;
     margin-left: 8px ;
     text-align: center;
 }
 
 .ver{
   background-color: red;
   height: 350px;
   width: 40px;
   margin-left: -12px;
 }
 
 aside{
   margin: 0;
   padding: 0;
   background-color: #0fb3ff;
 }

 </style>