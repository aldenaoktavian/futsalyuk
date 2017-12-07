<?php 
  $id_lapangan = $data_lapangan['id'];
  $nama_lapangan = $data_lapangan['nama'];
  $deskripsi = $data_lapangan['deskripsi'];
  $daerah = $data_lapangan['daerah'];
  $kota = $data_lapangan['kota'];
  $lat = $data_lapangan['lat'];
  $long = $data_lapangan['long'];
  $id = md5($data_lapangan['id']);
  $picture = $data_lapangan['picture'];

  if($lat == 0 || $lat == ''){
    $lat = -6.2087634;
  }

  if($long == 0 || $long == ''){
    $long = 106.84559899999999;
  }
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmp5jSQ-LYSC07qKVF_2Cj2yVzfaoZukQ&v=3.exp&libraries=places"></script>
<script type="text/javascript"> 
  var placeSearch, autocomplete;
  var componentForm = {
    street_number: 'short_name',
    route: 'long_name',
    locality: 'long_name',
    administrative_area_level_1: 'short_name',
    country: 'long_name',
    postal_code: 'short_name'
  };

  var map;
  var marker;
  var myLatlng = new google.maps.LatLng(<?php echo $lat ?>, <?php echo $long ?>);
  var geocoder = new google.maps.Geocoder();
  var infowindow = new google.maps.InfoWindow();

  function initialize(){
    var mapOptions = {
      zoom: 18,
      center: myLatlng,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

    marker = new google.maps.Marker({
    map: map,
    position: myLatlng,
    draggable: true 
    }); 

    drag_location(marker, myLatlng);

    autocomplete = new google.maps.places.Autocomplete(
          /** @type {HTMLInputElement} */(document.getElementById('daerah')),
          { types: ['geocode'] });
     
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress();
    });
}
google.maps.event.addDomListener(window, 'load', initialize);

function fillInAddress() {
         
  var place = autocomplete.getPlace();

  // Clear out the old markers.
  marker.setMap(null);

  // For each place, get the icon, name and location.
  var bounds = new google.maps.LatLngBounds();
  if (!place.geometry) {
    console.log("Returned place contains no geometry");
    return;
  }

  // Create a marker for each place.
  var mapOptions = {
    zoom: 18,
    center: place.geometry.location,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  map = new google.maps.Map(document.getElementById("myMap"), mapOptions);

  marker =   new google.maps.Marker({
        map: map,
        position: place.geometry.location,
        draggable: true 
    }); 

  drag_location(marker, place.geometry.location);

  if (place.geometry.viewport) {
    // Only geocodes have viewport.
    bounds.union(place.geometry.viewport);
  } else {
    bounds.extend(place.geometry.location);
  }
  map.fitBounds(bounds);
}

function drag_location(marker, myLatlng){
  geocoder.geocode({'latLng': myLatlng }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      if (results[0]) {
        $('#latitude,#longitude').show();
        $('#daerah').val(results[0].formatted_address);
        $('#latitude').val(marker.getPosition().lat());
        $('#longitude').val(marker.getPosition().lng());
        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);
      }
    }
  });

  google.maps.event.addListener(marker, 'dragend', function() {

    geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
        if (results[0]) {
          $('#daerah').val(results[0].formatted_address);
          $('#latitude').val(marker.getPosition().lat());
          $('#longitude').val(marker.getPosition().lng());
          infowindow.setContent(results[0].formatted_address);
          infowindow.open(map, marker);
        }
      }
    });
  });
}
 
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = new google.maps.LatLng(
          position.coords.latitude, position.coords.longitude);
      var circle = new google.maps.Circle({
        center: geolocation,
        radius: position.coords.accuracy
      });
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>

<html>
    <div class="x_content">

        <div class="col-sm-4 col-md-3 col-lg-3 col-xs-4">
          <!-- required for floating -->
          <!-- Nav tabs -->
          <ul class="nav nav-tabs tabs-left">
            <li class="active"><a href="#informasi" data-toggle="tab">Informasi</a>
            </li>
            <li><a href="#foto" data-toggle="tab">Foto</a>
            <li><a href="#tipe_lapangan" data-toggle="tab">Tipe Lapangan</a>
            </li>
          </ul>
        </div>

        <div class="col-sm-8 col-md-9 col-lg-9 col-xs-8">
          <!-- Tab panes -->
          <div class="tab-content">
            <!-- Informasi -->
            <div class="tab-pane active" id="informasi">
              <p class="lead">Informasi Umum Lapangan</p>
              <?php if(isset($_SESSION['message'])){ ?>
              <span style="color:<?php echo $_SESSION['message']['color']; ?>"><?php echo $_SESSION['message']['text']; ?><br/><br/></span>
              <?php } ?>
              <div>
              	<form action="<?php echo base_url().'mitra_lapangan/informasi_lapangan'; ?>" method="POST">
              		<label for="fullname">Nama Lapangan :</label>
                  <input type="text" id="nama_lapangan" class="form-control" name="nama_lapangan" required 
                  	value="<?php echo $nama_lapangan; ?>" />
					        <br>

                  <label for="message">Deskripsi Lapangan :</label>
                  <textarea id="deskripsi" rows="15" required="required" class="form-control" name="deskripsi" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."><?php echo $deskripsi; ?></textarea>
                  <br>

                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" style="padding-left: 0px;">
                    <label for="fullname">Daerah :</label>
                    <input type="text" id="daerah" class="form-control" name="daerah" required 
                      value="<?php echo $daerah; ?>" onFocus="geolocate()" />
                  </div>

                  <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" style="padding-right: 0px;">
                    <label for="fullname">Kota :</label>
                    <input type="text" id="kota" class="form-control" name="kota" required 
                      value="<?php echo $kota; ?>" />
                  </div>

                  <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12" style="padding-left: 0px;padding-top: 20px;">
                    <div id="myMap"></div>
                  </div>

                  <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" style="padding-left: 0px;padding-top: 20px;">
                    <label for="fullname">Lat :</label>
                    <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" readonly />
                    <br/>
                    <label for="fullname">Long :</label>
                    <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" readonly />
                  </div>

                  <input type="hidden" name="lapid" value="<?php echo $id ?>" />

                  <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding-left: 0px;padding-top: 20px;">
                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                  </div>
              	</form>
              </div>
            </div>
            <!-- Informasi -->

            <!-- Foto -->
            <div class="tab-pane" id="foto">
              <p class="lead">Informasi Umum Lapangan</p>
              <?php if(isset($_SESSION['message'])){ ?>
              <span style="color:<?php echo $_SESSION['message']['color']; ?>"><?php echo $_SESSION['message']['text']; ?><br/><br/></span>
              <?php } ?>
              <div class="profile_box">
                <p class="lead">Upload Foto Profile Lapangan</p>
                <div class="box_image" style="width: 50%;min-height: 220px;">
                    <div id="loader_profile_image" class="loader hidden">Loading...</div>
                    <?php if($picture != "" || $picture != NULL){ ?>
                    <img src="<?php echo base_url()."uploadfiles/mitra-images/".$picture; ?>" id="img_profile_image" width="100%" />
                    <?php } else{ ?>
                    <img src="" id="img_profile_image" class="hidden" width="100%" />
                    <?php } ?>
                </div>
                <form name="form_profile_image" style="width: 50%" method="POST" enctype="multipart/form-data">
                  <div class="btn_upload" id="btn_profile_image">Upload</div>
                  <input type="file" class="hidden" name="profile_image" id="profile_image" style="width: 50%">
                  <input type="hidden" name="lapid" value="<?php echo $id ?>" />
                  <input type="submit" class="hidden" name="submit_profile_image" id="submit_profile_image">
                </form>
              </div>
            </div>
            <!-- Foto -->

            <!-- Tipe Lapangan -->
            <div class="tab-pane" id="tipe_lapangan">
              <p class="lead">Informasi Umum Lapangan</p>
              <?php if(isset($_SESSION['message'])){ ?>
              <span style="color:<?php echo $_SESSION['message']['color']; ?>"><?php echo $_SESSION['message']['text']; ?><br/><br/></span>
              <?php } ?>

              <form action="<?php echo base_url().'mitra_lapangan/tipe_lapangan'; ?>" method="POST" enctype="multipart/form-data">
                <div id="all_type">
                <?php 
                  $i = 0;
                  foreach($tipe_lapangan as $value){ 
                ?>
                <div class="profile_box">
                  <p class="lead">Tipe Lapangan</p>
                  <div  style="width: 60%;float: left;padding-right: 25px;">
                    <label for="fullname_<?php echo $i; ?>">Nama Tipe Lapangan :</label>
                    <input type="text" id="nama_tipe_<?php echo $i; ?>" class="form-control" name="nama_tipe_<?php echo $i; ?>" required 
                      value="<?php echo $value['nama_tipe']; ?>" />
                    <br>
                    <label for="tarif_<?php echo $i; ?>">Harga :</label>
                    <input type="text" id="tarif_<?php echo $i; ?>" class="form-control" name="tarif_<?php echo $i; ?>" required 
                      value="<?php echo $value['tarif']; ?>" />
                    <br>
                    <label for="deskripsi_<?php echo $i; ?>">Deskripsi :</label>
                    <textarea id="deskripsi_<?php echo $i; ?>" rows="8" required="required" class="form-control" name="deskripsi_<?php echo $i; ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."><?php echo $value['deskripsi']; ?></textarea>
                    <br>
                    <input type="hidden" name="lapid" value="<?php echo $id ?>" />
                  </div>
                  <div style="width: 40%;float: left;">
                    <div class="box_image" style="min-height: 220px;">
                      <div id="loader_profile_image_<?php echo $i; ?>" class="loader hidden">Loading...</div>
                      <?php if($value['picture'] != "" || $value['picture'] != NULL){ ?>
                      <img src="<?php echo base_url()."uploadfiles/mitra-images/".$value['picture']; ?>" id="img_profile_image_<?php echo $i; ?>" width="100%" />
                      <?php } else{ ?>
                      <img src="" id="img_profile_image_<?php echo $i; ?>" class="hidden" width="100%" />
                      <?php } ?>
                    </div>
                    <div style="width: 100%">
                      <div class="btn_upload" onclick="change_img('profile_image_<?php echo $i; ?>')">Upload</div>
                      <input type="file" class="hidden" name="profile_image_<?php echo $i; ?>" id="profile_image_<?php echo $i; ?>" style="width: 50%" onchange="previewImg(this, 'img_profile_image_<?php echo $i; ?>')">
                    </div>
                  </div>
 
                  <div class="clearfix"></div>

                  <div class="profile_box">
                    <p class="lead">Upload Foto Galeri Lapangan</p>
                    <div id="gallery_<?php echo $i; ?>"></div>
                    <div class="clearfix"></div>
                    <div class="btn_upload" onclick="change_img('gallery_img_<?php echo $i; ?>')">Upload</div>
                    <input type="file" class="hidden" name="gallery_img_<?php echo $i; ?>[]" id="gallery_img_<?php echo $i; ?>" multiple onchange="previewMultipleImg(this, 'gallery_<?php echo $i; ?>')" style="width: 50%">
                    <div class="clearfix"></div>
                  </div>

                  <input type="hidden" name="tipe_item_<?php echo $i; ?>" value="<?php echo md5($value['id_tipe']); ?>">

                  <div class="clearfix"></div>
                </div>
                <?php $i++; } ?>
                </div>

              <button type="submit" class="btn btn-primary">Simpan Semua Perubahan</button>

              <input type="hidden" name="next_id" id="next_id" value="<?php echo $i; ?>">
              <div class="btn_upload" onclick="add_new_item()" style="width: 200px !important;">Tambah Tipe Lapangan</div>

              </form>

            </div>
            <!-- Tipe Lapangan -->
          </div>
        </div>

        <input type="hidden" id="is_updated">

        <div class="clearfix"></div>

  	</div>
</html>
<?php unset($_SESSION['message']); ?>