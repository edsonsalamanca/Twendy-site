<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sistema de Agendamento</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_2/style.css" />
    <!-- End layout styles -->
    <link rel="icon" href="logo/logo.jpg">
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
      <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="dashboard.php">
                <img src="assets/images/logo.svg" alt="logo" />
                <span class="font-12 d-block font-weight-light">PRÓ-SERVIR </span>
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav mr-lg-2">
                <li class="nav-item nav-search d-none d-lg-block">
                  <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Buscar serviço" aria-label="search" aria-describedby="search" />
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img src="assets/images/faces/face1.jpg" alt="image" />
                    </div>
                    <div class="nav-profile-text">
                      <p class="text-black font-weight-semibold m-0"> Madalena </p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-cached mr-2 text-success"></i> Configurar </a>
                    <div class="dropdown-divider"></div>

                    
                      <a class="dropdown-item" href="#">
                      <i class="mdi mdi-key-variant mr-2 text-primary"></i> Aterar senha </a>
                      <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-logout mr-2 text-primary"></i> Sair </a>
                      
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </div>
        </nav>
        <nav class="bottom-navbar">
          <div class="container">
            <ul class="nav page-navigation">
              <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                  <i class="mdi mdi-home-circle menu-icon"></i>
                  <span class="menu-title">INICIO</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="mdi mdi-account menu-icon"></i>
                  <span class="menu-title">Utilizador</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="submenu">
                  <ul class="submenu-item">
                    <li class="nav-item">
                      <a class="nav-link" href="utilizador.php">Utilizador</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="cliente.php">Cliente</a>
                    </li>
                    
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="servico.php">
                  <i class="mdi mdi-settings menu-icon"></i>
                  <span class="menu-title">Serviço</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="agendamento.php">
                  <i class="mdi mdi-calendar menu-icon"></i>
                  <span class="menu-title">Agendamento</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/charts/chartjs.html">
                  <i class="mdi mdi-chart-bar menu-icon"></i>
                  <span class="menu-title">Orçamento</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                  <i class="mdi mdi-bank menu-icon"></i>
                  <span class="menu-title">Dados da Empresa</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://www.bootstrapdash.com/demo/plus-free/documentation/documentation.html" class="nav-link" target="_blank">
                  <i class="mdi mdi-file-pdf menu-icon"></i>
                  <span class="menu-title">Relatório</span></a>
              </li>
              <li class="nav-item">
                <div class="nav-link d-flex">
                  <button class="btn btn-sm bg-danger text-white"> Criar Projeto </button>
                  
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>