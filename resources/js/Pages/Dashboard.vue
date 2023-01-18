<template>

  <Head> </Head>
  <Profe v-if="$page.props.user.rol == 2"></Profe>

  <Admin v-if="$page.props.user.rol == 1"></Admin>

  <Alumno v-if="$page.props.user.rol == 4"></Alumno>

  <Revisor v-if="$page.props.user.rol == 3"></Revisor>

<body>

<!-- Page loading spinner 
<div class="page-loading active">
  <div class="page-loading-inner">
    <div class="page-spinner"></div><span>Loading...</span>
  </div>
</div>-->



<main class="page-wrapper">
  <section class="container pt-5">
        <div class="row">
          <aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
            <div class="position-sticky top-0">
              <div class="text-center pt-5">
                <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
                  <img src="assets/img/avatar/18.jpg" class="d-block rounded-circle" width="120" alt="John Doe">
                  <button type="button" class="btn btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 mt-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change picture">
                    <i class="bx bx-refresh"></i>
                  </button>
                </div>
                <h2 class="h5 mb-1">{{ $page.props.user.name}} {{ $page.props.user.lastnamep}} {{ $page.props.user.lastnamem }}</h2>
                <p class="mb-3 pb-3">{{ $page.props.user.email}}</p>
                <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
                  <i class="bx bxs-user-detail fs-xl me-2"></i>
                  Menú
                  <i class="bx bx-chevron-down fs-lg ms-1"></i>
                </button>
                <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
                  <a href="account-details.html" class="list-group-item list-group-item-action d-flex align-items-center active">
                    <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
                    Detalles de la cuenta
                  </a>
                  <a :href="route('profile.show')" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-lock-alt fs-xl opacity-60 me-2"></i>
                    Seguridad de la cuenta
                  </a>
                  <a href="account-notifications.html" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-bell fs-xl opacity-60 me-2"></i>
                    Notificaciones
                  </a>
                  <a href="account-signin.html" class="list-group-item list-group-item-action d-flex align-items-center">
                    <i class="bx bx-log-out fs-xl opacity-60 me-2"></i>
                    Cerrar sesión
                  </a>
                </div>
              </div>
            </div>
          </aside>


          <div class="col-md-8 offset-lg-1 pb-5 mb-2 mb-lg-4 pt-md-5 mt-n3 mt-md-0">
            <div class="ps-md-3 ps-lg-0 mt-md-2 py-md-4">
              <h1 class="h2 pt-xl-1 pb-3"><i class='bx bx-lock-open-alt bx-flashing' style='color:#07179a'></i> B I E N V E N I D O</h1><hr><br>

              <!-- Basic info -->
              <h2 class="h5 text-primary mb-4">Información sobre tu cuenta</h2>
              <form class="needs-validation border-bottom pb-3 pb-lg-4" novalidate>
                <div class="row pb-2">
                  <div class="col-sm-6 mb-4">
                    <label for="fn" class="form-label fs-base">Teléfono</label>
                    <input type="text" id="fn" class="form-control form-control-lg" value="{{ page.props.user.name}}" required>
                    <div class="invalid-feedback">Please enter your first name!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="sn" class="form-label fs-base">Second name</label>
                    <input type="text" id="sn" class="form-control form-control-lg" value="Doe" required>
                    <div class="invalid-feedback">Please enter your second name!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="email" class="form-label fs-base">Email address</label>
                    <input type="email" id="email" class="form-control form-control-lg" value="jonny@email.com" required>
                    <div class="invalid-feedback">Please provide a valid email address!</div>
                  </div>
                  <div class="col-sm-6 mb-4">
                    <label for="phone" class="form-label fs-base">Phone <small class="text-muted">(optional)</small></label>
                    <input type="text" id="phone" class="form-control form-control-lg" data-format="custom" data-delimiter="-" data-blocks="2 3 4" data-numeral="9" placeholder="00-000-0000">
                  </div>
                  <div class="col-12 mb-4">
                    <label for="bio" class="form-label fs-base">Bio <small class="text-muted">(optional)</small></label>
                    <textarea id="bio" class="form-control form-control-lg" rows="4" placeholder="Add a short bio..."></textarea>
                  </div>
                </div>
                <div class="d-flex mb-3">
                  <button type="reset" class="btn btn-secondary me-3">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
</section> 
</main>
</body>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout.vue"
import Main from "./Main.vue"
import Admin from "@/Jetstream/Admin.vue";
import Profe from "@/Jetstream/Profe.vue";
import Head from '@/Jetstream/Head.vue';
import Revisor from '@/Jetstream/Revisor.vue';
import Alumno from '@/Jetstream/Alumno.vue';

export default{
  name:"Dashboard",
  components: {
    AppLayout,
    Main, 
    Admin,
    Profe, 
    Head,
    Alumno,
    Revisor
  }
};

methods: {
  (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1000);
        };
      })();
  
}
</script>

<style>

h1{
  text-align: center;
}
.page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #131022;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
</style>
