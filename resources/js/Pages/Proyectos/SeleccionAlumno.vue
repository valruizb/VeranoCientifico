<template>
  <Head> </Head>

  <Profe> </Profe>

    <div class="contenido">
              <div class="forma1">
                <h2 class="h4 font-weight-bold text-center">
                  <br><i class="bi bi-bricks"></i> {{ titulo }}
                </h2>
                <div class="card-body border-right border-bottom p-3 h-100">
                  <form class="row g-3 needs-validation" @submit.prevent="guardar">

                  </form>
                  <a :href="cvu" target="_blank"><button type="button" title="Ver" class="btn btn-info btn-sm">
                    <i class='boxi bi bi-eye-fill' style='color:#ffffff'></i>
                </button>&nbsp;&nbsp;  </a>
              </div>
            </div>
    </div>
</template>

  <script>
import { defineComponent } from 'vue'
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue'
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue'
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue'
import { Link } from '@inertiajs/inertia-vue3'
import Swal from 'sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import axios from 'axios';
import AppLayout from "@/Layouts/AppLayout.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetButton from "@/Jetstream/Button.vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { ref } from "vue";
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import Profe from "@/Jetstream/Profe.vue";
import Head from "@/Jetstream/Head.vue";


  export default {
    name: "Create",
    props: {
      titulo: { type: String, required: true },
      routeName: { type: String, required: true },
      tematica: {type:Object, required:true},
      subtematica: {type:Object, required:true},
      idlog: {type:Object, required:true},
      idinstlog: {type:Object, required:true},
      cvu: { type: String, required: true }
    },
    components: {
      AppLayout,
      Link,
      Profe,
      JetLabel,
      Head,
      JetInput,
      JetInputError,
      JetButton,
      JetDropdownLink,
    },
    setup(props) {
      const form = useForm({
        title: "",
        studentnum: "",
        thematic_id: "",
        subthematic_id: "",
        generalobject: "",
        modality: "",
        requirements: "",
        keywords:"",
        institution_id:"",
        user_id: "",
      });

      const guardar = () => {
        form.user_id = props.idlog;
        form.institution_id = props.idinstlog;
        form.post(route("proyectos.store"));
      };

      return { form, guardar };
    },

    methods: {
        logout() {
        this.$inertia.post(route('logout'));
        }
      },

  };

  </script>

  <style scoped>

        .btncancelar{
          background-color: #920707;
          color: #ffffff;
        }

        .btnguardar{
          background-color: #092252;
          color: #ffffff;
        }

        .label{
          color: #092252;
        }

        .forma1{
        width: 65%;
        border-radius: 20px;
        box-sizing: border-box;
        background-color: #ffffff;
        margin-top: 10%;
        margin-left: 17%;
        box-shadow: 19px 14px 14px 20px #cbced1, -14px -14px 20px rgba(216, 213, 213, 0.137);
        }

        .contenido{
          background-color: #ffffff;
        }


        [id="cuenta"]:hover{
          background-color: #c90c0cec;
          color: rgb(255, 255, 255);
          font-style: bold;
        }

        [id="btn"]:hover, [id="guardar"]:hover{
          background-color: rgba(6, 42, 107, 0.986);
          color: rgb(255, 255, 255);
          font-style: bold;
        }

        [id="btn"]{
          background-color: #092252;
          color: rgb(255, 255, 255);
          width: 16%;
          border-radius: 10px;
          padding: 12px;
          margin-left: 40px;
          margin-right: -8%;
        }

        [id="guardar"]{
          background-color: #092252;
          color: rgb(255, 255, 255);
          width: 16%;
          padding: 12px;
          margin-left:10%;
          border-radius: 10px;
          margin-right: -8%;
          outline: none;
          border: #092252;
        }

        i[id="boxi2"]{
          font-size: 21px;
          padding: 5px;
        }

        i[id="boxi3"]{
          font-size: 17px;
          padding: 1px;
        }

        [id="guardar"]:hover{
          background-color: rgba(6, 42, 107, 0.986);
          color: rgb(255, 255, 255);
          font-style: bold;
        }

        /*Barra de navegacion */
        .header{
          position: fixed;
        }

        i[id="boxi"]{
          font-size: 19px;
          padding: 5px;
        }


        .navbar{
          width: 100%;
        }

        a[id="text"]{
          font-size: bold;
          padding-top: 10px;
          display: block;
        }

        nav[id="navegador"]{
        font-size: 18px;
        color: #092252;
        margin-left: 2%;
        }

        li{
          padding: 18px;
        }

        a[id="logo"]{
          margin-left: -8%;
          height: 80px;
        }

        a[id="lista"]:hover{
          background-color:rgba(195, 197, 214, 0.795);
          border-radius: 15px;
        }


        a[id="opt"]:hover{
          background-color:rgba(230, 231, 240, 0.932);
          color: #092252;
          border-radius: 12px;
        }

        a[id="opt"]{
          cursor: pointer;
          background-color:rgb(255, 255, 255);
          color: #092252;
          padding-top: 5px;
          border-radius: 10px;
        }

        li[id="cont"]::after, li[id="cont"]::before{
          content: '';
          position: absolute;
          background-color: rgb(22, 9, 82);
          width: 3px;
          height: 11px;
          top: 35px;
          border-radius: 5px;
          transition: all 0.3s;
        }

        div[id="auth"]{
          left: 330px;
        }

        p[id="auth_user"]{
          position: absolute;
          left: 50px;
          width: 220px;
          font-size: 15px;
          color: #092352a8;
        }

        li[id="cont"]{
          min-height: 45px;
          position: relative;
          width: 150px;
          margin-left: -10px;
          text-align: center;
          cursor: pointer;
          color: #092252;
        }

        li[id="cont"]::after{
          transform: rotate(45deg);
          left:171%;
        }

        li[id="cont"]::before{
          transform: rotate(-45deg);
          left:175%;
        }

        li[id="cont"]:hover::after{
          transform: rotate(135deg);
        }

        li[id="cont"]:hover::before{
          transform: rotate(-135deg);
        }

        p{
          margin-bottom: 0 ;
          font-size: 18px;
        }

  </style>