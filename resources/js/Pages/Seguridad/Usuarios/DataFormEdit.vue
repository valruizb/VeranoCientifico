<template>
  <div class="col-md-6">
    <span class="text-danger mr-1">*</span>
    <jet-label for="name">Nombre del Usuario:</jet-label>
    <jet-input
      id="nombre"
      v-model="form.name"
      :class="{ 'is-invalid': form.errors.name }"
      placeholder="Nombre del usuario"
    />
    <jet-input-error :message="form.errors.name" />
  </div>
  <div class="col-md-6">
    <span class="text-danger mr-1">*</span>
    <jet-label for="description">Correo Electrónico:</jet-label>
    <jet-input
      id="email"
      type="email"
      v-model="form.email"
      :class="{ 'is-invalid': form.errors.email }"
      placeholder="Correo electrónico"
    />
    <jet-input-error :message="form.errors.email" />
  </div>
  <hr />
  <div class="d-flex flex-row bd-highlight pt-2">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th style="width: 5%">&nbsp;</th>
          <th style="width: 30%">Nombre del Rol</th>
          <th style="width: 40%">Descripción</th>
          <th style="width: 20%">Estatus</th>
          <th style="width: 30%">&nbsp;</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="item in profiles" :key="item.id">
          <td>&nbsp;</td>
          <td v-html="item.name"></td>
          <td v-html="item.description"></td>
          <td>
            <div class="form-check form-switch">
              <input
                class="form-check-input"
                type="checkbox"
                v-model="form.profiles"
                :value="{ id: item.id, name: item.name }"
                :id="`chk${item.id}`"
                :checked="isCheckedProfile(item)"
                @change="associateProfile(item)"
              />
              <label
                class="custom-control-label font-weight-bold"
                :for="`chk${item.id}`"
              ></label>
            </div>
          </td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<script>
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetButton from "@/Jetstream/Button.vue";
import JetDangerButton from "@/Jetstream/DangerButton.vue";
import { computed, inject, reactive, ref, toRefs } from "vue";
import Pagination from "@/Shared/Pagination.vue";

export default {
  name: "DataForm",
  components: {
    Pagination,
    JetLabel,
    JetInput,
    JetInputError,
    JetButton,
    JetDangerButton,
  },
  setup() {
    const form = inject("form");
    const profiles = inject("profiles");

    const isChecked = (permission) =>
      form.permissions.some((permiso) => permission.id === permiso.id);

    // Associate profile and select all permissions
    const associateProfile = (profile) => {
      if (form.profiles.some((item) => profile.id === item.id)) {
        profile.permissions.forEach((item) =>
          form.permissions.push({ id: item.id, name: item.name })
        );
      } else {
        profile.permissions.forEach((item) => {
          const index = form.permissions.findIndex(
            (formItem) => formItem.id === item.id
          );
          if (index > -1) {
            form.permissions.splice(index, 1);
          }
        });
      }
    };

    const isCheckedProfile = (profile) =>
      form.profiles.some((item) => profile.id === item.id);


    return {
      form,
      // actions
      associateProfile,
      isCheckedProfile,
      // injects
      profiles,
      isChecked,
    };
  },
};
</script>

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
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreusuarioRequest;
use App\Http\Requests\UpdateusuarioRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\modulo;
use Inertia\Response;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    protected string $routeName;
    protected string $source;
    protected string $module = 'usuarios';
    protected User $model;

    public function __construct()
    {
        $this->routeName = "usuarios.";
        $this->source    = "Seguridad/Usuarios/";
        $this->model     = new User();
        $this->middleware("permission:{$this->module}.index")->only(['index', 'show']);
        $this->middleware("permission:{$this->module}.store")->only(['store', 'create']);
        $this->middleware("permission:{$this->module}.update")->only(['edit', 'update']);
        $this->middleware("permission:{$this->module}.delete")->only(['destroy']);
    }

    public function index(Request $request): Response
    {
        //$usuarios = User::with('institutions')->get();
        $request->validate(['search' => 'nullable']);

        $usuarios = $this->model::filtro($request->all('search', 'profile'))
            ->with('roles')
            ->orderBy('id')
            ->paginate(10)
            ->withQueryString();
           
        return Inertia::render('Seguridad/Usuarios/Index', [
            'titulo'   => 'Catálogo de Usuarios',
            'usuarios' =>$usuarios,
            'profiles' => Role::get(['id', 'name']),
            'routeName'=> $this->routeName,
            'loadingResults' => false,
            'filtro' => $request->all('search','profile'),
        ]);

    }
    public function create(): Response
    {
        /* $permissions = Cache::rememberForever('permissions', function () {
            return Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray();
        }); */
        return Inertia::render("{$this->source}Create", [
            'titulo'=> 'Agregar Usuarios',
            'routeName'=> $this->routeName,
            'profiles'=> Role::with('permissions:id,name,description,module_key')->orderBy('name')->select('id', 'name', 'description')->get(),
            'permisos'=> Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray(),
            'modulos'=> modulo::orderBy('key')->get(['id', 'nombre', 'descripcion', 'key'])
        ]);
        
    }
    public function store(StoreusuarioRequest $request): RedirectResponse
    {
        $fields= $request->validated();
        $fields['password'] = Hash::make($fields['password']);
        $usuario = $this->model::create($fields);
        $roles = Role::whereIn('id', $request->profiles)->get();
        $usuario->syncRoles($roles);
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado con éxito!');

    }
    public function show()
    {
        abort(405);
    }
    public function edit(User $usuarios):Response
    {
        //dd($usuarios);
       /*  $perfil = Cache::rememberForever("profile.{$perfil->id}", function () use ($perfil) {
            return $perfil->load('permissions:id,name,description,module_key');
        }); */
        /* $permissions = Cache::rememberForever('permissions', function () {
            return Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray();
        }); */
        return Inertia::render("{$this->source}Edit", [
            'titulo'    => 'Editar Usuarios.',
            'routeName' => $this->routeName,
            'record' => $usuarios->load('roles:id,name','permissions:id,name'),
            'profiles' => Role::with('permissions:id,name,description,module_key')->orderBy('name')->select('id', 'name', 'description')->get(),
            'permissions' => Permission::get(['id', 'name', 'description', 'module_key'])->groupBy('module_key')->toArray(),
            'modules' => modulo::orderBy('key')->get(['id', 'nombre', 'descripcion', 'key'])
        ]);
    }
    public function update(UpdateusuarioRequest $request, User $usuarios)
    {
        //dd($usuarios);
        $usuarios->update($request->validated());
        $roles = Role::whereIn('id', $request->profiles)->get();
        //$permissions = Permission::whereIn('id', $request->permissions)->get();
        $usuarios->syncRoles($roles);
        //$usuario->syncPermissions($permissions);
        return redirect()->route('usuarios.index')->with('success', 'Usuario modificado con éxito');
    }
    public function destroy(User $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito');
    }
}