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
    <section class="container-fluid profile-cover" style="background-image:url('<?php echo base_url(); ?>assets/img/socialpage/cover.jpg')">
	 <div class="clear" style="height:100px"></div>
	   <div class="row">
		<div class="container">
			<div class="col-md-12 text-center ">
				<div class="clear" style="height:309px"></div>
			</div>
		</div>
	   </div>
      <!-- <div class="clear" style="height: 372px;"></div> -->
    </section>
  <!-- end profile cover -->
    <!-- navigator -->
  <section class="navigator">
    <div class="container py2">
      <div class="mx-auto lg-col-10 md-col-10 overflow-hidden">
        <div class="col col-2">
          <div class="item-navigator center py3 inline-block">
            <img src="<?php echo base_url(); ?>assets/img/socialpage/nav-timeline.png" alt="" height="35px">
            <p class="mt1 mb0">Timeline</p>
          </div>
        </div>
        <div class="col col-2">
          <div class="item-navigator center py3 inline-block">
            <img src="<?php echo base_url(); ?>assets/img/socialpage/nav-friend.png" alt="" height="35px">
            <p class="mt1 mb0">Friends</p>
          </div>
        </div>
        <div class="col col-2">
          <div class="item-navigator center py3 inline-block">
            <img src="<?php echo base_url(); ?>assets/img/socialpage/nav-profile.png" alt="" height="35px">
            <p class="mt1 mb0">My Profile</p>
          </div>
        </div>
        <div class="col col-2">
          <div class="item-navigator center py3 inline-block">
            <img src="<?php echo base_url(); ?>assets/img/socialpage/nav-challenge.png" alt="" height="35px">
            <p class="mt1 mb0">Challenge</p>
          </div>
        </div>
        <div class="col col-2">
          <div class="item-navigator center py3 inline-block">
            <img src="<?php echo base_url(); ?>assets/img/socialpage/nav-booking.png" alt="" height="35px">
            <p class="mt1 mb0">Booking</p>
          </div>
        </div>
        <div class="col col-2">
          <div class="item-navigator center py3 inline-block">
            <img src="<?php echo base_url(); ?>assets/img/socialpage/nav-news.png" alt="" height="35px">
            <p class="mt1 mb0">News</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end navigator -->
  <section class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="col-md-12 text-center color-font-blue" style="background-color:#ccf1f1">
					<div class="clear" style="height:15px"></div>
					 <img src="http://placehold.it/100x100" class="img-responsive center-block img-circle" style="margin-bottom:10px">
					 <h3>Zorgon <br />Fatigon</h3>
					 <h4>Bongkeng F.C</h4>
					<div class="clear" style="height:40px"></div>
				</div>
				<div id="triangle-down" class="col-md-12 visible-lg">
				
				</div>
				
			</div>
			<div class="col-md-6">
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
  </section>
  </body>
</html>