<template>

    <div class="pie">
            <h2>Accede a Nuestro Sistema o </h2>
            <h2>Suscríbete</h2><br>
            <p>© Todos los derechos Reservados. Hecho con <i class='bx bxs-heart bx-flashing' style="color:#f30909" ></i> por el <a id="linktec" target="blank" href="https://cenidet.tecnm.mx/">TecNM/Cenidet</a></p><br><br>
    </div>

  </template>
  
  <script>
  import { defineComponent } from "vue"
  import { Link } from '@inertiajs/inertia-vue3';

  
  export default defineComponent({
    components: {
      Link,
    },
    
  });

  </script>
  
  <style scoped>
  
  .pie{
    text-align: center;
  }
  
  
  </style>
  
  
  
  