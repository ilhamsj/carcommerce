<?php require_once 'core/init.php'; ?>
<?php require_once 'view/header.php'; ?>
<?php
if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) != 1) {

  $id = $_GET['id'];
  $car = tampil_data_detail($id);
  while ($row = mysqli_fetch_assoc($car)) {
    $merk   = $row['car_merk'];
    $model  = $row['car_model'];
    $warna  = $row['car_color'];
    $harga  = $row['car_price'];
    $tahun  = $row['car_years'];
  }
?>

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Maju Jaya Mobilindo </h1>
    <div class="list-group">

      <?php if ($login == true): ?>
        <a href="#" class="list-group-item"> <?= $_SESSION['user'] ?> </a>
        <a href="#" class="list-group-item"> Transaction </a>
        <a href="logout.php" class="list-group-item"> Logout </a>
      <?php else: ?>
        <a href="login.php" class="list-group-item"> Login </a>
      <?php endif; ?>

    </div>

  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card mt-4">
      <div class="card-body">
        <h3 class="card-title">Halaman Transaksi</h3>
      </div>
    </div>
    <!-- /.card -->

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Detail Transaksi
      </div>
      <div class="card-body">
        <small class="text-muted">Isi data anda dengan benar</small>
        <hr>

        <p>
          <?= $merk .'/'. $model .'/'. $warna .'/'.$tahun .'/'. rupiah($harga);?>
        </p>

        <form method="post">

          <div class="form-group">
            <label for="username">Nama Lengkap</label>
            <input type="text" name="username" class="form-control" placeholder="Ilham Saputrajati">
          </div>

          <small id="response" class="form-text text-muted"><?= $error; ?></small>
          <button type="submit" class="btn btn-primary" name="bayar">Lanjut ke proses pembayaran</button>

        </form>

        <?php
        if (isset($_POST['bayar'])) {
          header('Location: transaction-upload.php');
          // $id_user  = $_POST['username'];
          // $id_car   = $_POST['password'];
          // $transaction_date = ;

        }
        ?>
      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->
<?php
  } else {
    header('Location: admin\index.php');
  }
} else {
  header('Location: login.php');
}
?>

<?php require_once 'view/footer.php'; ?>
