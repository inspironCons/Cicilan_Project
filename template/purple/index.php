<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=title()?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=get_template_directory(dirname(__FILE__),'')?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=get_template_directory(dirname(__FILE__),'')?>images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="<?=get_template_directory(dirname(__FILE__),'')?>images/logo.svg">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              
              <form class="pt-3" id="form-login" action="<?=set_url('login')?>" method="post" autocomplete="off">
                <div class="form-group"><small><?php echo form_error('username');?></small>
                  <input type="text"  class="form-control form-control-lg" name="username" id="username" placeholder="Username">
                </div>
                <div class="form-group"><small><?php echo form_error('password');?></small>
                  <input type="password" class="form-control form-control-lg" id="password" name="password" placeholder="Password">
                </div>
                <div class="mt-3">
                <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Masuk</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input name="remember" id="remember" type="checkbox" value="yes" class="form-check-input">
                      Tetap Masuk
                    </label>
                  </div>
                  
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=get_template_directory(dirname(__FILE__),'')?>vendors/js/vendor.bundle.base.js"></script>
  <script src="<?=get_template_directory(dirname(__FILE__),'')?>vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?=get_template_directory(dirname(__FILE__),'')?>js/off-canvas.js"></script>
  <script src="<?=get_template_directory(dirname(__FILE__),'')?>js/misc.js"></script>
  <!-- endinject -->
</body>

</html>
