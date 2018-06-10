<?php
require_once 'core/init.php';
include 'view/header.php';
$result = tampil_data('mobil', 'id_mobil');
?>

<div class="row">
  <div class="col-lg-3">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    <?php include 'view/carousel.php'; ?>
    <div class="row">
      <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="upload/<?=$row['gambar']?>" alt="upload/<?=$row['gambar']?>"></a>
            <div class="card-body">
              <h4 class="card-title">
              <a href="mobil-detail.php?id=<?=$row['id_mobil']?>">
                <?= pilih_kolom('merk_mbl', 'merk', 'id_merk', $row['id_merk']) .' '. $row['model'] . ' ' . $row['tahun']?>
              </a>
              </h4>

              <p class="card-text">
                <?php if (badge($row['tgl_jual']) == true): ?>
                  <span class="badge badge-danger"> Laku </span>
                <?php else: ?>
                  <span class="badge badge-success"> Ready </span>
                <?php endif; ?>
              </p>

              <h5> <?= rupiah($row['hrg_jual']) ?></h5>
            </div>
            <div class="card-footer">
              <?php if ($login == true): ?>
                <?php if ($super_user == true): ?>
                  <a class="btn btn-info btn-sm" href="mobil-tambah.php">Add new</a>
                  <a class="btn btn-secondary btn-sm" href="mobil-edit.php?id=<?=$row['id_mobil']?>">Edit </a>
                  <a class="btn btn-danger btn-sm" href="mobil-delete.php?id=<?=$row['id_mobil']?>">Del</a>
                <?php else: ?>
                  <a class="btn btn-outline-danger btn-sm" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
                  <a class="btn btn-outline-primary btn-sm" href="tanya-admin.php"><i class="fa fa-comment" aria-hidden="true"></i></a>
                <?php endif; ?>
              <?php endif; ?>
              <a class="btn btn-info btn-sm" href="transaksi-wishlist.php?id=<?=$row['id_mobil']?>">Beli</a>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
