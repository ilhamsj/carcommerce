<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {
    if (isset($_POST['tambah'])) {

      $id_des   = autonumber(id_akhir('deskripsi', 'id_deskripsi'), 3, 4);
      $id_mbl   = $_GET['id'];

      $val1 = $_POST['transmisi'];
      $val2 = $_POST['bhn_bkr'];
      $val3 = $_POST['cc'];
      $val4 = $_POST['jml_pintu'];
      $val5 = $_POST['ac'];
      $val6 = $_POST['gps'];
      $val7 = $_POST['radio'];
      $val8 = $_POST['usb'];
      $val9 = $_POST['velg'];

      if (tambah_deskripsi($id_des, $id_mbl, $val1, $val2, $val3, $val4, $val5, $val6, $val7, $val8, $val9)) {
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

        <form class="was-validated" method="post">

          <label> Transmisi</label>
          <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="manual" name="transmisi" value="manual" required>
            <label class="custom-control-label" for="manual">Manual</label>
          </div>

          <div class="form-group custom-control custom-radio">
            <input type="radio" class="custom-control-input" id="otomatis" name="transmisi" value="otomatis" required>
            <label class="custom-control-label" for="otomatis">Otomatis</label>
          </div>

          <div class="form-group">
            <label for="bhn_bkr">Bahan Bakar</label>
            <select class="form-control" id="bhn_bkr" name="bhn_bkr">
              <option value="bensin">Bensin</option>
              <option value="solar">Solar</option>
              <option value="gas">Gas</option>
              <option value="elektro">Elektro</option>
              <option value="hybrid">Hybrid</option>
            </select>
          </div>

          <div class="form-group">
            <label for="cc">CC</label>
            <input name="cc" type="number" class="form-control" placeholder="CC" required>
          </div>

          <div class="form-group">
            <label for="jml_pintu">Jumlah Pintu</label>
            <input name="jml_pintu" type="number" class="form-control" placeholder="Jumlah Pintu" required>
          </div>

          <div class="form-group">
            <label for="ac">Air Conditioner</label>
            <select class="form-control" id="ac" name="ac">
              <option value="ada">Ada</option>
              <option value="tidak">Tidak ada</option>
            </select>
          </div>

          <div class="form-group">
            <label for="gps">GPS</label>
            <select class="form-control" id="gps" name="gps">
              <option value="ada">Ada</option>
              <option value="tidak">Tidak ada</option>
            </select>
          </div>

          <div class="form-group">
            <label for="radio">Radio</label>
            <select class="form-control" id="radio" name="radio">
              <option value="ada">Ada</option>
              <option value="tidak">Tidak ada</option>
            </select>
          </div>

          <div class="form-group">
            <label for="usb">USB</label>
            <select class="form-control" id="usb" name="usb">
              <option value="ada">Ada</option>
              <option value="tidak">Tidak ada</option>
            </select>
          </div>

          <div class="form-group">
            <label for="velg">Velg</label>
            <select class="form-control" id="velg" name="velg">
              <option value="racing">Racing</option>
              <option value="jari-jari">Jari - Jari</option>
            </select>
          </div>

          <button type="submit" name="tambah" class="btn btn-outline-primary">Update</button>
          <button type="button" class="btn btn-outline-primary">Batal</button>
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
