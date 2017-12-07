<html>
    <div class="x_content">
      <div class="col-md-6 col-sm-12 col-xs-12 no-padding">
        <div class="container_box">
          <h3>Transaksi Booking</h3><br/>
          <div class="col-md-12">
            <div class="col-md-5 col-sm-12 col-xs-12 no-padding">
              <label>Tanggal Booking</label>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12 no-padding">
              <input type="text" class="form-control datepicker" id="startdate" placeholder="Tanggal Booking" value="<?php echo date('Y-m-d'); ?>">
            </div>
          </div>
          <br/>
          <div class="col-md-12">
            <br/>
            <div class="col-md-5 col-sm-12 col-xs-12 no-padding">
              <label>Tipe Lapangan</label>
            </div>
            <div class="col-md-7 col-sm-12 col-xs-12 no-padding">
              <select id="tipe_lapangan" class="form-control">
                <?php foreach($tipe_lapangan as $tipe){ ?>
                <option value="<?php  echo $tipe['id_tipe']; ?>"><?php  echo $tipe['nama_tipe']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="col-md-12 hidden">
            <input type="text" class="form-control datepicker" id="enddate" placeholder="Tanggal"><br/>
          </div>
          <div class="col-md-12">
            <br/>
            <button class="btn btn-primary" onclick="lihat_transaksi()">Lihat Transaksi</button>
          </div>
          <br/><br/><br/><br/>
          <div class="clearfix"></div>
        </div>
      </div>
      <div id="transaksi_booking" class="col-md-6 col-sm-12 col-xs-12 no-padding">
      </div>

      <!-- Modal -->
      <div class="modal fade" id="modalStatus" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Ubah Status Booking</h4>
            </div>
            <div class="modal-body">
              <div id="form_checkin">
                <div class="form-group">
                  <label>Status Booking</label>
                  <select id="transaksi_status" class="form-control">
                    <option value="1">Digunakan</option>
                    <option value="2">Batal Digunakan</option>
                  </select>
                </div><br/>
                <div class="form-group">
                  <label>Kode Booking</label>
                  <input type="text" id="kode_booking" class="form-control">
                </div><br/>
                <div class="form-group">
                  <button type="button" class="btn btn-primary" onclick="checkin_tansaksi()">Ubah Status</button>
                </div>
              </div>
              <h4 id="checkin_result" class="hidden">Transaksi Anda telah diupdate.</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="modalBooking" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Booking Lapangan</h4>
            </div>
            <div class="modal-body" id="modalBooking_content">
              <form id="form_book">
                <h2 style="text-align: center;">Apakah Anda yakin ingin booking lapangan ini?</h2>
                <br/>
                <div style="text-align: center;">
                  <button type="button" class="btn btn-primary" onclick="booklap()">YA</button>
                  <button type="button" class="btn btn-default" onclick="cancelbook()">TIDAK</button>
                </div>
              </form>
              <div id="sukses_book" class="hidden" style="text-align: center;">
                <h3>Booking lapangan berhasil!</h3><br/>
                <h4>Berikut adalah Kode Booking transaksi Anda:</h4><br/>
                <h3 id="sukses_book_kode" style="font-weight: bold;">HHH1234</h3>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <input type="hidden" id="tipe" />
      <input type="hidden" id="start" />
      <input type="hidden" id="end" />

  	</div>
</html>