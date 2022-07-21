<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Sistema de Federacion de Arbritos de la Federacion de Arbritos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Grupo 2 Ingenieria de Sotfware">
    <meta name="theme-color" content="#272b30">
    <link rel="icon" type="image/png" href="<?=media()?>img/icono.png" />
    <title><?=$data['page_tag']?></title>

    <!-- Main CSS--><


      <link data-require="sweet-alert@*" data-semver="0.4.2" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
    <link rel="stylesheet" type="text/css" href="<?=media();?>css/main.css">
    <link rel="stylesheet" type="text/css" href="<?=media();?>css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="<?=media();?>css/style.css">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />

    <!-- Font-icon css-->

  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?=base_url()?>dashboard"><img src="<?=media()?>img/logoFEF.png" alt="" style="width: 7rem;margin: 2px;"></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">


        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?=base_url()?>opciones"><i class="fa fa-cog fa-lg"></i> Configuración</a></li>
            <li><a class="dropdown-item" href="<?=base_url()?>perfil"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
            <li><a class="dropdown-item" href="<?=base_url()?>logout"><i class="fa fa-sign-out fa-lg"></i> Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <?php require_once "nav_admin.php";?>

  // EOF