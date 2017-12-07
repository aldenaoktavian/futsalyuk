<html>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script src="https://sweetalert.js.org/assets/sweetalert/sweetalert.min.js"></script>
  <style type="text/css">
    .filter label{
      float: left;
      width: 35%;
    }

    .filter .form-control{
      width: 65%;
    }

    .filter .daterangepicker{
      position: unset;
    }
  </style>
  
    <div class="x_content">

      <div class="container_box">
        <h3 style="float: left;">Laporan Keuangan</h3>
        <div class="clearfix"></div>

        <div class="col-md-6 filter">
          <label>Jenis Lapangan</label>
          <select id="tipe_lapangan" class="form-control">
            <?php foreach($tipe_lapangan as $tipe){ ?>
            <option value="<?php  echo $tipe['id_tipe']; ?>"><?php  echo $tipe['nama_tipe']; ?></option>
            <?php } ?>
          </select>
          <br/>
          <label>Table Report Format</label>
          <div id="tab" class="btn-group">
            <a class="btn btn-default table_format" onclick="table_format(1, this)">Harian</a>
            <a class="btn btn-default table_format" onclick="table_format(2, this)">Bulanan</a>
            <a class="btn btn-default table_format" onclick="table_format(3, this)">Tahunan</a>
          </div>
          <input type="hidden" id="table_format">
        </div>
        <div class="col-md-6 filter">
          <label>Date Range</label>
          <input type="text" id="date_range" class="form-control daterangepicker">
          <br/>
          <button type="button" class="btn btn-primary" onclick="show_laporan()">Tampilkan Data</button>
          <button type="button" class="btn btn-success" onclick="laporan_pdf()">Download to PDF</button>
          <button type="button" class="btn btn-success" onclick="laporan_excel()">Download to Excel</button>
        </div>
        <div class="clearfix"></div>
      </div>

      <div id="table_detail" class="container_box"></div>

      <form id="laporan_excel" action="<?php echo base_url().'mitra_lapangan/laporan_keuangan_toexcel/'; ?>" method="POST">
        <input type="hidden" name="excel_tipe_lapangan" />
        <input type="hidden" name="excel_table_format" />
        <input type="hidden" name="excel_date_range" />
      </form>

      <form id="laporan_pdf" action="<?php echo base_url().'mitra_lapangan/laporan_keuangan_topdf/'; ?>" method="POST">
        <input type="hidden" name="pdf_tipe_lapangan" />
        <input type="hidden" name="pdf_table_format" />
        <input type="hidden" name="pdf_date_range" />
      </form>

  	</div>

</html>