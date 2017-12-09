<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Futsalyuk</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/basscss.min.css">
    <link href="<?php echo base_url(); ?>assets/assets/css/superlist.css" rel="stylesheet" type="text/css" >
    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/halaman_utama/halaman_utama.css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="http://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/owl.carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo base_url(); ?>assets/assets/libraries/colorbox/example1/colorbox.css" rel="stylesheet" type="text/css" >
    <link href="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.css" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">

    <link href="http://futsalyuk.com/assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="http://futsalyuk.com/assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link  href="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&signed_in=true&libraries=places"></script>
	<style>
		.background-black-div{background-color: #0000002e;border-radius:10px}
		.line-separators{border-right-style:solid;border-right-color:#ffffff5e;border-right-width: 1px;width: 1px;padding-left: 0px;padding-right:10px;margin-right:20px}
		.tab-log{list-style:none;padding-left:0px}
		.tab-log > li{display:inline;color:#fff;cursor:pointer}
		.header-tab-left {
			background-color: #126571;
			padding: 5px 20px 5px 20px;
			border-top-left-radius: 36px;
			border-bottom-left-radius: 36px;
		}
		.header-tab-right {
			background-color: #126571;
			padding: 5px 20px 5px 20px;
			border-top-right-radius: 36px;
			border-bottom-right-radius: 36px;
		}
		.header-tab-active{
			background-color: #000 !important;
		}
		.text-edit{border-radius: 15px !important;background-color: #ffffff59;border: none;}
		.button-send{border-radius: 15px !important;background-color:#08757c;color:#fff}
		.button-send:hover{border-radius: 15px !important;background-color:#08757c;color:#fff}
		.button-send:focus{border-radius: 15px !important;background-color:#08757c;color:#fff}
		.button-send:active{border-radius: 15px !important;background-color:#08757c !important;color:#fff !important}
		.col-centered{
			float: none;
			margin: 0 auto;
		}
		
		input::-webkit-input-placeholder { /* Chrome/Opera/Safari */
		  color: #fff !important;
		}
		input::-moz-placeholder { /* Firefox 19+ */
		  color: #fff !important;
		}
		input:-ms-input-placeholder { /* IE 10+ */
		  color: #fff !important;
		}
		input:-moz-placeholder { /* Firefox 18- */
		  color: #fff !important;
		}
		/* enable absolute positioning */
		.inner-addon { 
			position: relative; 
		}

		/* style icon */
		.inner-addon .glyphicon {
		  position: absolute;
		  padding: 10px;
		  pointer-events: none;
		}

		/* align icon */
		.left-addon .glyphicon  { left:  15px;}
		.right-addon .glyphicon { right: 0px;}

		/* add padding  */
		.left-addon input  { padding-left:  30px; }
		.right-addon input { padding-right: 30px; }
	</style>
</head>
<body onload="initialize()">
    

    <?php include_once("analyticstracking.php") ?>

    <div class="page-wrapper" style="background-color:#126571">
	  <div class="clear hidden-sm hidden-xs" style="height:70px"></div>
		<div class="col-md-12">
			<div class="col-md-6">
				<img class="img-responsive center-block" src="<?php echo base_url()?>assets/img/background-biru.png" width="90px" alt="Logo">
			</div>
		</div>
		<div class="col-md-6 text-center">
			
			<div class="clear visible-md visible-lg" style="height:60px"></div>
			
			<div class="col-md-4">
			  <div class="col-md-12 background-black-div">
				<p>asd</p>
			  </div>
			</div>
			<div class="col-md-4">
				<div class="col-md-12 background-black-div">
					<p>asd</p>
				</div>
			</div>
			<div class="col-md-4">
			  <div class="col-md-12 background-black-div">
				<p>asd</p>
			  </div>
			</div>
			
			<div class="clear visible-md visible-lg" style="height:90px"></div>
		</div>
		<div class="col-md-1 line-separators hidden-xs hidedn-sm">
			<div class="clear visible-md visible-lg" style="height:400px"></div>
		</div>
		<div class="col-md-4 text-center">
		 <div class="clear visible-md visible-lg" style="height:60px"></div>
		 <div class="col-md-12 background-black-div" >
			<ul class="tab-log">
				<li id="login" class="header-tab-left header-tab-active">Login
				<li id="register" class="header-tab-right">Register
			</ul>
			<form id="login-form" class="form-group">
				<div class="clear" style="height:60px"></div>
				<div class="col-md-8 col-centered inner-addon left-addon">
					<i class="glyphicon glyphicon-user"></i>
					<input type="email" class="form-control text-edit" placeholder="Username"/>
					<div class="clear" style="height:10px"></div>
				</div>
				<div class="col-md-8 col-centered inner-addon left-addon">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" class="form-control text-edit" placeholder="Password"/>
					<div class="clear" style="height:10px"></div>
				</div>
				<div class="col-md-8 col-centered">
					<input type="button" class="btn btn-default button-send btn-block" value="Send"/>
				</div>
			</form>
			<form id="regis-form" class="form-group" style="display:none">
				<div class="clear" style="height:60px"></div>
				<div class="col-md-8 col-centered inner-addon left-addon">
					<i class="glyphicon glyphicon-user"></i>
					<input type="email" class="form-control text-edit" placeholder="Username"/>
					<div class="clear" style="height:10px"></div>
				</div>
				<div class="col-md-8 col-centered inner-addon left-addon">
					<i class="glyphicon glyphicon-lock"></i>
					<input type="password" class="form-control text-edit" placeholder="Password"/>
					<div class="clear" style="height:10px"></div>
				</div>
				<div class="col-md-8 col-centered">
					<input type="button" class="btn btn-default button-send btn-block" value="Register"/>
				</div>
			</form>
		 </div>
			
		</div>
    </div>

  <script src="<?php echo base_url(); ?>assets/assets/js/jquery.js" type="text/javascript"></script>
  <script>
		$(document).ready(function(){
			$("#register").click(function(){
				$("#register").addClass("header-tab-active");
				$("#login").removeClass("header-tab-active");
				$("#regis-form").show();
				$("#login-form").hide();
			});
			$("#login").click(function(){
				$("#register").removeClass("header-tab-active");
				$("#login").addClass("header-tab-active");
				$("#regis-form").hide();
				$("#login-form").show();
			});
		});
	</script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/collapse.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/carousel.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/transition.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/dropdown.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/tooltip.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/tab.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-sass/javascripts/bootstrap/alert.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>assets/assets/libraries/colorbox/jquery.colorbox-min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/flot/jquery.flot.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/assets/libraries/flot/jquery.flot.spline.js" type="text/javascript"></script>

  <script src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
  <!-- 
  <script src="http://maps.googleapis.com/maps/api/js?libraries=weather,geometry,visualization,places,drawing" type="text/javascript"></script> -->

  
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/owl.carousel/owl.carousel.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/assets/libraries/bootstrap-fileinput/fileinput.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/assets/datepicker/datepicker.js"></script>

  <script src="http://futsalyuk.com/assets/js/plugins/rangeslider/rangeslider.min.js"></script>
  <script src="http://futsalyuk.com/assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>
  <script src='http://futsalyuk.com/assets/js/wNumb.min.js'></script>

  <script src="<?php echo base_url()?>assets/assets/sweetalert/sweetalert.min.js"></script>
</body>
</html>