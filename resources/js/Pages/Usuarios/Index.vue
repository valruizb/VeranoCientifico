<template>
    <Head>   </Head>
  
    <Admin v-if="$page.props.user.rol == 1"> </Admin>
  
  <div class="contenido">
      <div class="forma1">
        <h2 class="h4 font-weight-bold">
          <i class='boxi bx bxs-school' style='color:#030664' ></i> Instituciones Registradas
        </h2><hr><br>
        <div class="col-md-12 pe-0">
          <div class="card-body border-right border-bottom p-3 h-100">
            <div v-if="$page.props.flash.success" class="alert alert-success" role="alert">
              {{ $page.props.flash.success }}
            </div>
            <div class="mb-3 d-flex justify-content-start divbus">
              <Link :href="route(`${routeName}create`)" class="add btn btn" >
                <i class="bi bi-plus-circle"></i> <p class="text-add">Agregar Institución</p>
              </Link>
              <div class="input-group w-50 ml-2">
                <input id="search-input" type="text"
                  class="busqueda form-control form-control-sm form-control bg-light shadow-sm"
                  placeholder="Ingrese un parámetro de búsqueda"
                  v-model="filters.search"
                  @change="search"
                />
                <div class="input-group-append input-group-append-sm">
                  <button
                    @click="search" class="btnbuscar btn btn-outline-secondary btn-sm" >
                    <i class="buscar bi bi-search"></i>
                  </button>
                </div>
              </div>
              
            </div><br>
  
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="5%" class="col">No.</th>
                    <th width="35%" class="col">Nombre</th>
                    <th width="9%" class="col">Editar</th>
                    <th width="9%" class="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody v-for="item in institucion.data" :key="item.id">
                  <tr>
                    <td>{{ item.id  }}</td>
                    <td>{{ item.name }}</td>
                    
                    <td><button class="btn1 btn btn-info btn-sm" >
                      <a :href="route('instituciones.edit', item.id)">
                      <i class="lapiz bi bi-pencil-fill">
                      </i></a></button> 
                    </td>
                    <td>  
                      <form action="">
                    <button
                    class="btn1 btn btn-danger btn-sm"
                    type="button"
                    @click="eliminar(item.id)"
                  >
                    <i class="basura bi bi-trash-fill"></i>
                  </button>
                </form>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <RecordsHelper :thereAreResults="thereAreResults" :loadingResults="loadingResults"/>
            <pagination  :links="institucion.links" :total="institucion.total" class="pagination"/>
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
      import { ref } from "vue";
      import Swal from 'sweetalert2';
      import { useForm } from "@inertiajs/inertia-vue3";
      import JetLabel from "@/Jetstream/Label.vue";
      import JetInput from "@/Jetstream/Input.vue";
      import JetInputError from "@/Jetstream/InputError.vue";
      import JetButton from "@/Jetstream/Button.vue";
      import 'sweetalert2/dist/sweetalert2.min.css';
      import Admin from "@/Jetstream/Admin.vue";
      import Head from '@/Jetstream/Head.vue';
      
      export default {
          name: "Index",
          props: {
              titulo: { type: String, required: true },
              routeName: { type: String, required: true },
              institucion: { type: Object, required: true },
              loadingResults: { type: Boolean, required: true, default: true },
              search: { type: String, required: true },
              status: { type: Boolean, required: true, default: true },
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
              Admin,
              Head,
          },
  
          methods: {
          logout() {
          this.$inertia.post(route('logout'));
          }
        },
  
          setup(props) {
            const form = useForm({ ...props.institucion });
              const thereAreResults = computed(() => props.institucion.total > 0);
              const state = reactive({
                  filters: {
                      page: props.institucion.current_page,
                      search: props.search,
                      status: props.status ?? 1,
                  },
              });
  
              const eliminar = (idel) => {
                Swal.fire({
                title: "¿Esta seguro?",
                text: "Esta acción no se puede revertir",
                icon: "warning",
                showCancelButton: true,
                cancelButtonColor: "#d33",
                confirmButtonColor: "#3085d6",
                confirmButtonText: "Si!, eliminar registro!",
              }).then((res) => {
                if (res.isConfirmed) {
                  form.delete(route("instituciones.destroy", idel));
                }
              });
            };
  
            const search = () => {
                  props.loadingResults = true;
                  Inertia.replace(route(`${props.routeName}index`, state.filters));
              };
  
            return {
                  ...toRefs(state),
                  search,
                  thereAreResults,
                  eliminar,
                  form
              };
          },
      }
  </script>
    
    
  <style scoped>
  
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
  
  /*Tabla */
  table{
    width: 90%;
    text-align: center;
    margin-left: 60px;
  }
  
  .col{
    text-align:center;
  }
  
  a{
    text-decoration: none;
  }
  
  .lapiz{
    font-size: 13px;
    color: #ffffff;
  }
  
  .basura{
    font-size: 13px;
    color: #ffffff;
  }
  
  .add{
    font-size: 19px;
    height: 44px;
    width: 14%;
    background-color: rgb(3, 4, 112);
    margin-left: 55px;
  }
  
  .add:hover{
    background-color: rgb(5, 7, 145);
  }
  
  .text-add{
    font-size: 13px;
    margin-left: 10px;
    margin-top: 17px;
  } 
  
    input{
    color: #000000;
    margin-left: 15px;
    height: 44px;
    width: 30%;
    border-right: none;
    }
  
    .btnbuscar{
      margin-left: 0px;
      height: 44px;
      background-color: rgb(3, 4, 112);
      color: #ffffff;
    }
  
    .btnbuscar:hover{
      margin-left: 0px;
      height: 44px;
      background-color: rgba(6, 9, 138, 0.993);
      color: #fbfdfd;
    }
  </style>