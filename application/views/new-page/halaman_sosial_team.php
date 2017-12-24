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
		.statistik{
			background-color:#ccf1f1;border-top-left-radius:20px;border-top-right-radius:20px;
		}
		
		.statistik > p{
			margin-bottom : 0px;color:#009595;
		}
		
		.statistik-cont{
			background-color:#33c8c8;border-radius:20px;
		}
		
		.statistik-cont > ul{
			list-style:none;padding-left:20px;
		}
		
		.statistik-cont > ul > li{
			display:inline;color:#fff;
		}
		
		.statistik-cont > ul > li > img{
			width:16px;
			margin-right:5px
		}
				
		.col-centered{
			float: none;
			margin: 0 auto;
		}
		
		.match-item{
			border-right-width: 3px;
			border-right-style: solid;
			border-right-color: #009595;
			padding-right: 5px;
		}
		
		.win-item{
			padding-left: 5px;
			padding-right: 10px;
		}
		
		.lose-item{
			padding-left: 5px;
			padding-right: 10px;
		}
		
		.draw-item{
			border-left-width: 3px;
			border-left-style: solid;
			border-left-color: #009595;
			padding-left: 5px;
		}
		
		.tab-box{
			background-color:#f2f2f2;
		}
		
		.tab-box > ul{
			list-style:none;padding-left:0px;text-align:center
		}
		
		.tab-box > ul > li{
			display:inline-block;margin-right:30px
		}

		.angota-box > ul{
			list-style:none;padding-left:0px;text-align:left
		}
		
		.angota-box > ul > li{
			display:inline-block;margin-right:28px
		}

		.color-font-dark{
			color:#464646;
		}

		.button-tambah-teman{
			margin-top:10px;
			background-color:#464646;
			color:#fff;
			border-radius:10px;
			padding:5px;
			height:10%;
		}

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
	
    <!-- profile cover -->
    <section class="container-fluid profile-cover" style="background-image:url('<?php echo base_url(); ?>assets/img/socialpage/team-profile.jpg')">
	 <div class="clear" style="height:100px"></div>
	   <div class="row">
		<div class="container">
          <div class="clear hidden-xs hidden-sm" style="height:142px"></div>
			<div class="col-md-2 text-center col-centered hidden-xs" style="top:3px">
				<div class="statistik">
					<p>Statistik</p>
				</div>
			</div>
			<div class="col-md-5 text-center col-centered">
				<div class="statistik-cont">
					<ul>
						<li class="match-item"><img src="<?php echo base_url(); ?>assets/img/socialpage/icon-vs.png">38 Match</li>
						<li class="win-item"><img src="<?php echo base_url(); ?>assets/img/socialpage/icon-win.png">20 Win</li>
						<li class="lose-item"><img src="<?php echo base_url(); ?>assets/img/socialpage/icon-lose.png">10 Lose</li>
						<li class="draw-item"><img src="<?php echo base_url(); ?>assets/img/socialpage/icon-draw.png">8 Draw</li>
					</ul>
				</div>
			</div>

		</div>
	   </div>
      <!-- <div class="clear" style="height: 372px;"></div> -->
    </section>
  <!-- end profile cover -->
    <!-- navigator -->
  <section class="container-fluid">
	<div class="container">
		<div class="row">
		 <div class="clear" style="height:20px"></div>
			<div class="col-md-12 tab-box">
				<ul>
					<li>
						<img src="<?php echo base_url(); ?>assets/img/socialpage/timeline-dark.png" style="width:100px" />
					</li>
					<li>
						<img src="<?php echo base_url(); ?>assets/img/socialpage/friend-dark.png" style="width:100px" />
					</li>
					<li>
						<img src="<?php echo base_url(); ?>assets/img/socialpage/profil-dark.png" style="width:100px" />
					</li>
					<li>
						<img src="<?php echo base_url(); ?>assets/img/socialpage/team-dark.png" style="width:100px" />
					</li>
					<li>
						<img src="<?php echo base_url(); ?>assets/img/socialpage/chalange-dark.png" style="width:100px" />
					</li>
					<li>
						<img src="<?php echo base_url(); ?>assets/img/socialpage/booking-dark.png" style="width:100px" />
					</li>
					<li>
						<img src="<?php echo base_url(); ?>assets/img/socialpage/news-dark.png" style="width:100px" />
					</li>
					
				</ul>
			</div>
		
		</div>
	</div>
	 <div class="clear" style="height:50px"></div>
  </section>
  <!-- end navigator -->
  <section class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="col-md-12 text-center color-font-dark" style="background-image: url('<?php echo base_url(); ?>assets/img/socialpage/backteam.png');background-size: cover;height: 700px;">
					<div class="clear" style="height:15px"></div>
					<div class="clear" style="height:15px"></div>
					 <img src="<?php echo base_url(); ?>assets/img/socialpage/teamlogo.png" class="img-responsive center-block img-circle" style="margin-bottom:10px">
					 <h3>Bongkeng F.C</h3>
					 <img src="<?php echo base_url(); ?>assets/img/socialpage/icteman.png"/><span>345 Teman</span>
						 <div class="col-md-8 button-tambah-teman col-centered">
						 	<div class="col-md-5">
							 	<img  src="<?php echo base_url(); ?>assets/img/socialpage/add-f.png" />
							 </div>
							 <div class="col-md-5">
							 	<span>Tambah<br /> Teman</span>
							 </div>
						 </div>
					<div class="clear" style="height:40px"></div>
				</div>
				<div class="col-md-12 text-center">
					<h4>History<br/> Pertandingan</h4>
				</div>
			</div>
			<div class="col-md-9">
				<div class="col-md-12 angota-box" style="background-color: #f2f2f2;color:#1ebab8">
					<h3>Blackband.FC <span>“Come and get it”</span></h3>
					<span>Anggota</span>
					<div class="clear" style="height:5px"></div>
					<ul>
						<li>
							<img class="img-circle" src="http://via.placeholder.com/70x70"/>
						</li>
						<li>
							<img class="img-circle" src="http://via.placeholder.com/70x70"/>
						</li>
						<li>
							<img class="img-circle" src="http://via.placeholder.com/70x70"/>
						</li>
						<li>
							<img class="img-circle" src="http://via.placeholder.com/70x70"/>
						</li>
						<li>
							<img class="img-circle" src="http://via.placeholder.com/70x70"/>
						</li>
						<li>
							<img class="img-circle" src="http://via.placeholder.com/70x70"/>
						</li>
						<li>
							<img class="img-circle" src="http://via.placeholder.com/70x70"/>
						</li>
						<li>
							<img class="img-circle" src="<?php echo base_url(); ?>assets/img/socialpage/addicon.png"/>
						</li>
					</ul>
				</div>
				<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
					 <div class="clear" style="height:10px"></div>
					        <div class="profile-gallery">
					          <div class="gallery-container relative overflow-hidden col-12">
					            <div class="title-gallery">
					              Gallery <small>(20 Photos)</small>
					            </div>
					            <div class="col col-2">
					              <img src="<?php echo base_url(); ?>assets/img/socialpage/gale-1.jpg" class="galery-photo" alt="">
					            </div>
					            <div class="col col-2">
					              <img src="<?php echo base_url(); ?>assets/img/socialpage/gale-2.jpg" class="galery-photo" alt="">
					            </div>
					            <div class="col col-2">
					              <img src="<?php echo base_url(); ?>assets/img/socialpage/gale-3.jpg" class="galery-photo" alt="">
					            </div>
					            <div class="col col-2">
					              <img src="<?php echo base_url(); ?>assets/img/socialpage/gale-4.jpg" class="galery-photo" alt="">
					            </div>
					            <div class="col col-2">
					              <img src="<?php echo base_url(); ?>assets/img/socialpage/gale-5.jpg" class="galery-photo" alt="">
					            </div>
					            <div class="col col-2">
					              <img src="<?php echo base_url(); ?>assets/img/socialpage/gale-3.jpg" class="galery-photo" alt="">
					            </div>
					            <div class="title-more">
					              Lihat Semua
					            </div>
					          </div>
					        </div> 
				</div>

				<div class="col-md-12" style="padding-left: 0px;padding-right: 0px;">
				 <div class="clear" style="height:20px"></div>
					<div class="col-md-9" style="padding-left: 0px;">
						  <div class="timeline-profile u-shadow py2 px2">
							<div class="u-shadow">
							  <div class="col-12 card px2 py2">
								<div class="status_container relative">
								  <div class="profile-photo--status inline-block absolute">
									<img src="img/profile.jpg" alt="">
								  </div>
								  <textarea class="status-text" placeholder="tulis status anda disini..."></textarea>
								</div>
							  </div>
							  <div class="action-status">
								<span class="glyphicon glyphicon-camera"></span>
								<span>Photos/Videos</span>
							  </div>
							</div>

							<div class="u-shadow mt3">
							  <div class="col-12 card px2 py2">
					  
								  <div class='up main-post'>
									<a href='#' class="dots"></a>
									<div class='list'>
										<ul>
											<li><a href='#'>Save Link</a></li>
											<li class='seprator' role="separator"></li>
											<li><a href='#'>Edit Post</a></li>
											<li><a href='#'>Change Date</a></li>
											<li><a href='#'>Embed</a></li>
											<li><a href='#'>Turn off notification for this post</a></li>
											<li><a href='#'>Show in tab</a></li>
											<li class='seprator' role="separator"></li>
											<li><a href='#'>Hide from timeline</a></li>
											<li><a href='#'>Delete</a></li>
											<li><a href='#'>Turn off translation</a></li>
										</ul>
									</div>
									<div class='info'>
										<a href="#" class='avatar'>
											<img src='img/profile.jpg' title='' /></a>

										<a class='user' href='#' target='_blank'>Zorgon Fatigon</a>

										<span class='ca'> 
										  <a class = 'time' href='#' title="21 October at 18:03">21 October at 18:03</a> 
										  <i class="fa fa-globe" title='public' aria-hidden="true"></i>
										  </span>

									</div>
									<p>
									</p>
									<!-- <div class="gardient"></div> -->
									<div class="photo-post">
									  <img src="img/gale-3.jpg" alt="">
									</div>
									<div class='react'>
										<span class="like-main"> 
											<span class='like' >Like</span>
										</span>
										<span href='#' class='comment' title="Leave a comment">Comment</span>
									</div>
									<ul class='emoji'>
										<li class="reaction reaction-like" data-reaction="Like"></li>
										<li class="reaction reaction-love" data-reaction="Love"></li>
										<li class="reaction reaction-haha" data-reaction="HaHa"></li>
										<li class="reaction reaction-wow" data-reaction="Wow"></li>
										<li class="reaction reaction-sad" data-reaction="Sad"></li>
										<li class="reaction reaction-angry" data-reaction="Angry"></li>
									</ul>
								  </div>
							  </div>
							</div>
						  </div>
						</div>
						<div class="col-md-3" style="background-color:#f2f2f2">
							<h4 style="color:#1ebab8">NEWS</h4>
							<div class="col-md-12 news-img">
								<img src="<?php echo base_url(); ?>assets/img/socialpage/gale-5.jpg" class="img-responsive">
								<p class="news-caption color-font-blue">TES</p>
							</div>
							<div class="col-md-12" style="padding-left:0px;margin-bottom:10px">
								<img src="<?php echo base_url(); ?>assets/img/socialpage/gale-3.jpg" class="img-responsive">
								<p class="news-caption color-font-blue">TES</p>
							</div>
							<div class="col-md-12" style="padding-left:0px;margin-bottom:10px">
								<img src="<?php echo base_url(); ?>assets/img/socialpage/gale-3.jpg" class="img-responsive">
								<p class="news-caption color-font-blue">TES</p>
							</div>
							<div class="col-md-12" style="padding-left:0px;margin-bottom:10px">
								<img src="<?php echo base_url(); ?>assets/img/socialpage/gale-3.jpg" class="img-responsive">
								<p class="news-caption color-font-blue">TES</p>
							</div>
							<div class="clear" style="height:100px"></div>
						</div>
				</div>
			</div>
		</div>
	</div>
  </section>
  </body>
</html>