<?php require_once 'core/init.php'; ?>
<?php require_once 'view/header.php'; ?>

<div class="row">

  <div class="col-lg-3 mt-4">
      <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <?php
    $value = $_GET['id'];
    $car = tampil_data_detail('mobil', 'id_mobil', $value);

    while ($row = mysqli_fetch_assoc($car)) {

      $id_mbl     = $row['id_mobil'];
      $merk       = $row['id_merk'];
      $no         = $row['no_polisi'];
      $model      = $row['model'];
      $warna      = $row['warna'];
      $tahun      = $row['tahun'];
      $harga      = $row['hrg_beli'];
      $hrg_jual   = $row['hrg_jual'];
      $tgl_beli   = $row['tgl_beli'];
      $tgl_jual   = $row['tgl_jual'];
      $gambar     = $row['gambar'];
      $deskripsi  = $row['deskripsi'];
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
            <?= pilih_kolom('merk_mbl', 'merk', 'id_merk', $merk) . ' ' . $model . ' ' . $tahun;?>
          </h2>
          <hr>
        </div>
        <div class="">
          <img class="card-img-top img-fluid" src="upload\<?=$gambar?>" alt="">
        </div>
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
  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
