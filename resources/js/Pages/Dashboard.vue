<template>
  <Profe v-if="$page.props.user.tipouser == 2">
  </Profe>

<Admin v-if="$page.props.user.tipouser == 1">
</Admin>

</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue"
import Main from "./Main.vue"
import Admin from "@/Jetstream/Admin.vue";
import Profe from "@/Jetstream/Profe.vue";

export default{
  name:"Dashboard",
  components: {
    AppLayout,
    Main, 
    Admin,
    Profe
  }
};
</script>
