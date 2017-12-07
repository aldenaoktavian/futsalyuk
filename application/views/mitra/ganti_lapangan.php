<html>
<style type="text/css">
    .pac-container {
        background-color: #FFF;
        z-index: 20;
        position: fixed;
        display: inline-block;
        float: left;
    }
    .modal{
        z-index: 20;   
    }
    .modal-backdrop{
        z-index: 10;        
    }​
</style>
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
  var myLatlng = new google.maps.LatLng('-6.175369', '106.827139');
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
    <div class="x_content">
        <div class="container_box">
            <h3 style="float: left;">List Lapangan</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addLapangan" style="float: right;">Tambah Lapangan</button>
            <br/><br/>
        	<table class="table table-striped" style="margin-top: 30px;">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Lapangan</td>
                        <td>Daerah</td>
                        <td>Kota</td>
                    </tr>
                </thead>
                <tbody>
                <?php 
                	$i = 1;
                	foreach ($data_lapangan as $value) { 
                ?>
                    <tr class="tr_click" onclick="change_lap('<?php echo md5($value['id']); ?>')">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['nama']; ?></td>
                        <td><?php echo $value['daerah']; ?></td>
                        <td><?php echo $value['kota']; ?></td>
                    </tr>
                <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addLapangan" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Lapangan</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url().'mitra_lapangan/add_lapangan'; ?>" method="POST">
                        <label for="fullname">Nama Lapangan :</label>
                        <input type="text" id="nama_lapangan" class="form-control" name="nama_lapangan" required /><br>

                        <label for="message">Deskripsi Lapangan :</label>
                        <textarea id="deskripsi" rows="15" required="required" class="form-control" name="deskripsi" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." style="resize: none;"></textarea><br>

                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" style="padding-left: 0px;">
                            <label for="fullname">Daerah :</label>
                            <input type="text" id="daerah" class="form-control" name="daerah" required onFocus="geolocate()" />
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-12" style="padding-right: 0px;">
                            <label for="fullname">Kota :</label>
                            <input type="text" id="kota" class="form-control" name="kota" required 
                          />
                        </div>

                        <div class="col-sm-9 col-md-9 col-lg-9 col-xs-12" style="padding-left: 0px;padding-top: 20px;">
                            <div id="myMap"></div>
                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3 col-xs-12" style="padding-left: 0px;padding-top: 20px;">
                            <br/>
                            <label for="fullname">Lat :</label>
                            <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" readonly />
                            <br/>
                            <label for="fullname">Long :</label>
                            <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" readonly />
                        </div>

                        <input type="hidden" name="lapid" />

                        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12" style="padding-left: 0px;padding-top: 20px;">
                            <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</html>