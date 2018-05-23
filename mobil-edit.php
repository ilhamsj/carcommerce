<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {

    $value = $_GET['id'];
    $car = tampil_data_detail('mobil', 'id_mobil', $value);

    while ($row = mysqli_fetch_assoc($car)) {

      $id_mbl     = $row['id_mobil'];
      $merk       = $row['id_merk'];
      $no         = $row['no_polisi'];
      $model      = $row['model'];
      $warna      = $row['warna'];
      $tahun      = $row['tahun'];
      $hrg_beli   = $row['hrg_beli'];
      $hrg_jual   = $row['hrg_jual'];
      $tgl_beli   = $row['tgl_beli'];
      $tgl_jual   = $row['tgl_jual'];
      $gambar     = $row['gambar'];
      $deskripsi  = $row['deskripsi'];
    }

    if (isset($_POST['tambah'])) {

      $col2   = $_POST['merk'];
      $col3   = $_POST['no'];
      $col4   = $_POST['model'];
      $col5   = $_POST['warna'];
      $col6   = $_POST['tahun'];
      $col7   = $_POST['beli'];
      $col8   = $_POST['jual'];
      $col9   = $_POST['tglbeli'];
      $col10  = $tgl_jual;
      $col11  = $_FILES['gambarbaru']['name'];
      $col12  = "lorem lorem";

      $asal  = $_FILES['gambarbaru']['tmp_name'];

      switch ($asal) {
        case !empty(!is_null($asal)):
          $col11 = $_FILES['gambarbaru']['name'];
          unlink('upload/'.$gambar);
          move_uploaded_file($asal, 'upload/'.$col11);
          break;

        default:
          $col11 = $gambar;
          break;
      }

      if (update_data('mobil', 'id_mobil', $value, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12)) {
         redirect_url('index.php');
      } else {
        $message = "Ada masalah saat update";
      }
    }
?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Tambah Mobil Baru
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-row">

            <div class="form-group col">
              <label for="merk">Merk</label>

              <select class="form-control" id="merk" name="merk">
                <option value="<?=$merk?>"><?=pilih_kolom('merk_mbl', 'merk', 'id_merk', $merk)?></option>
                <?php
                  $result = tampil_data_beda('merk', 'id_merk', $merk);
                  while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <option value="<?=$row['id_merk']?>"><?=$row['merk_mbl']?></option>
                <?php } ?>

              </select>
            </div>
            <div class="form-group col">
              <label for="no">No. Polisi</label>
              <input type="text" class="form-control" name="no" value="<?= $no ?>">
            </div>
            <div class="form-group col">
              <label for="model">model</label>
              <input type="text" class="form-control" name="model" value="<?=$model?>">
            </div>
            <div class="form-group col">
              <label for="warna">Warna</label>
              <input type="text" class="form-control" name="warna" value="<?=$warna?>">
            </div>
            <div class="form-group col">
              <label for="tahun">Tahun</label>
              <input type="number" class="form-control" name="tahun" value="<?= $tahun?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="beli">Harga Beli</label>
              <input type="number" class="form-control" name="beli" value="<?= $hrg_beli ?>">
            </div>
            <div class="form-group col">
              <label for="jual">Harga Jual</label>
              <input type="number" class="form-control" name="jual"  value="<?= $hrg_jual ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="tglbeli">Tanggal Beli</label>
              <input type="date" class="form-control" name="tglbeli" value="<?= newDate($tgl_beli)?>">
            </div>

            <div class="form-group col">
              <label for="tgljual">Tanggal Jual</label>
              <input type="date" class="form-control" name="tgljual" value="<?= newDate($tgl_jual) ?>" disabled>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="cust  om-file col-md-4">
                <img class="card-img-top" src="upload\<?=$gambar?>" alt="<?=$gambar ?>">
            </div>
          </div>

          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Gambar Baru</label>
            <input type="file" class="form-control-file" name="gambarbaru">
          </div>

          <button type="submit" class="btn btn-primary" name="tambah">Update</button>
        </form>
        <?= $message ?>
      </div>
      <div class="card-footer">
        Pastikan data yang anda edit benar
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
