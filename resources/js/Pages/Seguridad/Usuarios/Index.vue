<template>
  <app-layout title="Catálogo de Usuarios">
    <template #header>
      <h2 class="h4 font-weight-bold">
        <i class="bi bi-people-fill"></i> {{ titulo }}
      </h2>
    </template>
    <div class="card shadow-sm">
      <div class="row">
        <div class="col-md-12 pe-0">
          <div class="card-body border-right border-bottom p-3 h-100">
            <div v-if="$page.props.flash.success" class="alert alert-success" role="alert">
              {{ $page.props.flash.success }}
            </div>
            <div class="mb-2 d-flex justify-content-start">
              <Link
                :href="route(`${routeName}create`)"
                class="btn btn-outline-secondary btn-sm"
              >
                <i class="bi bi-plus"></i>
                Agregar Usuarios
              </Link>
              <form @submit.prevent="filtrar" class="d-flex-row d-md-inline-flex flex-nowrap align-items-center flex-grow-1">
                    <select class="form-select form-select-sm" v-model="form.profile">
                        <option value="null">Seleccione una opción</option>
                        <option v-for="profile in profiles" v-bind:value="profile.id" v-bind:key="profile.id" v-text="profile.name"></option>
                    </select>
                    <input
                        type="text"
                        class="form-control form-control-sm mr-1 mb-2 mb-md-0"
                        placeholder="Búsqueda por nombre o correo electrónico"
                        v-model="form.search"
                    />
                    <button
                        class="btn btn-outline-primary btn-sm mb-2 mb-md-0 w-auto"
                        type="submit"
                        :class="[thereAreFilter() ? 'd-inline-flex align-items-center' : 'd-none']"
                        >
                        <i class="bi bi-funnel"/>&nbsp;Buscar
                    </button>
                    <button class="btn btn-outline-secondary btn-sm d-inline-flex w-auto align-items-center mb-2 mr-1 mb-md-0" type="button" @click="limpiarFiltro()">
                        <i class="bi bi-eraser"></i>&nbsp;Limpiar
                    </button>
              </form>
            </div>

            <div class="d-flex flex-row bd-highlight pt-2">
              <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Rol</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                  <tr v-for="item in usuarios.data" :key="item.id">
                    <td>
                      <Link
                        :href="route('usuarios.edit', item.id)"
                        class="d-flex text-decoration-none text-reset"
                        >{{ item.name }}</Link
                      >
                    </td>
                    <td>
                      <Link
                        :href="route('usuarios.edit', item.id)"
                        class="d-flex text-decoration-none text-reset"
                        >{{ item.email }}</Link
                      >
                    </td>
                    <td>
                        <Link :href="route('usuarios.edit', item.id)" class="d-flex text-decoration-none text-reset">
                            {{ item.roles.map( r => r.name ).join(', ') }}
                        </Link>
                    </td>
                    <td>
                      <Link
                        :href="route('usuarios.edit', item.id)"
                        class="d-flex text-decoration-none text-reset"
                        >&nbsp;</Link>
                    </td>
                    <td>
                      <Link
                        :href="route('perfiles.edit', item.id)"
                        class="d-flex text-decoration-none text-reset"
                      >
                        <i class="bi bi-caret-right-fill"></i>
                      </Link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <pagination :links="usuarios.links" :total="usuarios.total" />
            <RecordsHelper
            :thereAreResults="thereAreResults"
            :loadingResults="loadingResults"
          />
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm} from "@inertiajs/inertia-vue3";
import Pagination from "@/Shared/Pagination.vue";
import RecordsHelper from "@/Shared/RecordsHelper.vue";
import { computed, onMounted, reactive, toRefs, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Input from "@/Jetstream/Input.vue";
import { ref } from "vue";


export default {
  name: "Index",
  props: {
    titulo: { type: String, required: true },
    usuarios: {
      type: Object,
      default: {},
      required: true,
    },
    profiles: {
      type: Object,
      default: {},
      required: true,
    },
    filtro: {
      type: Object,
      default: {},
      required: true,
    },
    routeName: { type: String, required: true },
    loadingResults: { type: Boolean, required: true, default: true }
  },
  components: {
    AppLayout,
    Link,
    Pagination,
    RecordsHelper,
    Input,
  },
  setup(props) {
    const form = useForm({ ...props.filtro });
    const thereAreResults = computed(() => props.usuarios.total > 0);
    const filtrar = () => form.get(route('usuarios.index'));
    
    const search = () => {
      props.loadingResults = true;
      Inertia.replace(route(`${props.routeName}index`, state.filters));
    };

    return {
      form,
      search,
      thereAreResults,
      thereAreFilter: () => computed(() => form.profile).value,
      filtrar,
      limpiarFiltro: () => { 
                form.profile = null;
                form.search = null;
                filtrar();
            },
    };
  },
};
</script>

<style>
</style>