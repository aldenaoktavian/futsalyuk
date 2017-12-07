<html>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://sweetalert.js.org/assets/sweetalert/sweetalert.min.js"></script>
  
    <div class="x_content">

      <div class="container_box">
        <h3 style="float: left;">List Deposit Pembatalan Transaksi</h3>
        <h3 style="float: right;font-weight: bold;"><?php echo 'RP. '.number_format($total_deposit_transaction); ?></h3>
        <br/><br/>
        <table class="table" style="margin-top: 30px;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Booking</th>
              <th>Tipe Lapangan</th>
              <th>Nama</th>
              <th>Tanggal</th>
              <th>Waktu</th>
              <th>Deposit</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no=1;
            if($all_transaction_canceled == NULL){
          ?>
            <tr>
              <td colspan="7" align="center">Tidak ada data.</td>
            </tr>
          <?php
            } else{
              foreach($all_transaction_canceled as $transaksi){
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $transaksi['kode_booking']; ?></td>
              <td><?php echo $transaksi['nama_tipe']; ?></td>
              <td><?php echo $transaksi['firstname'].' '.$transaksi['lastname']; ?></td>
              <td><?php echo $transaksi['tanggal']; ?></td>
              <td><?php echo $transaksi['start_time'].' '.$transaksi['end_time']; ?></td>
              <td><?php echo 'Rp. '.number_format($transaksi['deposit']); ?></td>
            </tr>
          <?php 
              $no++;
              }
            }
          ?>
          </tbody>
        </table>
        <div class="clearfix"></div>
      </div>

      <div class="container_box">
        <h3 style="float: left;">List Tarik Dana Deposit</h3>
        <button type="button" class="btn btn-primary" onclick="addTarikDana()" style="float: right;">Tarik Dana</button>
        <br/><br/>
        <table class="table" style="margin-top: 30px;">
          <thead>
            <tr>
              <th>No.</th>
              <th>Kode Tarik Deposit</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Status</th>
              <th>Detail</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $no=1;
            if($all_tarik_deposit == NULL){
          ?>
            <tr>
              <td colspan="6" align="center">Tidak ada data.</td>
            </tr>
          <?php
            } else{
              foreach($all_tarik_deposit as $tarik_deposit){
          ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $tarik_deposit['kode_tarik_deposit']; ?></td>
              <td><?php echo date('Y-m-d', strtotime($tarik_deposit['tanggal_tarik_deposit'])); ?></td>
              <td><?php echo "Rp. ".number_format($tarik_deposit['jml_tarik_deposit']); ?></td>
              <td><?php echo ($tarik_deposit['status'] == 1 ? 'Sukses' : ($tarik_deposit['status'] == 2 ? 'Gagal' : ($tarik_deposit['status'] == 3 ? 'Dibatalkan' : 'Sedang Diproses'))); ?></td>
              <td>
                <button type="button" class="btn btn-default" onclick="detail_tarik_dana('<?php echo md5($tarik_deposit['id']); ?>')" title="Lihat Detail"><i class="fa fa-eye"></i></button>
                <?php if($tarik_deposit['status'] == 0){ ?>
                <button type="button" class="btn btn-default" onclick="cancel_tarik_dana('<?php echo md5($tarik_deposit['id']); ?>')" title="Batalkan Permintaan Tarik Dana"><i class="fa fa-close"></i></button>
                <?php } ?>
              </td>
            </tr>
          <?php 
              $no++;
              }
            }
          ?>
          </tbody>
        </table>
        <div class="clearfix"></div>
      </div>

  	</div>

    <!-- Modal -->
    <div class="modal fade" id="addTarikDana" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ajukan Penarikan Dana Deposit</h4>
          </div>
          <div class="modal-body">
            <div id="form_checkin">
              <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" id="nama_bank" class="form-control">
              </div><br/>
              <div class="form-group">
                <label>No. Rekening</label>
                <input type="text" id="no_rekening" class="form-control">
              </div><br/>
              <div class="form-group">
                <label>Nama Pemilik Rekening</label>
                <input type="text" id="nama_pemilik_rekening" class="form-control">
              </div><br/>
              <div class="form-group">
                <label>Jumlah Tarik Dana</label>
                <input type="text" id="jml_tarik_deposit" class="form-control">
              </div><br/>
              <div class="form-group">
                <button type="button" class="btn btn-primary" onclick="addTarikDana(1)">Ajukan Tarik Dana</button>
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

    <div class="modal fade" id="detailTarikDana" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Detail Penarikan Dana Deposit</h4>
          </div>
          <div class="modal-body">
            <div id="form_checkin">
              <div class="form-group">
                <label>Tanggal Penarikan Dana Deposit</label>
                <input type="text" id="show_tanggal_tarik_deposit" class="form-control" disabled>
              </div><br/>
              <div class="form-group">
                <label>Kode Penarikan Dana Deposit</label>
                <input type="text" id="show_kode_tarik_deposit" class="form-control" disabled>
              </div><br/>
              <div class="form-group">
                <label>Nama Bank</label>
                <input type="text" id="show_nama_bank" class="form-control" disabled>
              </div><br/>
              <div class="form-group">
                <label>No. Rekening</label>
                <input type="text" id="show_no_rekening" class="form-control" disabled>
              </div><br/>
              <div class="form-group">
                <label>Nama Pemilik Rekening</label>
                <input type="text" id="show_nama_pemilik_rekening" class="form-control" disabled>
              </div><br/>
              <div class="form-group">
                <label>Jumlah Tarik Dana</label>
                <input type="text" id="show_jml_tarik_deposit" class="form-control" disabled>
              </div><br/>
            </div>
            <h4 id="checkin_result" class="hidden">Transaksi Anda telah diupdate.</h4>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</html>