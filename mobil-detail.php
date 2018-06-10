<?php require_once 'core/init.php'; ?>
<?php require_once 'view/header.php'; ?>

<div class="row">
  <div class="col-lg-3">
    <?php include 'menu.php'; ?>
  </div>

  <div class="col-lg-9">
    <?php
      $value = $_GET['id'];
      if (cek_konten('mobil', 'id_mobil', $value) == true):

        $car = tampil_data_detail('mobil', 'id_mobil', $value);
        $des = tampil_deskripsi($value);


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

      while ($des_detail = mysqli_fetch_assoc($des)) {

        $val1 = $des_detail['transmisi'];
        $val2 = $des_detail['bhn_bkr'];
        $val3 = $des_detail['cc'];
        $val4 = $des_detail['pintu'];
        $val5 = $des_detail['ac'];
        $val6 = $des_detail['gps'];
        $val7 = $des_detail['radio'];
        $val8 = $des_detail['usb'];
        $val9 = $des_detail['velg'];
      }
    ?>
      <div class="card card-outline-secondary">
        <img id="preview" class="card-img-top img-fluid" src="upload\<?=$gambar?>" alt="gambar">
        <div class="card-body">
          <div class="card-title">
            <h2>
              <?= pilih_kolom('merk_mbl', 'merk', 'id_merk', $merk) . ' ' . $model . ' ' . $tahun;?>
            </h2>
            <hr>
          </div>
          <div class="row">
            <div class="col-lg-4">
              <div class="col">
                <img onclick="myFunc()" src="upload\<?=$gambar?>" alt="" class="img-fluid">
              </div>
            </div>
            <div class="col border-left">
              <div class="box">
                <dl>
                  <dt>Status</dt>
                  <dd>
                    <?php if (badge($tgl_jual) == true): ?>
                      <span class="badge badge-danger"> Terjual </span>
                    <?php else: ?>
                      <span class="badge badge-success"> Ready </span>
                    <?php endif; ?>
                  </dd>
                </dl>

                <dl>
                  <dt>Harga</dt>
                  <dd> <?= rupiah($hrg_jual) ?> </dd>
                </dl>

                <dl>
                  <dt>Transmisi</dt>
                  <dd> <?=$val1?> </dd>
                </dl>

                <dl>
                  <dt>Bahan Bakar</dt>
                  <dd><?=$val2?></dd>
                </dl>
              </div>
            </div>
            <div class="col">
              <div class="box">
                <dl>
                  <dt>CC</dt>
                  <dd><?= $val3 ?></dd>
                </dl>

                <dl>
                  <dt>Golongan Warna</dt>
                  <dd> <?= $warna ?></dd>
                </dl>

                <dl>
                  <dt>Pintu</dt>
                  <dd> <?= $val4 ?> </dd>
                </dl>
                <dl>
                  <dt>AC</dt>
                  <dd> <?= $val5 ?> </dd>
                </dl>

              </div>
            </div>
            <div class="col">
              <div class="box">
                <dl>
                  <dt>GPS</dt>
                  <dd> <?= $val6 ?> </dd>
                </dl>

                <dl>
                  <dt>Radio</dt>
                  <dd> <?= $val7 ?> </dd>
                </dl>

                <dl>
                  <dt>USB</dt>
                  <dd> <?= $val8 ?> </dd>
                </dl>

                <dl>
                  <dt>Velg</dt>
                  <dd> <?= $val9 ?> </dd>
                </dl>

              </div>
            </div>
          </div>
          <div class="col">
            <b>Deskripsi Lain</b> <br/>
            <?=$deskripsi?>
          </div>
        </div>
        <div class="card-footer">
          <?php if ($login == true): ?>
            <?php if ($super_user == true): ?>
              <a class="btn btn-info btn-sm" href="mobil-tambah.php">Add new</a>
              <a class="btn btn-secondary btn-sm" href="mobil-edit.php?id=<?=$id_mbl?>">Edit </a>
              <a class="btn btn-danger btn-sm" href="mobil-delete.php?id=<?=$id_mbl?>">Del</a>
            <?php else: ?>
              <a class="btn btn-outline-danger btn-sm" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              <a class="btn btn-outline-primary btn-sm" href="tanya-admin.php"><i class="fa fa-comment" aria-hidden="true"></i></a>
            <?php endif; ?>
          <?php endif; ?>
          <a class="btn btn-info btn-sm" href="transaksi-wishlist.php?id=<?=$id_mbl?>">Beli</a>
        </div>
      </div>

      <?php else: ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Barang Tidak ditemukan <a href="index.php">Home</a>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php endif; ?>
  </div>
  <!-- /.col-lg-9 -->
</div>
<!-- /.row -->

<script type="text/javascript">
  function myFunc() {
    document.getElementById("preview").src = "assets/images/walpaper3.png";
  }
</script>

<?php require_once 'view/footer.php'; ?>
