<template>
  <app-layout title="Catálogo de Módulos">
    <template #header>
      <h2 class="h4 font-weight-bold">
        <i class="bi bi-calendar"></i> {{ titulo }}
      </h2>
    </template>
    <div class="card shadow-sm">
      <div class="row">
        <div class="col-md-12 pe-0">
          <div class="card-body border-right border-bottom p-3 h-100">
            <form class="row g-3 needs-validation" @submit.prevent="guardar">
              <div class="col-md-12">
                <jet-label for="Nombre de la Convocatoria" value="Nombre de la Convocatoria:" />
                <jet-input
                  v-model="form.nombre"
                  :class="{ 'is-invalid': form.errors.nombre}"
                  required
                  placeholder="Descripción de la convocatoria"
                />
                <jet-input-error :message="form.errors.nombre" />
              </div>
              <div class="col-md-4">
                <jet-label for="Numero Convocatoria" value="Numero Convocatoria:" />
                <jet-input
                  v-model="form.num_convocatoria"
                  :class="{ 'is-invalid': form.errors.num_convocatoria }"
                  required
                  placeholder="Número de la Convocatoria"
                />
                <jet-input-error :message="form.errors.num_convocatoria" />
              </div>
              <div class="col-md-4">
                <jet-label for="Ejercicio" value="Ejercicio:" />
                <jet-input
                  v-model="form.ejercicio"
                  :class="{ 'is-invalid': form.errors.ejercicio}"
                  required
                  placeholder="Ejercicio de la convocatoria"
                />
                <jet-input-error :message="form.errors.ejercicio" />
              </div>
              
              <div class="col-md-4">
                <jet-label for="Estatus" value="Estatus:" />
                <jet-input
                   v-model="form.status"
                   :class="{ 'is-invalid': form.errors.status }"
                   required
                   placeholder="Estatus de la convocatoria"
                />
                <jet-input-error :message="form.errors.status" />
              </div>

              
              <div
                class="btn-toolbar justify-content-between"
                role="toolbar"
                aria-label="Toolbar with button groups"
              >
                <div class="btn-group">
                  <Link
                    :href="route(`${routeName}index`)"
                    class="btn btn-outline-secondary btn-sm me-2"
                  >
                    <i class="bi bi-chevron-left"></i> Cancelar
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
                <div class="input-group">
                  <button
                    class="btn btn-outline-danger btn-sm"
                    v-if="!convocatorias.deleted_at"
                    type="button"
                    @click="eliminar"
                  >
                    <i class="bi bi-trash"></i> Eliminar Registro
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/inertia-vue3";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetButton from "@/Jetstream/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

export default {
  name: "Edit",
  props: {
    titulo: { type: String, required: true },
    convocatorias: { type: Object, required: true },
    routeName: { type: String, required: true },
  },
  components: {
    AppLayout,
    Link,
    JetLabel,
    JetInput,
    JetInputError,
    JetButton,
  },
  setup(props) {
    const form = useForm({ ...props.convocatorias });
    const guardar = () => {
      form.put(route("convocatoria.update", props.convocatorias.id));
    };
    const eliminar = () => {
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
          form.delete(route("convocatoria.destroy", props.convocatorias.id));
        }
      });
    };
    return { form, guardar, eliminar };
  },
};
</script>

<style>
</style>