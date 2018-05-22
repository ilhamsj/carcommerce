<?php
require_once 'core/init.php';
include 'view/header.php';

if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) == 1) {

    $key = $_GET['id'];
    $car = tampil_data_detail('cars', 'id_car', $key);
    while ($row = mysqli_fetch_assoc($car)) {
      $merk       = $row['car_merk'];
      $model      = $row['car_model'];
      $warna      = $row['car_color'];
      $harga_jual = $row['car_price'];
      $harga_beli = $row['car_purchase'];
      $tahun      = $row['car_years'];
      $no         = $row['car_nopolice'];
      $tgl_beli   = $row['date_purchase'];
      $tgl_jual   = $row['date_sold'];
      $gambarawal = $row['car_image'];
    }

    if (isset($_POST['tambah'])) {

      $col1  = $_POST['no'];
      $col2  = $_POST['merk'];
      $col3  = $_POST['tipe'];
      $col4  = $_POST['warna'];
      $col5  = $_POST['tahun'];
      $col6  = $_POST['beli'];
      $col7  = $_POST['jual'];
      $col8  = $_POST['tglbeli'];
      $col9  = $_POST['tgljual'];;

      $asal  = $_FILES['gambarbaru']['tmp_name'];

      switch ($asal) {
        case !empty(!is_null($asal)):
          $col10 = $_FILES['gambarbaru']['name'];
          unlink('upload/'.$gambarawal);
          move_uploaded_file($asal, 'upload/'.$col10);
          break;

        default:
          $col10 = $gambarawal;
          break;
      }

      //eksekusi update

      if (update_data('cars', 'id_car', $key, $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10)) {
         //echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';
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
              <?php $result = tampil_pengecualian('merk', 'merk', $merk, 'merk'); ?>

              <select class="form-control" id="merk" name="merk">
                <option value="<?=$merk?>"><?=$merk?></option>
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option value="<?=$row['merk']?>"><?=$row['merk']?></option>
              <?php } ?>
              </select>
            </div>

            <div class="form-group col">
              <label for="tipe">Tipe</label>
              <input type="text" class="form-control" name="tipe" value="<?=$model?>">
            </div>
            <div class="form-group col">
              <label for="warna">Warna</label>
              <input type="text" class="form-control" name="warna" value="<?=$warna?>">
            </div>
            <div class="form-group col">
              <label for="tahun">Tahun</label>
              <input type="number" class="form-control" name="tahun" value="<?= $tahun?>">
            </div>
            <div class="form-group col">
              <label for="no">No. Polisi</label>
              <input type="text" class="form-control" name="no" value="<?= $no ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="beli">Harga Beli</label>
              <input type="number" class="form-control" name="beli" value="<?= $harga_beli ?>">
            </div>

            <div class="form-group col">
              <label for="jual">Harga Jual</label>
              <input type="number" class="form-control" name="jual"  value="<?= $harga_jual ?>">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="tglbeli">Tanggal Beli</label>
              <input type="date" class="form-control" name="tglbeli" value="<?= newDate($tgl_beli)?>">
            </div>

            <div class="form-group col">
              <label for="tgljual">Tanggal Jual</label>
              <?php
              if ($tgl_jual == null) {
                $tgl_jual_baru = null;
              } else {
                $tgl_jual_baru = newDate($tgl_jual);
              }
              ?>
              <input type="date" class="form-control" name="tgljual" value="<?= $tgl_jual_baru ?>" disabled>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="cust  om-file col-md-4">
                <img class="card-img-top" src="upload\<?=$gambarawal?>" alt="<?=$gambarawal ?>">
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
    header('Location: index.php');
  }
} else {
  header('Location: login.php');
}
require_once 'view/footer.php';
?>
