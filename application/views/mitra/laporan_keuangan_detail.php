<?php
  $text_format = '';
  if($table_format == 1){
    $text_format = "Harian";
  } else if($table_format == 2){
    $text_format = "Bulanan";
  } else if($table_format == 3){
    $text_format = "Tahunan";
  }
  $pendapatan = 0;
  $deposit = 0;
  $total = 0;
?>

<h4 style="float: left;font-weight: bold;"><?php echo "Laporan Keuangan ".$text_format." tanggal ".date("d M Y", strtotime($startdate))." sampai ".date("d M Y", strtotime($enddate)); ?></h4>
<br/><br/>

<?php if($table_format == 1){ ?>
<table class="table" style="margin-top: 30px;">
  <thead>
    <tr>
      <th>No.</th>
      <th>Kode Booking</th>
      <th>Tanggal</th>
      <th>Waktu</th>
      <th>Durasi</th>
      <th>Kredit</th>
      <th>Status</th>
      <th>Deposit</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    if($laporan_keuangan == NULL){
  ?>
    <tr>
      <td colspan="6" align="center">Tidak ada data.</td>
    </tr>
  <?php
    } else{
      $pendapatan = 0;
      $deposit = 0;
      $total = 0;
      foreach($laporan_keuangan as $data){
  ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $data['kode_booking']; ?></td>
      <td><?php echo date('Y-m-d', strtotime($data['tanggal'])); ?></td>
      <td><?php echo date('H:i', strtotime($data['start_time'])).' - '.date('H:i', strtotime($data['end_time'])); ?></td>
      <td><?php echo $data['waktu']." Jam"; ?></td>
      <td><?php echo "Rp. ".number_format($data['pendapatan']); ?></td>
      <td><?php echo ($data['transaksi_status'] == 1 ? 'Digunakan' : ($data['transaksi_status'] == 2 ? 'Batal Digunakan' : ($data['transaksi_status'] == 3 ? 'Telah Digunakan' : 'Booking'))); ?></td>
      <td><?php echo "Rp. ".number_format($data['deposit']); ?></td>
    </tr>
  <?php 
        $no++;
        $pendapatan = $pendapatan + $data['pendapatan'];
        $deposit = $deposit + $data['deposit'];
        $total = $pendapatan + $deposit;
      }
    }
  ?>
  </tbody>
</table>
<?php } else if($table_format == 2){ ?>
<table class="table" style="margin-top: 30px;">
  <thead>
    <tr>
      <th>No.</th>
      <th>Bulan</th>
      <th>Waktu</th>
      <th>Pendapatan</th>
      <th>Deposit</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    if($laporan_keuangan == NULL){
  ?>
    <tr>
      <td colspan="6" align="center">Tidak ada data.</td>
    </tr>
  <?php
    } else{
      $pendapatan = 0;
      $deposit = 0;
      $total = 0;
      foreach($laporan_keuangan as $data){
  ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $data['bulan_huruf']." ".$data['tahun']; ?></td>
      <td><?php echo $data['waktu']." Jam"; ?></td>
      <td><?php echo "Rp. ".number_format($data['pendapatan']); ?></td>
      <td><?php echo "Rp. ".number_format($data['deposit']); ?></td>
    </tr>
  <?php 
        $no++;
        $pendapatan = $pendapatan + $data['pendapatan'];
        $deposit = $deposit + $data['deposit'];
        $total = $pendapatan + $deposit;
      }
    }
  ?>
  </tbody>
</table>
<?php } else if($table_format == 3){ ?>
<table class="table" style="margin-top: 30px;">
  <thead>
    <tr>
      <th>No.</th>
      <th>Tahun</th>
      <th>Waktu</th>
      <th>Pendapatan</th>
      <th>Deposit</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    $no=1;
    if($laporan_keuangan == NULL){
  ?>
    <tr>
      <td colspan="6" align="center">Tidak ada data.</td>
    </tr>
  <?php
    } else{
      $pendapatan = 0;
      $deposit = 0;
      $total = 0;
      foreach($laporan_keuangan as $data){
  ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $data['tahun']; ?></td>
      <td><?php echo $data['waktu']." Jam"; ?></td>
      <td><?php echo "Rp. ".number_format($data['pendapatan']); ?></td>
      <td><?php echo "Rp. ".number_format($data['deposit']); ?></td>
    </tr>
  <?php 
        $no++;
        $pendapatan = $pendapatan + $data['pendapatan'];
        $deposit = $deposit + $data['deposit'];
        $total = $pendapatan + $deposit;
      }
    }
  ?>
  </tbody>
</table>
<?php } ?>

<div class="col-md-6 col-sm-12 col-xs-12" style="float: right;">
  <b>Summary</b><br/>
  <table class="table" style="margin-top: 10px;">
    <tr>
      <td>Kredit</td>
      <td>Rp. <?php echo number_format($pendapatan); ?></td>
    </tr>
    <tr>
      <td>Deposit</td>
      <td>Rp. <?php echo number_format($deposit); ?></td>
    </tr>
    <tr>
      <td>Total Pendapatan <?php echo date("d M Y", strtotime($startdate))." - ".date("d M Y", strtotime($enddate)); ?></td>
      <td>Rp. <?php echo number_format($total); ?></td>
    </tr>
  </table>
  <!-- <div class="col-md-7 col-sm-12 col-xs-12">
    Kredit<br/>
    Deposit<br/>
    Total Pendapatan <?php echo date("d M Y", strtotime($startdate))." - ".date("d M Y", strtotime($enddate)); ?>
  </div>
  <div class="col-md-5 col-sm-12 col-xs-12">
    Rp. 100,000<br/>
    Rp. 100,000<br/>
    Rp. 100,000
  </div>  -->
</div>

<div class="clearfix"></div>