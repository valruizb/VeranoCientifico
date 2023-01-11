<template>
  <Head title="Verificación de correo" />
    <br><br><img src="../../../../public/img/logo.png" width="">

  <jet-authentication-card >
    <br><h2>Verificación de correo electrónico</h2><hr><hr><hr>
      <div class="card text-center">
      
      <div class="text">
        Gracias por registrarte! Antes de comenzar, deberá verificar su dirección de correo electrónico 
        haciendo clic en el enlace que le acabamos de enviar por correo electrónico.
        Si usted no recibió el correo, con gusto te enviaremos otro.
      </div>

      <br><br><div class="alert alert-success" role="alert" v-if="verificationLinkSent">
        Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionó
        durante el registro.
      </div>

      <form @submit.prevent="submit">
        <div class="mt-4 d-flex justify-content-between">
          <jet-button class="boton"
            :class="{ 'text-white-50': form.processing }"
            :disabled="form.processing"
          >
            <div v-show="form.processing" class="spinner-border spinner-border-sm" role="status">
              <span class="visually-hidden">Loading...</span>
            </div>
            Reenviar Link de Verificación
          </jet-button>

          <Link
            :href="route('logout')"
            method="post"
            as="button"
            class="btn btn-link"
            >Log out</Link
          >
        </div>
      </form>
      </div>
  </jet-authentication-card>
</template>

<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue"
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue"
import JetButton from "@/Jetstream/Button.vue"
import { Head, Link } from "@inertiajs/inertia-vue3"

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    Link
  },

  props: {
    status: String
  },

  data() {
    return {
      form: this.$inertia.form()
    };
  },

  methods: {
    submit() {
      this.form.post(this.route("verification.send"));
    }
  },

  computed: {
    verificationLinkSent() {
      return this.status === "verification-link-sent";
    }
  }
})
</script>
<style :scope>

  img{
    width: 80px;
    margin-left: 48%;
  }

  .card{
    margin-top: -55px;
     
  }

  .verificacion{
    box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px rgba(216, 213, 213, 0.137);
  }

  h2{
    text-align: center;
    font-weight: bolder;
  }

  .boton{
    background-color: rgb(15, 17, 129);
  }

  .text{
    color: black;
  }

</style>
