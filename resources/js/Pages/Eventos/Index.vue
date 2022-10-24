<template>
  <app-layout title="Catálogo de Eventos">
    <template #header>
      <h2 class="h4 font-weight-bold">
        <i class="bi-calendar-event-fill"></i> {{ titulo }}
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
                Agregar Evento
              </Link>
            </div>

            <div class="d-flex flex-row bd-highlight pt-2">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="item in eventos.data" :key="item.id">
                    <td>
                      <Link
                        :href="route('evento.edit', item.id)"
                        class="d-flex text-decoration-none text-reset"
                        >{{ item.id }}</Link
                      >
                    </td>
                    <td>
                      <Link
                        :href="route('evento.edit', item.id)"
                        class="d-flex text-decoration-none text-reset"
                        >{{ item.nombre }}</Link
                      >
                    </td>
                    <td>
                      <Link
                        :href="route('evento.edit', item.id)"
                        class="d-flex text-decoration-none text-reset"
                      >
                        <i class="bi bi-caret-right-fill"></i>
                      </Link>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <RecordsHelper
            :thereAreResults="thereAreResults"
            :loadingResults="loadingResults"
          />
            <pagination :links="eventos.links" :total="eventos.total" />
            
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
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
    eventos: {
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
    const thereAreResults = computed(() => props.eventos.total > 0);
    
    const search = () => {
      props.loadingResults = true;
      Inertia.replace(route(`${props.routeName}index`, state.filters));
    };

    return {
      search,
      thereAreResults,
    };
  },
};
</script>

<style>
</style>