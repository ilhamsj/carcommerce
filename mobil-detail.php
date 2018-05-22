<?php require_once 'core/init.php'; ?>
<?php require_once 'view/header.php'; ?>

<div class="row">

  <div class="col-lg-3 mt-4">
      <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <?php
    $key = $_GET['id'];
    $car = tampil_data_detail('cars', 'id_car', $key);

    while ($row = mysqli_fetch_assoc($car)) {

      if (newDate($row['date_sold']) > 0) {
        $status = "Laku";
      } else {
        $status = "Ready";
      }

      $merk   = $row['car_merk'];
      $model  = $row['car_model'];
      $warna  = $row['car_color'];
      $harga  = $row['car_price'];
      $tahun  = $row['car_years'];
      $gambar = $row['car_image'];
    }

  ?>
  <div class="col-lg-9">
    <div class="card card-outline-secondary my-4">

      <div class="card-header">
        Detail Mobil
      </div>
      <div class="card-body">
        <div class="card-title">
          <h2>
            <?=$merk . ' ' . $model . ' ' . $tahun;?>
          </h2>
        </div>
        <div class="">
          <img class="card-img-top img-fluid" src="upload\<?=$gambar?>" alt="">
        </div>

        <small class="text-muted">Harga</small>
        <hr>
      </div>
      <div class="card-footer">
        <?php if ($login == true): ?>
          <?php if ($super_user == true): ?>
            <a class="btn btn-info" href="mobil-tambah.php">Add</a>
            <a class="btn btn-secondary" href="mobil-edit.php?id=<?=$key?>">Edit </a>
            <a class="btn btn-danger" href="mobil-delete.php?id=<?=$key?>">Del</a>
          <?php else: ?>
            <a class="btn btn-outline-primary" href="transaksi-wishlist.php?id=<?=$key?>">Beli</a>
            <a class="btn btn-outline-danger" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
            <a class="btn btn-outline-primary" href="tanya-admin.php">Chat</a>
          <?php endif; ?>
        <?php endif; ?>
      </div>

    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
