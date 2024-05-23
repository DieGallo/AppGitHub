<?php
  $cantCarrito = 0;
  if(isset($_SESSION['arrCarrito']) and count($_SESSION['arrCarrito']) > 0){
    foreach ($_SESSION['arrCarrito'] as $product) {
      $cantCarrito += $product['cantidad'];
    }
  }
  //dep($_SESSION['userData']); Muestra el array de los datos del cliente
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= $data['page_tag']; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <?php
    $nombreSitio = NOMBRE_EMPRESA;
    $descripcion = DESCRIPCION;
    $nombreProducto = NOMBRE_EMPRESA;
    $urlWeb = base_url();
    //El tamaño de la portada debe de ser de 560px X 292px
    $urlImg = media()."/images/portada.jpg";
    if(!empty($data['producto'])){
      //$descripcion = $data['producto']['descripcion'];
      $descripcion = DESCRIPCION;
      $nombreProducto = $data['producto']['nombre'];
      $urlWeb = base_url().'/tienda/producto/'.$data['producto']['idproducto'].'/'.$data['producto']['ruta'];
      $urlImg = $data['producto']['images'][0]['url_image'];
    }
  ?>
  <meta preperty="og:locale" content="es_ES"/>
  <meta preperty="og:type" content="website"/>
  <meta preperty="og:site_name" content="<?= $nombreSitio; ?>"/>
  <meta preperty="og:description" content="<?= $descripcion; ?>"/>
  <meta preperty="og:title" content="<?= $nombreProducto; ?>"/>
  <meta preperty="og:url" content="<?= $urlWeb; ?>"/>
  <meta preperty="og:image" content="<?= $urlImg; ?>"/>
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?= media(); ?>/images/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/slick/slick.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/tienda/css/main.css">
  <link rel="stylesheet" type="text/css" href="<?= media(); ?>/css/style.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
  <div class="modal fade" id="modalAyuda" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Preguntas Frecuentes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Nam sunt culpa aliquam et cumque optio non quia dolorem esse quod debitis corrupti dignissimos id nisi sapiente in dolore voluptatem, vitae? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam iusto illo ea, accusamus asperiores eius omnis labore cum numquam iste, mollitia beatae fuga corporis, neque necessitatibus veniam error quia alias. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br>

          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit beatae in maiores vel ut aut vero nam autem voluptatum, adipisci recusandae consequatur, aliquid quis laborum facilis distinctio non placeat, sit?Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div id="divLoading">
    <div>
      <img src="<?= media();?>/images/loading.svg" alt="Loading">
    </div>  
  </div>
  
  <!-- Header -->
  <header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
      <!-- Topbar -->
      <div class="top-bar">
        <div class="content-topbar flex-sb-m h-full container">
          <div class="left-top-bar">
            <?php if(isset($_SESSION['login'])){ ?>
            ¡Qué bueno que ya estás aquí: <?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'] ?>!
            <?php } ?>
          </div>

          <div class="right-top-bar flex-w h-full">
            <a href="#" class="flex-c-m trans-04 p-lr-25" data-toggle="modal" data-target="#modalAyuda">
              Help & FAQs
            </a>
            <?php 
              if(isset($_SESSION['login'])){
            ?>
            <a href="<?= base_url() ?>/dashboard" class="flex-c-m trans-04 p-lr-25">
              Mi Cuenta
            </a>
            <?php } 
              if(isset($_SESSION['login'])){
            ?>
            <a href="<?= base_url() ?>/logout" class="flex-c-m trans-04 p-lr-25">
              Salir
            </a>
            <?php }else{ ?>
            <a href="<?= base_url() ?>/login" class="flex-c-m trans-04 p-lr-25">
              Iniciar Sesión
            </a>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="wrap-menu-desktop">
        <nav class="limiter-menu-desktop container">
          
          <!-- Logo desktop -->   
          <a href="<?= base_url(); ?>" class="logo">
            <img src="<?= media(); ?>/tienda/images/icons/logo-01.png" alt="IMG-LOGO">
          </a>

          <!-- Menu desktop -->
          <div class="menu-desktop">
            <ul class="main-menu">
              <li class="active-menu">
                <a href="<?= base_url(); ?>">Inicio</a>
              </li>
              <li>
              <!--<li class="label1" data-label1="hot">-->
                <a href="<?= base_url(); ?>/tienda">Tienda</a>
                <!--<ul class="sub-menu">
                  <li><a href="index.html">Categoria1</a></li>
                  <li><a href="home-02.html">Categoria2</a></li>
                  <li><a href="home-03.html">Categoria3</a></li>
                </ul>-->
              </li>
              <li>
                <a href="<?= base_url(); ?>/carrito">Carrito</a>
              </li>

              <li>
                <a href="<?= base_url(); ?>/nosotros">Nosotros</a>
              </li>

              <li>
                <a href="<?= base_url(); ?>/contacto">Contacto</a>
              </li>
            </ul>
          </div>  

          <!-- Icon header -->
          <div class="wrap-icon-header flex-w flex-r-m">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
              <i class="zmdi zmdi-search"></i>
            </div>
            <?php if($data['page_name'] != "carrito" && $data['page_name'] != "procesarpago"){ ?>
            <div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $cantCarrito; ?> ">
              <i class="zmdi zmdi-shopping-cart"></i>
            </div>
            <?php } ?>
          </div>
        </nav>
      </div>  
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
      <!-- Logo moblie -->    
      <div class="logo-mobile">
        <a href="<?= base_url(); ?>"><img src="<?= media(); ?>/tienda/images/icons/logo-01.png" alt="IMG-LOGO"></a>
      </div>

      <!-- Icon header -->
      <div class="wrap-icon-header flex-w flex-r-m m-r-15">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
          <i class="zmdi zmdi-search"></i>
        </div>
        <?php if($data['page_name'] != "carrito" && $data['page_name'] != "procesarpago"){ ?>
        <div class="cantCarrito icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?= $cantCarrito; ?>">
          <i class="zmdi zmdi-shopping-cart"></i>
        </div>
        <?php } ?>
      </div>

      <!-- Button show menu -->
      <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </div>
    </div>

    <!-- Menu Mobile -->
    <div class="menu-mobile">
      <ul class="topbar-mobile">
        <li>
          <div class="left-top-bar">
            <?php if(isset($_SESSION['login'])){ ?>
            ¡Qué bueno que ya estás aquí: <?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos'] ?>
            <?php } ?>
          </div>
        </li>

        <li>
          <div class="right-top-bar flex-w h-full">
            <a href="#" class="flex-c-m trans-04 p-lr-25" data-toggle="modal" data-target="#modalAyuda">
              Help & FAQs
            </a>
            <?php 
              if(isset($_SESSION['login'])){
            ?>
            <a href="<?= base_url() ?>/dashboard" class="flex-c-m trans-04 p-lr-25">
              Mi Cuenta
            </a>
            <?php } 
              if(isset($_SESSION['login'])){
            ?>
            <a href="<?= base_url() ?>/logout" class="flex-c-m trans-04 p-lr-25">
              Salir
            </a>
            <?php }else{ ?>
            <a href="<?= base_url() ?>/login" class="flex-c-m trans-04 p-lr-25">
              Iniciar Sesión
            </a>
            <?php } ?>
          </div>
        </li>
      </ul>

      <ul class="main-menu-m">
        <li class="active-menu">
          <a href="<?= base_url(); ?>">Inicio</a>
        </li>

        <li class="label1" data-label1="hot">
          <a href="<?= base_url(); ?>/tienda">Tienda</a>
          <ul class="sub-menu">
            <li><a href="index.html">Categoria1</a></li>
            <li><a href="home-02.html">Categoria2</a></li>
            <li><a href="home-03.html">Categoria3</a></li>
          </ul>
        </li>

        <li>
          <a href="<?= base_url(); ?>/carrito">Carrito</a>
        </li>

        <li>
          <a href="<?= base_url(); ?>/nosotros">Empresa</a>
        </li>

        <li>
          <a href="<?= base_url(); ?>/catalogo">Catálogo</a>
        </li>

        <li>
          <a href="<?= base_url(); ?>/contacto">Contacto</a>
        </li>
      </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
      <div class="container-search-header">
        <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
          <img src="<?= media() ?>/tienda/images/icons/icon-close2.png" alt="CLOSE">
        </button>

        <form class="wrap-search-header flex-w p-l-15" method="get" action="<?= base_url() ?>/tienda/search" >
          <button class="flex-c-m trans-04">
            <i class="zmdi zmdi-search"></i>
          </button>
          <input type="hidden" name="p" value="1">
          <input class="plh3" type="text" name="s" placeholder="Buscar...">
        </form>
      </div>
    </div>
  </header>
  <!-- Cart -->
  <div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
      <div class="header-cart-title flex-w flex-sb-m p-b-8">
        <span class="mtext-103 cl2">
          Tu Carrito
        </span>

        <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
          <i class="zmdi zmdi-close"></i>
        </div>
      </div>
      
      <div id="productosCarrito" class="header-cart-content flex-w js-pscroll">
        <?php getModal('modalCarrito',$data); ?>
      </div>
    </div>
  </div>