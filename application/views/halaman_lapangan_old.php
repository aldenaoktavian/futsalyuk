<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Booking lapangan <?php echo $nama; ?> untuk tanggal <?php echo $tanggal ?> dan jam <?php echo $jam ?> </title>
	<meta name="title" content="Booking lapangan <?php echo $nama; ?> untuk tanggal <?php echo $tanggal ?> dari jam <?php echo $jam ?>">
    <meta name="description" content="Booking lapangan futsal murah, nyaman dan berkualitas di <?php echo $nama; ?>">
    <meta name="keywords" content="lapangan futsal murah di <?php echo $nama; ?>, lapangan futsal online di <?php echo $nama; ?>, booking lapangan futsal online murah di <?php echo $nama; ?>, pertandingan futsal di <?php echo $nama; ?>">
    <meta name="robots" content="index,follow">
    
    <link rel="icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">
	

	<link rel="icon" href="<?php echo base_url()?>assets/img/favicon/favicon.png">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/js/plugins/rangeslider/rangeslider.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/img/icon_pack/font/flaticon.css"> 
	
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9H1cu59k8p6nujTZTl3ZI4fy3No0TSIc&sensor=false" type="text/javascript"></script>

    <style type="text/css">
    	*{
    		padding: 0px;
    		margin: 0px;
    	}
    	
    	.content-poster{
    		width: 100%;
    		height: 200px;
    		background: url("<?php echo base_url()?>assets/img/header2.jpg") center no-repeat;
    		background-size: cover;
    		overflow: hidden;
    	}

    	.content{
    		
    	}
    	.clear{
    		background: none;
    		border-bottom: red;
    		-webkit-transition:0.4s;
    	}

    	.navbar-inverse{
    		-webkit-transition:0.9s !important;
    	}

    	span.stars>*{
		    max-width:80px;
		    background-position: 0 0;
		}

		span.stars, span.stars>* {
		    display: inline-block;
		    background: url(http://i.imgur.com/YsyS5y8.png) 0 -16px repeat-x;
		    width: 80px;
		    height: 16px;
		}
		.content-seo{
			background: #f4f4f4;
			padding-top: 20px;
			padding-bottom: 20px;
			font-size: 8pt;
		}
		.footers{
			background: #333;
			padding-top: 20px;
			padding-bottom: 20px;
			color: #fafafa;
			position: relative;
			bottom: 0px;
			font-size: 12px;
		}

		.menu-footer{
			list-style: none;
			padding-top: 20px;
		}
		.menu-footer a{
			text-decoration: none;
			color: #f4f4f4;
		}
		.menu-footer-social{
			list-style: none;
			padding-top: 20px;
		}
		.menu-footer-social a{
			text-decoration: none;
			color: #f4f4f4;
		}
		.menu-footer-social li{
			float: left;
			margin-left: 20px;
		}
		.slogan{
			position: relative;
			z-index: 190;
			color: #f4f4f4;
			font-weight: bold;
			-webkit-font-smoothing: antialiased;
			text-align: center;
			margin-left: auto;
			margin-right: auto;
			top: 40%;	
		}
		.lapangan-panel{
			border: solid #f1f1f1 1px;
			background: #ffffff;
		}

		.foto-lapangan{
			background: url('<?php echo base_url()?>assets/img/lapangan/raya_futsal.jpg') center no-repeat;
			background-size: cover;
			height: 400px;
		}
		.nama-lapangan{
			width: 100%;
			background: rgba(0,0,0,0.5);
			padding-left: 0px;
			padding-right: 0px;
		}
		.nama-lapangan p {
			color: #ffffff;
			font-weight: bold;
			font-size: 16pt;
		}
    </style>
</head>
<body>
	
	<nav id="headers" class="navbar navbar-inverse navbar-fixed-top clear">
	  <div class="container">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="<?php echo base_url(); ?>">
	      	<img alt="Brand" src="<?php echo base_url()?>assets/img/logo-dark.png" width="210px">
	      </a>
	    </div>
	    
	  </div>
	</nav>

	<div class="content-poster">
		<div class="slogan"><center><h1>Booking Menjadi Cepat dan Gampang!</h1></center></div>
	</div>
	<br>
	<div class="container content" style="width: 65%;">
		
		
		<div class="row">
        
        	<div class="lapangan-panel animated fadeInLeft" style="border-radius: 6px;">
        		<div class="row">
	        		<div class="col-lg-9" style="padding-right: 0px;">
	        			<div class="foto-lapangan">
		        			<div class="nama-lapangan">
		        				<div style="padding:10px 20px;">
		        					<p><?php echo $nama ?> <span class="stars"><?php echo $rating ?></span></p>
		        				</div>
		        			</div>
		        		</div>
	        		</div>
	        		<div class="col-lg-3" style="padding-left: 0px;">
	        			<div class="deskripsi-lapangan" style="padding: 10px 10px;">
	        				<h5><b><span class="glyphicon glyphicon-map-marker"></span><?php echo $alamat.'-'.$kota; ?></b></h5>
	        				<div style="border: 1px solid #f1f1f1;padding: 10px 10px;border-radius: 6px;">
	        					<div class="label" style="color: #333;">Mulai dari :</div>
	        					<div class="product-main-price" style="color: #F56218"><h3>Rp. 150.000</h3></div>
	        				</div>
	        				<div style="border: 1px solid #f1f1f1;padding: 10px 10px;margin-top:10px;margin-bottom:10px;border-radius: 6px;min-height: 180px;">
	        					<h5 style="padding: 0px;"><b>Fasilitas :</b></h5>
	        					<div class="label" style="color: #333;"><span class="flaticon-shower"></span> Tempat Mandi</div>
	        					<div class="label" style="color: #333;"><span class="flaticon-wifi"></span> Wi-fi Gratis</div>
	        					<div class="label" style="color: #333;"><span class="flaticon-restaurant"></span> Kantin</div>
	        				</div>
	        				<div class="btn btn-block btn-danger">Lihat Lapangan</div>
	        			</div>
	        		</div>
        		</div>
        		<div id="map" style="height: 300px;"></div>	
        	</div>        
    		
        </div>
		
		
			
		<br>

		<div class="col-lg-12" id="componen_lapangan" style="min-height: 600px;">

		</div>
	</div>

	<div class="container-fluid content-seo">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Situs Terbaik dan Terpercaya untuk Booking Online Lapangan Futsal</h4>
					<p>FutsalYuk.com merupakan situs pertama yang menyediakan pengalaman terbaik dan terpercaya dalam pencarian informasi lapangan futsal hingga Pemesanan / booking lapangan futsal di berbagai lokasi secara online. Kemudahan dalam mengakses layanan di dalam situs, menjadikan FutsalYuk.com sebagai platform yang paling tepat bagi Anda yang hobi futsal atau pecinta futsal.</p>
					<h4>Situs Booking Online Lapangan Futsal dengan Jaringan yang Luas</h4>
					<p>FutsalYuk.com telah memiliki jaringan lapangan futsal yang luas dan tersebar di berbagai lokasi di Indonesia. Situs ini juga memungkinkan bagi pengusaha atau pemilik lapangan futsal untuk memperomosikan lapangan futsal dan menemukan pelanggan bagi lapangan futsal miliknya.</p>
				</div>
				<div class="col-lg-4">
					<p>Caranya, cukup hanya dengan mendaftarkan lapangan futsal Anda secara gratis di FutsalYuk.com. Hubungi nomor telepon dan email yang telah dicantumkan untuk informasi lebih lanjut.</p>
					<h4>Cari, Pesan / Booking Lapangan Futsal Nggak Pake Ribet</h4>
					<p>FutsalYuk.com memiliki komitmen kuat untuk menjadi situs terbaik dalam pencarian informasi lapangan futsal hingga pemesanan / booking lapangan futsal. Kami menawarkan solusi bagi Anda yang hobi futsal atau pecinta futsal, serta ingin melakukan olahraga futsal, untuk memesan atau booking lapangan futsal secara online tanpa harus repot mendatangi langsung lapangan futsal yang diinginkan.</p>
				</div>
				<div class="co-lg-4">
					<h4>Tempat Berkumpulnya Para Hobi Futsal atau Pecinta Futsal</h4>
					<p>Kami mencintai olahraga futsal dan menyadari bahwa masih ada banyak lagi para pecinta futsal di luar sana. Dengan semangat kebersamaan yang kuat, kami mengajak Anda para sesama hobi futsal atau pecinta futsal untuk bergabung ke dalam komunitas futsal “FY Community” di FutsalYuk.com. Melalui komunitas futsal “FY Community,” Anda bisa berinteraksi dan berbagi informasi langsung dengan sesama pecinta futsal.</p>
				</div>
				
			</div>
		</div>
	</div>
	<div class="container-fluid footers">
		<div class="container">
			<div class="row">
				<div class="col-lg-4" >
					
					<h4>JELAJAHI FUTSALYUK.COM</h4>
					<ul class="menu-footer">
						<a href="#"><li>Tentang FutsalYuk.com</li></a>
						
						<a href="#"><li>Syarat & Ketentuan</li></a>
						
						<a href="#"><li>Kebijakan Privasi</li></a>
						<a href="#"><li>Daftar Lapangan Futsal</li></a>
						<a href="#"><li>Lapangan Populer</li></a>
						<a href="#"><li>Daftar Lapangan Futsal</li></a>
						
					</ul>
				</div>
				<div class="col-lg-4">
					<div class="row">
						<h4 style="margin-bottom: 5px;">LAYANAN PENGGUNA</h4>
						<ul class="menu-footer">
							<a href="#"><li>Hubungi Kami</li></a>
							
							<a href="#"><li>Pembayaran</li></a>
							
							<a href="#"><li>Cara Booking</li></a>
							<a href="#"><li>Proses Refund</li></a>
							<li><hr></li>
						</ul>
					</div>
					<div class="row" style="margin-top: -20px;">
						<div class="f-menu">
							<ul class="menu-footer-social">
								<a href="#">
									<li><span><img src="<?php echo base_url() ?>assets/img/facebook.ico" width="30" alt=""></span></li>
								</a>
								<a href="#">
									<li><span><img src="<?php echo base_url() ?>assets/img/twitter.png" width="30" alt=""></span></li>
								</a>
								<a href="#">
									<li><span><img src="<?php echo base_url() ?>assets/img/youtube.png" width="30" alt=""></span></li>
								</a>
								<a href="#">
									<li><span><img src="<?php echo base_url() ?>assets/img/instagram.png" width="30" alt=""></span></li>
								</a>
							</ul>
						</div>
					</div>
					
					<h4 style="padding-left: 0px;">Copyright Futsalyuk @ 2017 <span><img src="<?php echo base_url() ?>assets/img/flags/32/Indonesia.png" alt=""></span></h4>
						
				</div>
				<div class="col-lg-4">
					<div style="margin-left: auto;margin-right: auto;">
						<center><img src="<?php echo base_url() ?>assets/img/footer-img.png" style="height: 250px;" alt=""></center>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
	<input type="hidden" name="nama" id="nama" value="<?php echo $nama; ?>">
	<input type="hidden" name="tanggal" id="tanggal" value="<?php echo $tanggal; ?>">
	<input type="hidden" name="jam" id="jam" value="<?php echo $jam; ?>">
	<input type="hidden" name="durasi" id="durasi" value="<?php echo $durasi; ?>">


	<input type="hidden" name="txt_lat" id="lat" value="<?php echo $lat; ?>">
	<input type="hidden" name="txt_long" id="long" value="<?php echo $long; ?>">

	<!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>



    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url(); ?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/pace/pace.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Chosen -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/chosen/chosen.jquery.js"></script>

   <!-- JSKnob -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/jsKnob/jquery.knob.js"></script>

   <!-- Input Mask-->
    <script src="<?php echo base_url(); ?>assets/js/plugins/jasny/jasny-bootstrap.min.js"></script>

   <!-- Data picker -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/datapicker/bootstrap-datepicker.js"></script>

   <!-- NouSlider -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/nouslider/jquery.nouislider.min.js"></script>

   <!-- Switchery -->
   <script src="<?php echo base_url(); ?>assets/js/plugins/switchery/switchery.js"></script>

    <!-- IonRangeSlider -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/iCheck/icheck.min.js"></script>

    <!-- MENU -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Color picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

    <!-- Clock picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/clockpicker/clockpicker.js"></script>

    <!-- Image cropper -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/cropper/cropper.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/fullcalendar/moment.min.js"></script>

    <!-- Date range picker -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/daterangepicker/daterangepicker.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/select2/select2.full.min.js"></script>

    <!-- TouchSpin -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/touchspin/jquery.bootstrap-touchspin.min.js"></script>

    <!-- Tags Input -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

    <!-- Dual Listbox -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/dualListbox/jquery.bootstrap-duallistbox.js"></script>

    <!-- range slider -->
    <script src="<?php echo base_url(); ?>assets/js/plugins/rangeslider/rangeslider.min.js"></script>

    <script src='<?php echo base_url(); ?>assets/js/wNumb.min.js'></script>
	
	<script>

		$(window).on('scroll',function() {
		   header_scroll();
		});

		function ganti_pencarian()
		{
			daerah = $('#txt_daerah').val();
			tanggal = $('#txt_tanggal').val();
			jam = $('#txt_jam').val();
			durasi = $('#txt_durasi').val();

			$('#daerah').val(daerah);
			$('#tanggal').val(tanggal);
			$('#jam').val(jam);
			$('#durasi').val(durasi);

			data_lapangan();
		}

		function header_scroll()
		{
			if (window.scrollY > 170) 
			{
				$('#headers').removeClass('clear');
				
			}
			else if (window.scrollY < 170) 
			{
				$('#headers').addClass('clear');
			}
		}
	
    	
        // $('#send_form').submit(function() {
        //     jam = $( "input[name*='txt_jam']" ).val();

        //     return false; 
        // });
       	
        $.fn.stars = function() {
		    return this.each(function(i,e){$(e).html($('<span/>').width($(e).text()*16));});
		};

       	data_lapangan();
       	$('.stars').stars();

       	//map

       	lat = $('#txt_lat').val();
        long = $('#txt_long').val();
        nama = $('#nama').val();

        var myOptions = {
              zoom: 18,
                scaleControl: true,
              center:  new google.maps.LatLng(lat,long),
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };

         
            var map = new google.maps.Map(document.getElementById("map"),
                myOptions);

         var marker1 = new google.maps.Marker({
         position : new google.maps.LatLng(lat,long),
         title : nama,
         map : map,
         draggable : true
         });

       	//map

        function data_lapangan()
        {
        	loading('componen_lapangan');
			daerah = $('#daerah').val();
			tanggal = $('#tanggal').val();
			jam = $('#jam').val();
			durasi = $('#durasi').val();

			// jQuery.ajax({
		 //        url: '<?php echo base_url()?>Cari_lapangan/show_lapangan',
		 //        type: 'POST',
		 //        data: {
		 //            daerah: daerah, tanggal:tanggal, jam:jam, durasi:durasi
		 //        },
		 //        dataType : 'json',
		 //        success: function(data, textStatus, xhr) {
		        	
		 //        },
		 //        complete: function(data)
		 //        {
		 //        	console.log(data.responseJSON.lapangan[7].nama);
		 //        }
		 //    });

		 jQuery.ajax({
	      url: '<?php echo base_url()?>Cari_lapangan/show_lapangan',
	      type: 'POST',
	      data: {
	          daerah: daerah, tanggal:tanggal, jam:jam, durasi:durasi
	      },
	      dataType : 'json',
	      success: function(data, textStatus, xhr) {
	        var str='';
	      	if (Object.keys(data['lapangan']).length > 0) 
	      	{
		        for (var i = 0; i < Object.keys(data['lapangan']).length; i++) {

		          //console.log(data['lapangan'][i]['nama']);
		          str+='<div class="row">'
						str+='<div class="ibox-content" style="background: #f4f4f4;margin-bottom: 20px;">'
							str+='<div class="row">'
								str+='<div class="foto-lapangan col-lg-4" style="height: 150px;background: url('+data['lapangan'][i]['picture']+')center no-repeat;background-size:cover;padding-left: 80px;">'
				            	
				            	str+='</div>'

				            	str+='<div class="desc-lapangan col-lg-8" style="padding: 10px 10px;">'
				            	str+='<div class="row">'
				            		str+='<div class="col-lg-8"><h3>'+data['lapangan'][i]['nama']+'</h3><div><a href="" style="font-size: 8pt;margin-bottom: 20px;"><span class="glyphicon glyphicon-map-marker"></span>'+data['lapangan'][i]['daerah']+'</a></div><div style="margin-top: 9px;"> <span class="stars">'+data['lapangan'][i]['rating']+'</span></div>'
				            		str+='<center style="background:#fafafa;margin-top:10px;text-align:left;">'
				            			str+='<span class="flaticon-shower"></span>'
				            			str+='<span class="flaticon-wifi"></span>'
				            			str+='<span class="flaticon-restaurant"></span>'
				            		str+='</center>'
				            		str+='</div>'
				            		str+='<div class="col-lg-4"><p>Harga mulai: </p><h3>Rp.'+addCommas(data['lapangan'][i]['harga_mulai'])+'</h3>'
				            		str+='<form method="get" action="<?php echo base_url() ?>lapangan">'
				            		str+='<input type="hidden" name="nama" value="'+data['lapangan'][i]['nama']+'"> '
				            		str+='<input type="hidden" name="id" value="'+data['lapangan'][i]['id']+'"> '
				            		str+='<input type="hidden" name="tanggal" value="'+tanggal+'"> '
				            		str+='<input type="hidden" name="jam" value="'+jam+'"> '
				            		str+='<input type="hidden" name="durasi" value="'+durasi+'"> '
				            		str+='<button class="btn btn-danger">Lihat Lapangan</button></div>'
				            		str+='<form>'
				            	str+='</div>'
				            		
				            		
				            	str+='</div>'
							str+='</div>'
				        str+='</div>'
					str+='</div>'
		          $('#componen_lapangan').html(str);
		          $('.stars').stars();
		        }
	        }
	        else
	        {
	        	$('#componen_lapangan').html('<div class="ibox-content" style="background: #f4f4f4;margin-bottom: 20px;"><center><h3>Tidak Ada Data</h3></center></div>');
	        }
	        
	      }
	      });
		}

		function loading(id)
		{
		  var new_id="#"+id;
		  $(new_id).html('');

		  var str='';
		        str+= '<div class="sk-spinner sk-spinner-three-bounce">'
                    str+= '<div class="sk-bounce1"></div>'
                    str+= '<div class="sk-bounce2"></div>'
                    str+= '<div class="sk-bounce3"></div>'
                str+= '</div>'
		  $(new_id).html(str);
		}

		

	    function addCommas(nStr) {
            nStr += '';
            var x = nStr.split('.');
            var x1 = x[0];
            var x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
    </script>

</body>
</html>