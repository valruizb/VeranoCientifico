<template>
  <app-layout title="Calendario de Eventos">
    <template #header>
      <h2 class="h4 font-weight-bold">
        <i class="bi bi-calendar-date"></i> {{ titulo }}
      </h2>
    </template>
    <div class="card shadow-sm">
      <div class="row">
        <div class="col-md-12 pe-0">
          <div class="card-body border-right border-bottom p-3 h-100">
            <form class="row g-3 needs-validation" @submit.prevent="guardar">
              <div class="col-md-6">
                <jet-label for="Convocatoria" value="Convocatoria:" />
                <select class="form-select"
                    :class="{ 'is-invalid': form.errors.id_convocatoria }" 
                    v-model="form.id_convocatoria">
                    <option value="">Seleccione una opción</option>
                    <option v-for="item in convocatorias" v-bind:value="item.id" v-bind:key="item.id" >{{ item.nombre }}</option>
                </select>
                <jet-input-error :message="form.errors.id_convocatoria" />
              </div>
              
              <div class="col-md-6">
                <jet-label for="Evento" value="Evento:" />
                <select class="form-select" 
                    :class="{ 'is-invalid': form.errors.id_evento }" 
                    v-model="form.id_evento">
                    <option value="">Seleccione una opción</option>
                    <option v-for="item in eventos" v-bind:value="item.id" v-bind:key="item.id" >{{ item.nombre }}</option>
                </select>
                <jet-input-error :message="form.errors.id_evento" />
              </div>
              
              <div class="col-md-4">
                <jet-label for="Fecha Inicio" value="Fecha Inicio:" />
                <jet-input v-model="form.fec_inicio" type="date" :class="{ 'is-invalid': form.errors.fec_inicio }" placeholder="Fecha Inicio"/>
                <jet-input-error :message="form.errors.fec_inicio" />
              </div>
              
               <div class="col-md-4">
                <jet-label for="Fecha Fin" value="Fecha Fin:" />
                <jet-input v-model="form.fec_fin" type="date" :class="{ 'is-invalid': form.errors.fec_fin }" placeholder="Fecha Fin"/>
                <jet-input-error :message="form.errors.fec_fin" />
              </div>

              <div class="col-md-4">
                <jet-label for="Comentario" value="Comentario:" />
                <jet-input
                  v-model="form.comentario"
                  :class="{ 'is-invalid': form.errors.comentario}"
                  required
                  placeholder="Comentario"
                />
                <jet-input-error :message="form.errors.comentario" />
              </div>

              <div class="px-6 py-4">
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
import { ref } from "vue";

export default {
  name: "Create",
  props: {
    titulo: { type: String, required: true },
    routeName: { type: String, required: true },
    convocatorias: { type: Object, required: true },
    eventos: { type: Object, required: true },
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
    const form = useForm({ id_convocatoria: "", id_evento: "", fec_inicio: "", fec_fin:"", comentario:""});
    const guardar = () => {
      form.post(route("calendario.store"));
    };

    return { form, guardar };
  },
};
</script>

<style>
</style>