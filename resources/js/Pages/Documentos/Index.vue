<template>
    <!----<Head>   </Head>

    <Admin v-if="$page.props.user.rol == 1"> </Admin>-->

<body><br><br><br><br>
  <div class="nav_bar">
    <ul>
      <li><a id="onlink" :href="route('instituciones.index')" class="nav-link">Paso 4</a></li>
      <li><a id="lista" :href="route('instituciones.index')" class="nav-link">Paso 4</a></li>
      <li><a id="lista" :href="route('instituciones.index')" class="nav-link">Paso 3</a></li>
      <li><a id="lista" :href="route('instituciones.index')" class="nav-link">Paso 5</a></li>
      <li><a id="lista" :href="route('instituciones.index')" class="nav-link">Paso 5</a></li>
      <li><a id="lista" :href="route('instituciones.index')" class="nav-link">Paso 6</a></li>
    </ul>
  </div>
  <div class="container">
    <p>Cargar archivos</p>

  </div>
</body>
</template>

<script>
    import Input from "@/Jetstream/Input.vue";
    import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
    import JetLabel from "@/Jetstream/Label.vue";
    import JetInput from "@/Jetstream/Input.vue";
    import JetInputError from "@/Jetstream/InputError.vue";
    import JetButton from "@/Jetstream/Button.vue";
    import 'sweetalert2/dist/sweetalert2.min.css';
    import Admin from "@/Jetstream/Admin.vue";
    import Head from '@/Jetstream/Head.vue';

    export default {
        name: "Index",
        props: {

        },
        components: {
            Admin,
            Head,
        },

    }
</script>
<style :scope>
  body{
    margin: auto;
    background: #efefefef ;
  }

  .nav_bar{
    margin: auto;
    border-bottom: 1px solid rgb(12, 12, 12);
    width: 860px;
    padding: 0px 20px 0px 20px;
    height: 56px;
    margin-top: 30px;
  }

  .nav_bar ul{
    padding: 0;
    list-style: none;
  }

  .nav_bar ul li{
    float: left;
    font-size: 16px;
    font-weight: bold;
    margin-right: 10px;
  }

  .nav_bar ul li a{
    text-decoration: none;
    color: #000000;
    background-color: aqua;
    border: 1px solid #000000;
    border-bottom: none;
    padding: 23px 20px 22px 20px;
    margin-top: -17px;
    -webkit-border-top-right-radius: 10px;
    -webkit-border-top-left-radius: 10px;
    -moz-border-radius-topleft: 10px;
    -moz-border-radius-topright: 10px;
    width: 110px;
    display: block;
    text-align: center;
  }

  .nav_bar ul li a:hover{
    text-decoration: none;
    color: #000000;
    background: #b81111ef ;
    -moz-transition: background 200ms ease-in;
    -webkit-transition: background 200ms ease-in;
    -ms-transition: background 200ms ease-in;
    -o-transition: background 200ms ease-in;
    transition: background 200ms ease-in;
  }

  .nav_bar ul li a#onlink{
    background: #efefefef;
    color: #000000;
    border-bottom: 1px solid #ffffff;
  }

  .nav_bar ul li a#onlink:hover{
    background: #ffffff ;
    color: #000000;
  }

  .container{
    margin: auto;
    width: 860px;
    padding: 20px;
    border: 1px solid #000000;
    min-height: 400px;
    border-top: none;
    background-color: #ffffffff;
  }

  .container p{
    font-size: 14px;
    margin: 0;
    padding: 0;
  }

</style>