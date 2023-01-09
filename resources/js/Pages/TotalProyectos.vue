<template>
    <head lang="en"><meta charset="UTF-8"><title>Registro</title>
    <!-- Viewport -->
      <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Favicon and Touch Icons -->
      <link rel="icon" type="image/png" sizes="32x32" href="../../../public/img/TecNM_logo.png">
      <link rel="icon" type="image/png" sizes="16x16" href="../../../public/img/TecNM_logo.png">
      <link rel="manifest" href="../assets/favicon/site.webmanifest">
      <link rel="mask-icon" href="../assets/favicon/safari-pinned-tab.svg" color="#6366f1">
      <link rel="shortcut icon" href="../assets/favicon/favicon.ico">
      <meta name="msapplication-TileColor" content="#080032">
      <meta name="msapplication-config" content="../assets/favicon/browserconfig.xml">
      <meta name="theme-color" content="#ffffff">
      

      <!-- Vendor Styles -->
      <link rel="stylesheet" media="screen" href="../assets/vendor/boxicons/css/boxicons.min.css"/>
      
      <link rel="stylesheet" href="../../../public/assets/vendor/swiper/swiper-bundle.min.css" />
      <link rel="stylesheet" media="screen" href="../assets/vendor/prismjs/themes/prism.css"/>
      <link rel="stylesheet" media="screen" href="../assets/vendor/prismjs/plugins/toolbar/prism-toolbar.css"/>
      <link rel="stylesheet" media="screen" href="../assets/vendor/prismjs/plugins/line-numbers/prism-line-numbers.css"/>

      <!-- Main Theme Styles + Bootstrap -->
      <link rel="stylesheet" media="screen" href="../assets/css/theme.min.css">
    
    </head>
  <header class="header navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" id="logo">
        <img src="../../../public/img/logo.png" width="47" alt="Silicon">
        TecNM/Cenidet 
      </a>
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse2" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="form-check form-switch mode-switch order-lg-2 ms-4 ms-lg-auto me-lg-4" data-bs-toggle="mode">
        <input type="checkbox" class="form-check-input" id="theme-mode">
        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode">Light</label>
        <label class="form-check-label d-none d-sm-block d-lg-none d-xl-block" for="theme-mode">Dark</label>
      </div>
      <a id="btn" :href="route('login')" class="btn btn-secondary btn-sm fs-sm rounded order-lg-3 my-3 d-none d-lg-inline-flex">
        <i id="boxi" class='bx bx-user bx-flashing' ></i>
        Acceder al sistema
      </a>
      <nav id="navegador" class="collapse navbar-collapse">
        <hr class="d-lg-none mt-3 mb-2">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a id="lista" :href="route('proyectos')" class="nav-link">Proyectos</a>
          </li>
          <li class="nav-item">
            <a id="lista" :href="route('registro.create')" class="nav-link">Investigadores</a>
          </li>
          <li class="nav-item">
            <a id="lista" :href="route('acercaverano.index')" class="nav-link">Acerca del Verano</a>
          </li>
          <li class="dropdown" id="cont">
            <a id="text" class="dropdown-item" data-bs-toggle="dropdown" aria-expanded="false">Registro</a>
              <ul class="dropdown-menu" id="menu">
                <li><a id="opt" class="dropdown-item" :href="route('registro.create')">Registrate aquí</a></li>
              </ul>
          </li>
        </ul>
      </nav>
    </div>
  </header><br><br><br><br>
  </template>