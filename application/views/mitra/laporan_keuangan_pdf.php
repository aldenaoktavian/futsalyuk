<?php
  $text_format = '';
  if($table_format == 1){
    $text_format = "Harian";
  } else if($table_format == 2){
    $text_format = "Bulanan";
  } else if($table_format == 3){
    $text_format = "Tahunan";
  }
?>

<h4 style="text-align:center;font-weight: bold;"><?php echo "Laporan Keuangan ".$text_format." tanggal ".date("d M Y", strtotime($startdate))." sampai ".date("d M Y", strtotime($enddate)); ?></h4>

<?php if($table_format == 1){ ?>
<table class="table" style="margin-top: 30px;width: 100%;margin-bottom: 20px;background-color: transparent;border-spacing: 0;border-collapse: collapse;">
  <thead style="display: table-header-group;vertical-align: middle;border-color: inherit;">
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <th style="width:2%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">No.</th>
      <th style="width:20%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Nama</th>
      <th style="width:13%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Tanggal</th>
      <th style="width:10%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Waktu</th>
      <th style="width:18%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Pendapatan</th>
      <th style="border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Transaksi Status</th>
      <th style="width:18%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Deposit</th>
    </tr>
  </thead>
  <tbody style="display: table-row-group;vertical-align: middle;border-color: inherit;">
  <?php 
    $no=1;
    if($laporan_keuangan == NULL){
  ?>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td colspan="6" align="center">Tidak ada data.</td>
    </tr>
  <?php
    } else{
      foreach($laporan_keuangan as $data){
  ?>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $no; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $data['fullname']; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo date('Y-m-d', strtotime($data['tanggal'])); ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $data['waktu']." Jam"; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo "Rp. ".number_format($data['pendapatan']); ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo ($data['transaksi_status'] == 1 ? 'Digunakan' : ($data['transaksi_status'] == 2 ? 'Batal Digunakan' : ($data['transaksi_status'] == 3 ? 'Telah Digunakan' : 'Dibooking'))); ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo "Rp. ".number_format($data['deposit']); ?></td>
    </tr>
  <?php 
      $no++;
      }
    }
  ?>
  </tbody>
</table>
<?php } else if($table_format == 2){ ?>
<table class="table" width="100%" style="margin-top: 30px;width: 100%;margin-bottom: 20px;background-color: transparent;border-spacing: 0;border-collapse: collapse;">
  <thead style="display: table-header-group;vertical-align: middle;border-color: inherit;">
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <th style="width:2%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">No.</th>
      <th style="width:24%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Bulan</th>
      <th style="width:22%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Waktu</th>
      <th style="width:25%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Pendapatan</th>
      <th style="width:25%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Deposit</th>
    </tr>
  </thead>
  <tbody style="display: table-row-group;vertical-align: middle;border-color: inherit;">
  <?php 
    $no=1;
    if($laporan_keuangan == NULL){
  ?>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td colspan="6" align="center">Tidak ada data.</td>
    </tr>
  <?php
    } else{
      foreach($laporan_keuangan as $data){
  ?>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $no; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $data['bulan_huruf']." ".$data['tahun']; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $data['waktu']." Jam"; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo "Rp. ".number_format($data['pendapatan']); ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo "Rp. ".number_format($data['deposit']); ?></td>
    </tr>
  <?php 
      $no++;
      }
    }
  ?>
  </tbody>
</table>
<?php } else if($table_format == 3){ ?>
<table class="table" width="100%" style="margin-top: 30px;width: 100%;margin-bottom: 20px;background-color: transparent;border-spacing: 0;border-collapse: collapse;">
  <thead style="display: table-header-group;vertical-align: middle;border-color: inherit;">
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <th style="width:2%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">No.</th>
      <th style="width:24%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Tahun</th>
      <th style="width:22%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Waktu</th>
      <th style="width:25%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Pendapatan</th>
      <th style="width:25%;border-top: 0;vertical-align: bottom;border-bottom: 2px solid #ddd;padding: 8px;line-height: 1.42857143;text-align: left;font-weight: bold;display: table-cell;">Deposit</th>
    </tr>
  </thead>
  <tbody style="display: table-row-group;vertical-align: middle;border-color: inherit;">
  <?php 
    $no=1;
    if($laporan_keuangan == NULL){
  ?>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td colspan="6" align="center">Tidak ada data.</td>
    </tr>
  <?php
    } else{
      foreach($laporan_keuangan as $data){
  ?>
    <tr style="display: table-row;vertical-align: inherit;border-color: inherit;">
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $no; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $data['tahun']; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo $data['waktu']." Jam"; ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo "Rp. ".number_format($data['pendapatan']); ?></td>
      <td style="padding: 8px;line-height: 1.42857143;vertical-align: top;border-top: 1px solid #ddd;display: table-cell;"><?php echo "Rp. ".number_format($data['deposit']); ?></td>
    </tr>
  <?php 
      $no++;
      }
    }
  ?>
  </tbody>
</table>
<?php } ?>

<div class="clearfix"></div>