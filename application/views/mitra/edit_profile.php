<html>
    <div class="x_content">
        <div class="container_box">
            <h3>Edit Profile</h3><br/>
            <div class="col-md-6 col-sm-12 col-xs-12">
              <form action="<?php echo base_url().'mitra_lapangan/edit_profile'; ?>" method="POST">
                <label for="nama_lapangan">Nama Lapangan :</label>
                <input type="text" id="nama_lapangan" class="form-control" name="nama_lapangan" value="<?php echo $data_mitra['nama_lapangan']; ?>" required /><br>

                <label for="email">Email :</label>
                <input type="text" id="email" class="form-control" name="email" value="<?php echo $data_mitra['email']; ?>" required /><br>

                <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
              </form>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</html>