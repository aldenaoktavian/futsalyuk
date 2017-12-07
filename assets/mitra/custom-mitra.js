$(document).ready(function(){
  var url = $(location).attr('href'),
    parts = url.split("/"),
    last_url = parts[parts.length-1];
  
  if(last_url == 'transaksi_booking'){
    lihat_transaksi();
  }
});

$("#btn_profile_image").click(function(){
	$("#profile_image").trigger("click");
});

$("#profile_image").change(function(){
	$("#submit_profile_image").trigger("click");
});

$("form[name='form_profile_image']").submit(function(e) {
    var formData = new FormData($(this)[0]);

    $("#loader_profile_image").removeClass("hidden");
    $.ajax({
        url: base_url + "mitra_lapangan/profile_image",
        type: "POST",
        data: formData,
        async: false,
        success: function (msg) {
        	$("#loader_profile_image").addClass("hidden");
            if(msg != "gagal"){
            	$("#img_profile_image").attr("src", base_url + "uploadfiles/mitra-images/" + msg);
            	$("#img_profile_image").removeClass("hidden");
            } else{
            	console.log(msg);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });

    e.preventDefault();
});

function change_lap(id){
	window.location = base_url + "mitra_lapangan/change_lap/" + id;
}

function change_img(id_html) {
	$("#" + id_html).trigger("click");
}

function add_new_item() {
	var next_id = $("#next_id").val();
	$html = '<div class="profile_box">' + 
                '<p class="lead">Tipe Lapangan</p>' + 
                '<div  style="width: 60%;float: left;padding-right: 25px;">' + 
                  '<label for="fullname_' + next_id + '">Nama Tipe Lapangan :</label>' + 
                  '<input type="text" id="nama_tipe_' + next_id + '" class="form-control" name="nama_tipe_' + next_id + '" required value="" />' + 
                  '<br>' + 
                  '<label for="tarif_<?php echo $i; ?>">Harga :</label>' +
                  '<input type="text" id="tarif_' + next_id + '" class="form-control" name="tarif_' + next_id + '" required value="" />' + 
                  '<br>' + 
                  '<label for="deskripsi_<?php echo $i; ?>">Deskripsi :</label>' + 
                  '<textarea id="deskripsi_' + next_id + '" rows="8" required="required" class="form-control" name="deskripsi_' + next_id + '" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."></textarea>' + 
                  '<br>' + 
                '</div>' + 
                '<div style="width: 40%;float: left;">' + 
                  '<div class="box_image" style="min-height: 220px;">' + 
                    '<div id="loader_profile_image_' + next_id + '" class="loader hidden">Loading...</div>' + 
                    '<img src="" id="img_profile_image_' + next_id + '" class="hidden" width="100%" />' + 
                  '</div>' + 
                  '<div style="width: 100%">' + 
                    '<div class="btn_upload" onclick="change_img(' + "'profile_image_" + next_id + "'" + ')">Upload</div>' + 
                    '<input type="file" class="hidden" name="profile_image_' + next_id + '" id="profile_image_' + next_id + '" style="width: 50%" onchange="previewImg(this, ' + "'img_profile_image_" + next_id + "'" + ')">' + 
                  '</div>' + 
                '</div>' + 
                '<div class="clearfix"></div>' + 
                '<div class="profile_box">' + 
	                '<p class="lead">Upload Foto Profile Lapangan</p>' + 
	                '<div id="gallery_' + next_id + '"></div>' + 
	                '<div class="btn_upload" onclick="change_img(' + "'profile_image_" + next_id + "'" + ')">Upload</div>' + 
	                '<input type="file" class="hidden" name="gallery_img_' + next_id + '" id="gallery_img_' + next_id + '" multiple onchange="previewMultipleImg(this, ' + "'gallery_" + next_id + "'" + ')" style="width: 50%">' + 
	                '<div class="clearfix"></div>' + 
	              '</div>' + 
	              '<input type="hidden" name="tipe_item_' + next_id + '" value="0">' + 
	              '<div class="clearfix"></div>' + 
              '</div>';
    $("#next_id").val(parseInt(next_id) + 1);
    $("#all_type").append($html);
}

function previewImg(input, img_target) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#' + img_target).attr('src', e.target.result);
            $('#' + img_target).removeClass('hidden');
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function previewMultipleImg(input, placeToInsertImagePreview) {

    /*if (input.files) {
        var filesAmount = input.files.length;

        for (i = 0; i < filesAmount; i++) {
            var reader = new FileReader();

            reader.onload = function(event) {
            	$('#' + placeToInsertImagePreview).append($($.parseHTML('<img class="box_image gallery_image">')).attr('src', event.target.result));
            }

            reader.readAsDataURL(input.files[i]);
        }
    }*/

    var files = event.target.files;
    var data = new FormData();
    $.each(files, function(key, value)
    {
        data.append(key, value);
    });

    $.ajax({
        url: base_url + 'mitra_lapangan/upload_galeri_lapangan/' + placeToInsertImagePreview,
        type: 'POST',
        data: data,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                for (i = 0; i < data.length; i++) { 
                  $('#' + placeToInsertImagePreview).append('<div id="' + placeToInsertImagePreview + i + '" class="gallery_image_area"></div>');
                  $('#' + placeToInsertImagePreview + i).append($($.parseHTML('<img class="box_image gallery_image" style="margin-bottom:unset;">')).attr('src', base_url + data[i]));
                  $('#' + placeToInsertImagePreview + i).append($($.parseHTML('<input type="hidden" name="' + placeToInsertImagePreview + '_' + i + '">')).attr('value', base_url + data[i]));
                  $('#' + placeToInsertImagePreview + i).append($($.parseHTML('<input type="hidden" name="' + placeToInsertImagePreview + '_' + i + '_id">')).attr('value', 0));
                  $('#' + placeToInsertImagePreview + i).append('<a onclick="removePreviewImg(' + i + ', ' + "'" + placeToInsertImagePreview + "'" + ')">hapus</a>');
                }
                $('#' + placeToInsertImagePreview).append($($.parseHTML('<input type="hidden" name="' + placeToInsertImagePreview + '_jml">')).attr('value', data.length));
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });

};

function removePreviewImg(key, placeToInsertImagePreview){
    var id = $('#' + placeToInsertImagePreview + '_' + key + '_id').val();
    $.ajax({
        url: base_url + 'mitra_lapangan/remove_galeri_lapangan/' + placeToInsertImagePreview + '/' + key + '/' + id,
        type: 'POST',
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                $('#' + placeToInsertImagePreview).html('');
                for (i = 0; i < data.length; i++) { 
                  $('#' + placeToInsertImagePreview).append('<div id="' + placeToInsertImagePreview + i + '" class="gallery_image_area"></div>');
                  $('#' + placeToInsertImagePreview + i).append($($.parseHTML('<img class="box_image gallery_image" style="margin-bottom:unset;">')).attr('src', base_url + data[i]));
                  $('#' + placeToInsertImagePreview + i).append($($.parseHTML('<input type="hidden" name="' + placeToInsertImagePreview + '_' + i + '">')).attr('value', base_url + data[i]));
                  $('#' + placeToInsertImagePreview + i).append($($.parseHTML('<input type="hidden" name="' + placeToInsertImagePreview + '_' + i + '_id">')).attr('value', 0));
                  $('#' + placeToInsertImagePreview + i).append('<a onclick="removePreviewImg(' + i + ')">hapus</a>');
                }
                $('#' + placeToInsertImagePreview).append($($.parseHTML('<input type="hidden" name="' + placeToInsertImagePreview + '_jml">')).attr('value', data.length));
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}

function lihat_transaksi(){
    var fd = new FormData();
    fd.append('startdate', $('#startdate').val());
    fd.append('tipe_lapangan', $('#tipe_lapangan').val());
    $.ajax({
        url: base_url + 'mitra_lapangan/search_transaksi_booking/',
        type: 'POST',
        data: fd,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                // Success so call function to process the form
                $('#transaksi_booking').html(data);
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
}

function checkin(i, j, tipe){
  $('#tipe').val(tipe);
  $('#start').val(i);
  $('#end').val(j);

  $('#kode_booking').val('');
  $('#form_checkin').removeClass('hidden');
  $('#checkin_result').html('');
  $('#checkin_result').addClass('hidden');
  $('#modalStatus').modal('show'); 
}

function newbooking(item, i, j, tipe){
  if($(item).is(':checked')){
    $('#tipe').val(tipe);
    $('#start').val(i);
    $('#end').val(j);
    $('#form_book').removeClass('hidden');
    $('#sukses_book_kode').html('');
    $('#sukses_book').addClass('hidden');
    $('#modalBooking').modal('show');
    if($('#sukses_book_kode').html() == ''){
      $(item).attr('checked', false);
    }
  }
}

function booklap(){
  var fd = new FormData();
  fd.append('id_tipe', $('#tipe').val());
  fd.append('tanggal', $('#startdate').val());
  fd.append('start_time', $('#start').val() + ':01');
  fd.append('end_time', $('#end').val() + ':00');
  $.ajax({
      url: base_url + 'mitra_lapangan/offline_transaksi_booking/',
      type: 'POST',
      data: fd,
      cache: false,
      dataType: 'json',
      processData: false, // Don't process the files
      contentType: false, // Set content type to false as jQuery will tell the server its a query string request
      success: function(data, textStatus, jqXHR)
      {
          if(typeof data.error === 'undefined')
          {
              // Success so call function to process the form
              if(data.status == 1){
                $('#form_book').addClass('hidden');
                $('#sukses_book_kode').html(data.message);
                $('#sukses_book').removeClass('hidden');
                lihat_transaksi();
              }
          }
          else
          {
              // Handle errors here
              console.log('ERRORS: ' + data.error);
          }
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          // Handle errors here
          console.log('ERRORS: ' + textStatus);
          // STOP LOADING SPINNER
      }
  });
}

function cancelbook(){
  $('#modalBooking').modal('hide');
}

function checkin_tansaksi(){
  var fd = new FormData();
  fd.append('transaksi_status', $('#transaksi_status').val());
  fd.append('kode_booking', $('#kode_booking').val());
  fd.append('id_tipe', $('#tipe').val());
  fd.append('tanggal', $('#startdate').val());
  fd.append('start_time', $('#start').val() + ':01');
  fd.append('end_time', $('#end').val() + ':00');
  $.ajax({
      url: base_url + 'mitra_lapangan/checkin_lap/',
      type: 'POST',
      data: fd,
      cache: false,
      dataType: 'json',
      processData: false, // Don't process the files
      contentType: false, // Set content type to false as jQuery will tell the server its a query string request
      success: function(data, textStatus, jqXHR)
      {
          if(typeof data.error === 'undefined')
          {
              // Success so call function to process the form
              if(data.status == 1){
                $('#form_checkin').addClass('hidden');
                $('#checkin_result').html(data.message);
                $('#checkin_result').removeClass('hidden');
              } else{
                $('#form_checkin').addClass('hidden');
                $('#checkin_result').html(data.message);
                $('#checkin_result').removeClass('hidden');
              }
              lihat_transaksi();
          }
          else
          {
              // Handle errors here
              console.log('ERRORS: ' + data.error);
          }
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          // Handle errors here
          console.log('ERRORS: ' + textStatus);
          // STOP LOADING SPINNER
      }
  });
}

function addTarikDana(is_save=0) {
  if(is_save == 1){
    var fd = new FormData();
    fd.append('nama_bank', $('#nama_bank').val());
    fd.append('no_rekening', $('#no_rekening').val());
    fd.append('nama_pemilik_rekening', $('#nama_pemilik_rekening').val());
    fd.append('jml_tarik_deposit', $('#jml_tarik_deposit').val());
    $.ajax({
        url: base_url + 'mitra_lapangan/add_tarik_deposit/',
        type: 'POST',
        data: fd,
        cache: false,
        dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR)
        {
            if(typeof data.error === 'undefined')
            {
                swal({
                  title: data.title,
                  text: data.text,
                  icon: data.icon,
                }).then(function() {
                  window.location = base_url + 'mitra_lapangan/deposit';
                });
            }
            else
            {
                // Handle errors here
                console.log('ERRORS: ' + data.error);
            }
        },
        error: function(jqXHR, textStatus, errorThrown)
        {
            // Handle errors here
            console.log('ERRORS: ' + textStatus);
            // STOP LOADING SPINNER
        }
    });
  } else {
    $('#addTarikDana').modal('show');
  }
}

function detail_tarik_dana(id) {
  var fd = new FormData();
  fd.append('id', id);
  $.ajax({
      url: base_url + 'mitra_lapangan/detail_tarik_deposit/',
      type: 'POST',
      data: fd,
      cache: false,
      dataType: 'json',
      processData: false, // Don't process the files
      contentType: false, // Set content type to false as jQuery will tell the server its a query string request
      success: function(data, textStatus, jqXHR)
      {
          if(typeof data.error === 'undefined')
          {
            $('#show_tanggal_tarik_deposit').val(data.tanggal_tarik_deposit);
            $('#show_kode_tarik_deposit').val(data.kode_tarik_deposit);
            $('#show_nama_bank').val(data.nama_bank);
            $('#show_no_rekening').val(data.no_rekening);
            $('#show_nama_pemilik_rekening').val(data.nama_pemilik_rekening);
            $('#show_jml_tarik_deposit').val(data.jml_tarik_deposit);
            $('#detailTarikDana').modal('show');
          }
          else
          {
              // Handle errors here
              console.log('ERRORS: ' + data.error);
          }
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          // Handle errors here
          console.log('ERRORS: ' + textStatus);
          // STOP LOADING SPINNER
      }
  });
}

function cancel_tarik_dana(id){
  swal({
    title: "Apakah Anda yakin ingin membatalkan permintaan ini?",
    text: "Permintaan tarik dana deposit yang telah dibatalkan tidak akan diproses oleh admin.",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      var fd = new FormData();
      fd.append('id', id);
      $.ajax({
          url: base_url + 'mitra_lapangan/cancel_tarik_deposit/',
          type: 'POST',
          data: fd,
          cache: false,
          dataType: 'json',
          processData: false, // Don't process the files
          contentType: false, // Set content type to false as jQuery will tell the server its a query string request
          success: function(data, textStatus, jqXHR)
          {
              if(typeof data.error === 'undefined')
              {
                if(data.status == 1){
                  swal("Permintaan tarik dana deposit telah berhasil dibatalkan.", {
                    icon: "success",
                  }).then(function() {
                    window.location = base_url + 'mitra_lapangan/deposit';
                  });
                } else{
                  swal("Permintaan tarik dana deposit gagal dibatalkan. Silahkan coba kembali nanti.", {
                    icon: "error",
                  }).then(function() {
                    window.location = base_url + 'mitra_lapangan/deposit';
                  });
                }
              }
              else
              {
                  // Handle errors here
                  console.log('ERRORS: ' + data.error);
              }
          },
          error: function(jqXHR, textStatus, errorThrown)
          {
              // Handle errors here
              console.log('ERRORS: ' + textStatus);
              // STOP LOADING SPINNER
          }
      });
    }
  });
}

function table_format(id, item){
  $('.table_format').removeClass('active');
  $('#table_format').val(id);
  $(item).addClass('active');
}

function show_laporan(){
  var fd = new FormData();
  fd.append('tipe_lapangan', $('#tipe_lapangan').val());
  fd.append('table_format', $('#table_format').val());
  fd.append('date_range', $('#date_range').val());
  $.ajax({
      url: base_url + 'mitra_lapangan/show_laporan_keuangan/',
      type: 'POST',
      data: fd,
      cache: false,
      processData: false, // Don't process the files
      contentType: false, // Set content type to false as jQuery will tell the server its a query string request
      success: function(data, textStatus, jqXHR)
      {
          if(typeof data.error === 'undefined')
          {
            $('#table_detail').html(data);
          }
          else
          {
              // Handle errors here
              console.log('ERRORS: ' + data.error);
          }
      },
      error: function(jqXHR, textStatus, errorThrown)
      {
          // Handle errors here
          console.log('ERRORS: ' + textStatus);
          // STOP LOADING SPINNER
      }
  });
}

function laporan_pdf(){
  $('input[name="pdf_tipe_lapangan"]').val($('#tipe_lapangan').val());
  $('input[name="pdf_table_format"]').val($('#table_format').val());
  $('input[name="pdf_date_range"]').val($('#date_range').val());

  $('#laporan_pdf').submit();
}

function laporan_excel(){
  $('input[name="excel_tipe_lapangan"]').val($('#tipe_lapangan').val());
  $('input[name="excel_table_format"]').val($('#table_format').val());
  $('input[name="excel_date_range"]').val($('#date_range').val());

  $('#laporan_excel').submit();
}