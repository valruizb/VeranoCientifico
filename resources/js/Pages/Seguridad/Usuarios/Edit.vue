<template>
  <app-layout title="Editar de Usuarios">
    <template #header>
      <h2 class="h4 font-weight-bold">
        <i class="bi bi-people-fill"></i> {{ titulo }}
      </h2>
    </template>
    <div class="card shadow-sm">
      <div class="row">
        <div class="col-md-12 pe-0">
          <div class="card-body border-right border-bottom p-3 h-100">
            <form class="row g-3 needs-validation" @submit.prevent="guardar">
              <DataFormEdit />
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
                    v-if="!record.deleted_at"
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
import { Link, useForm } from "@inertiajs/inertia-vue3";
import JetButton from "@/Jetstream/Button.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import DataFormEdit from "./DataFormEdit.vue";
import {provide} from "@vue/runtime-core";
import {ref} from "vue";
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

export default {
    name: "Edit",
    props:{
        titulo: String, 
        record: Object, 
        profiles: Array, 
        permissions: Object, 
        modules: Array,
        routeName: { type: String, required: true },
    },
    components:{
        AppLayout,
        Link,
        JetLabel,
        JetInput,
        JetInputError,
        JetButton,
        DataFormEdit,
    },
    setup(props) {
        const form = useForm({
            id : props.record.id,
            name: props.record.name,
            email: props.record.email,
            profiles: [...props.record.roles.map(p =>({id: p.id, name: p.name}))],
            permissions: [...props.record.permissions.map(p => ({id: p.id, name: p.name}))],
            deleted_at: props.record.delete_at
        });

        const guardar = () => {
            form.transform(data => ({...data,
                profiles :data.profiles.map(p => p.id),
                permissions:data.permissions.map(p => p.id),
            })).put(route('usuarios.update', props.record.id))
        };

        const eliminar = () => {
            Swal.fire({
                title              : '¿Esta seguro?',
                text               : 'Esta acción no se puede revertir',
                icon               : 'warning',
                showCancelButton   : true,
                cancelButtonColor  : '#d33',
                confirmButtonColor : '#3085d6',
                confirmButtonText  : 'Si!, eliminar registro!',
            }).then( res => {
                if(res.isConfirmed) form.delete(route('usuarios.destroy', props.record.id));
            });
        };

        provide('form', form);
        provide('profiles', props.profiles);
        provide('permissions', props.permissions);
        provide('destroy', eliminar);
        provide('modules', props.modules);

        return { form, guardar, eliminar};
    }
};
</script>

<style>
</style>