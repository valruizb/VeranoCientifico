<template>
  <app-layout title="Bienvenido">
    <template #header>
      <h2 class="h4 font-weight-bold">
        <i class="bi bi-house-fill"></i>Menú Principal
      </h2>
    </template>

    <Main />
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue"
import Main from "./Main.vue"

export default{
  name:"Dashboard",
  components: {
    AppLayout,
    Main
  }
};
</script>
