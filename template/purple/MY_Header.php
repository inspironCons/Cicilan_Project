<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=title()?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/bootstrap-daterangepicker.css">
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/sweetalert2.min.css">
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=get_template_directory(dirname(__FILE__),'')?>images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?=set_url('konsumen')?>"><img src="<?=get_template_directory(dirname(__FILE__),'')?>images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="<?=set_url('konsumen')?>"><img src="<?=get_template_directory(dirname(__FILE__),'')?>images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="<?=get_template_directory(dirname(__FILE__),'')?>images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?=get_user_info('username')?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?=set_url('logout')?>">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Keluar
              </a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-email-outline"></i>
              <span class="count-symbol bg-warning"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <h6 class="p-3 mb-0">kiriman</h6>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                    <img src="<?=get_template_directory(dirname(__FILE__),'')?>images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a message</h6>
                  <p class="text-gray mb-0">
                    1 Minutes ago
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <h6 class="p-3 mb-0 text-center">4 new messages</h6>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?=get_template_directory(dirname(__FILE__),'')?>images/faces/face1.jpg" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?=get_user_info('username')?></span>
                <span class="text-secondary text-small"><?=get_user_info('role')?></span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Konsumen</span>
              <i class="menu-arrow"></i>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=set_url('konsumen#tambah')?>">Tambah</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=set_url('konsumen')?>">Data</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=set_url('permintaan')?>">
              <span class="menu-title">Permintaan</span>
              <i class="mdi mdi-bell-ring menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=set_url('Laporan')?>">
              <span class="menu-title">Laporan</span>
              <i class="mdi mdi-book menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=set_url('akun')?>">
              <span class="menu-title">Akun</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>