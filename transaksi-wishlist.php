  <?php
require_once 'core/init.php';
include 'view/header.php';


if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) != 1) {

  $key = $_GET['id'];
  $car = tampil_data_detail('cars', 'id_car', $key);

  while ($row = mysqli_fetch_assoc($car)) {

    if (newDate($row['date_sold']) > 0) { ?>
      <script>
        alert("Barang Sudah Laku Silahkan pilih yg lain")
        window.location.href = "index.php";
      </script>

    <?php } else {

      $merk   = $row['car_merk'];
      $model  = $row['car_model'];
      $warna  = $row['car_color'];
      $harga  = $row['car_price'];
      $tahun  = $row['car_years'];
      $note   = $row['car_years'];
    }
  }
?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    <!-- /.card -->
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Detail Transaksi
      </div>
      <div class="card-body">
        <small class="text-muted">Isi data anda dengan benar</small>
        <hr>

        <form method="post">
          <div class="row">
            <div class="col form-group">
              <label for="username">Nama Lengkap</label>
              <input type="text" name="username" class="form-control" value="<?=ucfirst($_SESSION['user'])?>" disabled>
            </div>

            <div class="col form-group">
              <label for="username">Merk Mobil</label>
              <input type="text" name="username" class="form-control" value="<?= $merk ?>" disabled>
            </div>
          </div>

          <div class="row">
            <div class="col form-group">
              <label for="username">Model Mobil</label>
              <input type="text" name="username" class="form-control" value="<?= $model ?>" disabled>
            </div>

            <div class="col form-group">
              <label for="username">Warna Mobil</label>
              <input type="text" name="username" class="form-control" value="<?= $warna ?>" disabled>
            </div>
          </div>

          <div class="row">
            <div class="col form-group">
              <label for="username">Tahun Buat</label>
              <input type="text" name="username" class="form-control" value="<?= $tahun ?>" disabled>
            </div>

            <div class="col form-group">
              <label for="username">Total Harga</label>
              <input type="text" name="username" class="form-control" value="<?= rupiah($harga) ?>" disabled>
            </div>
          </div>


          <div class="accordion mt-4 my-4" id="accordionExample">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <img src="assets\images\bca.png" alt="" class="w-50">
                  </button>
                </h5>
              </div>
              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="custom-control custom-radio col">
                    <input type="radio" id="customRadio1" name="bank" class="custom-control-input" value="15111100063">
                    <label class="custom-control-label" for="customRadio1">
                      15111100063
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <img src="assets\images\mandiri.png" alt="" class="w-50">
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <div class="custom-control custom-radio col">
                    <input type="radio" id="customRadio2" name="bank" class="custom-control-input" value="4600001111151">
                    <label class="custom-control-label" for="customRadio2">
                      4600001111151
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <small id="response" class="form-text text-muted" class="mt-4" ><?= $error; ?></small>
          <button type="submit" class="btn btn-primary" name="bayar" class="mt-4">Lanjut ke proses pembayaran</button>
        </form>



        <?php
        if (isset($_POST['bayar'])) {

          $id_car     =  $_GET['id'];
          $id_user   =  id_user($_SESSION['user']);
          $tanggal    =  date('Y-m-d H:i:s');
          $status     =  0;
          $total      =  $harga;
          $bukti      =  null;
          $desc       =  $merk . ' ' . $model . ' ' . $warna . ' ' . $tahun;
          $bank       = $_POST['bank'];

          $id_transaction = autonumber(id_akhir('transactions', 'id_transaction'), 3, 4);

          if (transaksi($id_transaction, $id_car, $id_user, $tanggal, $status, $total, $bukti, $desc, $bank)) { ?>
            <script>
              window.location.href = "profile.php"
            </script>
          <?php } else {
            echo "ada masalah";
          }

        }
        ?>
      </div>
    </div>

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->
<?php
  } else {
    header('Location: admin\index.php');
    exit();
  }
} else {
  header('Location: login.php');
  exit();
}
?>

<?php require_once 'view/footer.php'; ?>
