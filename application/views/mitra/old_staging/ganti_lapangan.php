<html>
    <div class="x_content x_content_padding">
    	<p class="lead">List Lapangan</p>
    	<table class="table table-striped">
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
</html>