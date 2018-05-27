<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {
    if (isset($_POST['tambah'])) {

      $col1   = autonumber(id_akhir('mobil', 'id_mobil'), 3, 4);
      $col2   = $_POST['merk'];
      $col3   = $_POST['no'];
      $col4   = $_POST['model'];
      $col5   = $_POST['warna'];
      $col6   = $_POST['tahun'];
      $col7   = $_POST['beli'];
      $col8   = $_POST['jual'];
      $col9   = $_POST['tglbeli'];
      $col10  = null;
      $col11  = $_FILES['gambar']['name'];
      $col12  = "lorem lorem";

      $asal  = $_FILES['gambar']['tmp_name'];

      if (tambah_data($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12)) {
        move_uploaded_file($asal, "upload/".$col11);
        redirect_url('index.php');
      } else {
        echo "g berhasil";
      }
    }
?>

<div class="row">

  <div class="col-lg-3 ">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card card-outline-secondary">
      <div class="card-header">
        Tambah Data Mobil
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col">
              <label for="no">No. Polisi</label>
              <input type="text" class="form-control" name="no" required >
            </div>

            <div class="form-group col">
              <label for="merk">Merk</label>
              <?php $result = tampil_data('merk', 'id_merk'); ?>

              <select class="form-control" id="merk" name="merk">
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?=$row['id_merk']?>"><?=$row['merk_mbl']?></option>
              <?php } ?>
              </select>
            </div>

            <div class="form-group col">
              <label for="model">model</label>
              <input type="text" class="form-control" name="model" required>
            </div>
            <div class="form-group col">
              <label for="warna">Warna</label>
              <input type="text" class="form-control" name="warna" required>
            </div>
            <div class="form-group col">
              <label for="tahun">Tahun</label>
              <input type="number" class="form-control" name="tahun" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="beli">Harga Beli</label>
              <input type="number" class="form-control" name="beli" placeholder="Rp" required>
            </div>

            <div class="form-group col">
              <label for="jual">Harga Jual</label>
              <input type="number" class="form-control" name="jual" placeholder="Rp" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="tglbeli">Tanggal Beli</label>
              <input type="date" class="form-control" name="tglbeli" required>
            </div>

            <div class="form-group col">
              <label for="tgljual">Tanggal Jual</label>
              <input type="date" class="form-control" name="tgljual" disabled>
            </div>
          </div>

          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="form-control-file" name="gambar" required>
          </div>

          <div class="form-group">
            <span class="badge badge-danger"><?=$error?></span>
          </div>

          <button type="submit" class="btn btn-primary" name="tambah">
            Simpan
          </button>
        </form>

      </div>
      <div class="card-footer">
        Pastikan data Terisi dengan benar
      </div>
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col-lg-9 -->
</div>
<!-- /.row -->


<?php
  } else {
    redirect_url('index.php');
  }
} else {
  redirect_url('login.php');
}
require_once 'view/footer.php';
?>
