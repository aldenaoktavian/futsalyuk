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

  <style type="text/css">
    #signup, #signin {
      display: none;
    }
    #signup:target {
      display: block;
    }
    #signin:target {
      display: block;
    }
  </style>

  <body class="login">

    <div>


      <div class="login_wrapper">

        <div id="signin" class="animate form login_form">

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

                  <a href="#signup" class="to_register"> Daftar Jadi Mitra </a>

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



        <div id="signup" class="animate form registration_form">

          <section class="login_content">

            <form>

              <h1>Daftar Akun</h1>

              <div>

                <input type="text" class="form-control" placeholder="Nama Lapangan" required="" />

              </div>

              <div>

                <input type="email" class="form-control" placeholder="Email" required="" />

              </div>

              <div>

                <input type="password" class="form-control" placeholder="Password" required="" />

              </div>

              <div>

                <a class="btn btn-success btn-block submit" href="index.html">Daftar</a>

              </div>



              <div class="clearfix"></div>



              <div class="separator">

                <p class="change_link">sudah menjadi mitra ?

                  <a href="#signin" class="to_register"> Log in </a>

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

