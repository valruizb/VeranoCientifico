<template>
  <Head> </Head>
    <Profe> </Profe>
  
<div class="contenido">
      <div class="forma1">
        <h2 class="h4 font-weight-bold">
        <i class='boxi bx bxs-notepad' style='color:#030664' ></i> Mis proyectos
        </h2><hr><br>
        <div class="col-md-12 pe-0">
          <div class="card-body border-right border-bottom p-3 h-100">
            <div class="mb-2 d-flex justify-content-start">
              <div class="input-group w-50 ml-2">
                <input
                  type="text"
                  class="busqueda form-control form-control-sm form-control bg-light shadow-sm"
                  placeholder="Ingrese un parámetro de búsqueda"
                  v-model="filters.search"
                  @change="search"/>
                <div class="input-group-append input-group-append-sm">
                  <button
                    @click="search"
                    class="btn btn-primary btn-sm" >
                    <i class="buscar bi bi-search"></i>
                  </button>
                </div>
              </div>
              <select @change="search"
                class="custom-select-sm custom-select bg-light shadow-sm border-0 w-25 ml-2"
                v-model="filters.status">
                <option :value="true">Activos</option>
                <option :value="false">Eliminados</option>
              </select>
            </div><br>
            <div v-if="$page.props.flash.success" class="alert d-flex alert-success" role="alert">
                <i class="bx bx-check-circle lead me-3"></i>
                <a href="#" class="alert-link">{{ $page.props.flash.success }}</a>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered border-primary">
                <thead>
                  <tr>
                    <th class="col">Alumno</th>
                    <th class="col">Proyecto</th>
                    <th class="col">Estado</th>
                    <th width="20%" class="col">Prioridad</th>
                   <th>CVU</th> 
                  </tr>
                </thead>
                <tbody v-for="item in proyectos">
                  <tr>

                    <td>{{ item.user_id}}</td>
                    <td>{{ item.proyecto_id}}</td>
                    <td>{{ item.status}}</td>
                    <td>{{ item.priority}}</td>
                    <td><a :href="cvu" target="_blank"><button class="btn1 btn btn-info btn-sm" >
                    
                    <i class="lapiz bi bi-pencil-fill">
                    </i></button></a></td>
                    <td><a :href="cvu" target="_blank"><button class="btn1 btn btn-info btn-sm" >
                    
                    <i class="lapiz bi bi-pencil-fill">
                    </i></button></a></td>
                  </tr>
                </tbody>
              </table>
            </div><br>
            
          </div>
        </div>
      </div>
    </div>  
</template>
    

<script>
    import AppLayout from "@/Layouts/AppLayout.vue";
    import { Link } from "@inertiajs/inertia-vue3";
    import Pagination from "@/Shared/Pagination.vue";
    import RecordsHelper from "@/Shared/RecordsHelper.vue";
    import { computed, onMounted, reactive, toRefs, watch } from "vue";
    import { Inertia } from "@inertiajs/inertia";
    import Input from "@/Jetstream/Input.vue";
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
    import { useForm } from "@inertiajs/inertia-vue3";
    import JetLabel from "@/Jetstream/Label.vue";
    import JetInput from "@/Jetstream/Input.vue";
    import JetInputError from "@/Jetstream/InputError.vue";
    import JetButton from "@/Jetstream/Button.vue";
    import Profe from "@/Jetstream/Profe.vue";
    import Head from "@/Jetstream/Head.vue";
    
    export default {
        name: "Index",
        props: {
            title: { type: String, required: true },
            routeName: { type: String, required: true },
            proyectos: { type: Object, required: true },
            loadingResults: { type: Boolean, required: true, default: true },
            search: { type: String, required: true },
            status: { type: Boolean, required: true, default: true },
            cvu: { type: String, required: true },
        },
        components: {
            AppLayout,
            Link,
            RecordsHelper,
            Pagination,
            Input,
            JetDropdownLink,
            JetLabel,
            JetInput,
            JetInputError,
            JetButton,
            Profe,
        },

        methods: {
        logout() {
        this.$inertia.post(route('logout'));
        }
      },

        setup(props) {
          const form = useForm({ ...props.proyectos });
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
                Inertia.replace(route(`indexadmin`, state.filters));
            };

          return {
                ...toRefs(state),
                search,
                thereAreResults,
                form
            };
        },
    }
</script>
    
    
<style scoped>

  h2{
    font-size: 30px;
    text-align: center;
    font-weight: bolder;
    color: rgb(5, 5, 107);
    margin-top: -22px;
    }

  .boxi{
    font-size: 30px;
  }

  table{
    text-align: center;
  }

  .forma1{
  width: 85%;
  border-radius: 20px;
  /*sizing: border-box;*/
  background-color: #ffffff;
  margin-top: 10%;
  margin-left: 8%;
  }

  .contenido{
    background-color: #ffffff;
  }

  .forma{
    padding: 0px;
  }

  [id="cuenta"]:hover{
    background-color: #c90c0cec;
    color: rgb(255, 255, 255);
    font-style: bold;
  }

  [id="btn"]:hover, [id="guardar"]:hover{
    background-color: rgba(6, 42, 107, 0.986);
    color: rgb(255, 255, 255);
    font-style: bold;
  }

  [id="btn"]{
    background-color: #092252;
    color: rgb(255, 255, 255);
    width: 16%;
    border-radius: 10px;
    padding: 12px;
    margin-left: 40px;
    margin-right: -8%;
  }

  [id="guardar"]{
    background-color: #092252;
    color: rgb(255, 255, 255);
    width: 16%;
    padding: 12px;
    margin-left:10%;
    border-radius: 10px;
    margin-right: -8%;
    outline: none;
    border: #092252;
  }

  /*Tabla */

  .col{
    text-align:center;
  }

  a{
    text-decoration: none;
  }

  .lapiz{
    font-size: 18px;
    color: #ffffff;
  }

  .basura{
    font-size: 18px;
    color: #ffffff;
  }

  .add{
    font-size: 15px;
  }

  .text-add{
    font-size: 12px;
    margin-left: 10px;
  } 

  .buscar{
   
  }

  .busqueda{
    margin-left: 10px;
     
  }

  p{
    margin-bottom: 0 ;
    font-size: 18px;
  }

</style>