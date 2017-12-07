<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Mitra Lapangan Futsalyuk</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/mitra/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>assets/mitra/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>assets/mitra/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/mitra/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hidden" id="signup"></a>
      <a class="hidden" id="signin"></a>
		


      <div class="login_wrapper">
        <div id="login" class="animate form login_form">
          <section class="login_content">
            <form action="<?php echo base_url() ?>mitra_lapangan/login" method="post">
              <h1>Login Mitra</h1>
              <div>
                <input type="text" class="form-control" name="email"  placeholder="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password"  placeholder="Password" required="" />
              </div>
              <div style="text-align: center;">
                <button class="btn btn-success btn-block submit">Log in</button> <br><br>
              </div>
              <center><a class="reset_pass" href="#">Lupa password?</a></center>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Belum punya Akun?
                  <a href="<?php echo base_url().'mitra_lapangan/register'; ?>" class="to_register"> Daftar Jadi Mitra </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <img src="<?php echo base_url() ?>assets/img/background-putih.png" style="width: 100px;margin-bottom: 10px;" alt="">

                  <p>©2017 All Rights Reserved. Futsalyuk. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/assets/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
  function register_click() {
    alert('aop');
    $('#login').addClass('hidden');
  }
</script>