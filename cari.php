<?php
require_once 'core/init.php';
include 'view/header.php';
?>

<div class="row">
  <div class="col-lg-3">
    <?php include 'menu.php'; ?>
  </div>

  <div class="col-lg-9">
    <?php
    if (isset($_GET['merk'])):
      $merk   = $_GET['merk'];
      $model  = $_GET['model'];
      $result = filter_data_join($merk, $model);

      if (cek_isi($result) == true) { ?>
        <div class="row">
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-100">
                <a href="#"><img class="card-img-top" src="upload/<?=$row['gambar']?>" alt="upload/<?=$row['gambar']?>"></a>
                <div class="card-body">
                  <h4 class="card-title">
                  <a href="mobil-detail.php?id=<?=$row['id_mobil']?>">
                    <?=  $row['merk_mbl'].' '. $row['model'] . ' ' . $row['tahun']?>
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
                      <a class="btn btn-info btn-sm" href="mobil-tambah.php">Add</a>
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
    <?php } else { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Maaf, Mobil dengan kata kunci <strong><?=$cari?></strong> Tidak ditemukan
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php } ?>
  <?php else: ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      Silahkan Ketikkan di kolom pencarian
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  </div>
</div>

<?php require_once 'view/footer.php'; ?>
