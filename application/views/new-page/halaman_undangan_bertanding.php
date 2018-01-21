<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
    <link href="https://unpkg.com/basscss@8.0.2/css/basscss.min.css" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/socialpage/socialpage.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/socialpage/socialpage.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-sanitize.js"></script>

    <script type="text/javascript">
      var base_url = '<?php echo base_url(); ?>';
    </script>
    <style>
    	.img-center {margin:0 auto;}
    	.pilih-team{background-color:#dddddd;}
    	.tgl-lapangan{background-color:#b6b6b6}
    	.back-abu{background-color:#f2f2f2}
    	.back-abu2{background-color:#e6e6e6}
    	.vs{margin-top:50px;margin-bottom:50px;}
    	.back-white{background-color:#fff;}
    	.back-black{background-color:#7d7d7d;text-align:center}
    	.button-pilih{padding-left:0px;color:#fff;position: absolute;height: 100%;right: 0px;padding-top: 10px;padding-right: 0px;}
	</style>
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top header">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="<?php echo base_url(); ?>">
          <img alt="Brand" src="<?php echo base_url(); ?>assets/img/logo_w.png" width="60px">
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
		  <li><a href="#"> <img src="http://placehold.it/18x18" class="profile-image img-circle"> Zorgon <b class="caret"></b></a></a></li>
          <li><a href="#"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end navbar -->
	
  <section class="container-fluid">
  	 <div class="clear" style="height:100px"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<img class="img-responsive img-center" src="<?php echo base_url(); ?>assets/img/socialpage/undangan.png" />
				<div class="col-md-12">
					<h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h5>
				</div>
				
			</div>
		</div>
	</div>
  </section>

   <section class="container-fluid">
	<div class="container">
		<div class="row">
			 <div class="col-md-12">
				<div class="col-md-6 text-center pilih-team">
					<h4>Pilih Team</h4>
				</div>
				<div class="col-md-6 text-center tgl-lapangan">
					<h4>Tanggal & Lapangan</h4>
				</div>

				<div class="col-md-12 back-abu">
					<div class="clear" style="height:10px"></div>
					<div class="col-md-4 text-center">
						<img class="img-responsive img-center img-circle" src="<?php echo base_url(); ?>assets/img/socialpage/rusa.jpg" />
						<h4>RUSA TERBANG</h4>
						<div class="clear" style="height:30px"></div>
					</div>
					<div class="col-md-4 text-center">
						<img class="img-responsive img-center vs" src="<?php echo base_url(); ?>assets/img/socialpage/vsund.png" />
						<div class="clear" style="height:30px"></div>
					</div>
					<div class="col-md-4 text-center">
						<img class="img-responsive img-center img-circle" src="<?php echo base_url(); ?>assets/img/socialpage/rusa.jpg" />
						<h4>Pilih lawan</h4>
						<div class="clear" style="height:30px"></div>
					</div>

				</div>
				<div class="col-md-12 back-abu2">
					<div class="clear" style="height:10px"></div>
					<div class="col-md-6">
						<h5>Pilih team lawan</h5>
						<div class="clear" style="height:10px"></div>
					</div>
					<div class="col-md-6">
						<div class="col-md-5" style="float:right">
							<input type="text" class="form-control" placeholder="search">
						</div>
						<div class="clear" style="height:10px"></div>
					</div>
					

					<div class="col-md-12" style="padding-bottom:10px">
							<div class="col-md-12 back-white">
								<div class="col-md-4" style="padding-left:0px">
									<img src="<?php echo base_url(); ?>assets/img/socialpage/tm1.jpg" style="width: 50px;" />
									<span>WINGS F.C</span>
								</div>
								<div class="col-md-4" style="padding-left:0px;margin-top: 10px;">
									<p>Jakarta Selatan</p>
								</div>
								<div class="col-md-2 back-black button-pilih">
									Pilih
								</div>
							</div>
					</div>

					<div class="col-md-12" style="padding-bottom:10px">
							<div class="col-md-12 back-white">
								<div class="col-md-4" style="padding-left:0px">
									<img src="<?php echo base_url(); ?>assets/img/socialpage/tm1.jpg" style="width: 50px;" />
									<span>WINGS F.C</span>
								</div>
								<div class="col-md-4" style="padding-left:0px;margin-top: 10px;">
									<p>Jakarta Selatan</p>
								</div>
								<div class="col-md-2 back-black button-pilih">
									Pilih
								</div>
							</div>
					</div>

					<div class="col-md-12" style="padding-bottom:10px">
							<div class="col-md-12 back-white">
								<div class="col-md-4" style="padding-left:0px">
									<img src="<?php echo base_url(); ?>assets/img/socialpage/tm1.jpg" style="width: 50px;" />
									<span>WINGS F.C</span>
								</div>
								<div class="col-md-4" style="padding-left:0px;margin-top: 10px;">
									<p>Jakarta Selatan</p>
								</div>
								<div class="col-md-2 back-black button-pilih">
									Pilih
								</div>
							</div>
					</div>
					<div class="col-md-12 text-center">
						<input type="button" class="btn btn-info" value="Lanjut">
						<div class="clear" style="height:10px"></div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	<div class="clear" style="height:100px"></div>
  </section>

  </body>
</html>