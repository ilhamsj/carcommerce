<?php
require_once 'core/init.php';
include 'view/header.php';
if ($login == true):
  $id = $_GET['id'];

  $pembayaran   = tampil_data_detail('pembayaran', 'id_bayar', $id);
  while ($row = mysqli_fetch_assoc($pembayaran)):
    $pms    = $row['id_pemesanan'];
    $total  = $row['total_byr'];
    $tgl    = $row['tgl_byr'];
    $status = $row['status'];
  endwhile;

  $id_mobil = pilih_kolom('id_mobil', 'pemesanan', 'id_pemesanan', $pms);

  if (isset($_POST['submit'])) {

    $status = 1;
    $bukti  = $_FILES['bukti']['name'];
    $asal   = $_FILES['bukti']['tmp_name'];

    if (update($bukti, $status, $id) && update_tgl_jual($id_mobil)) {
      move_uploaded_file($asal, "upload/transaksi/".$bukti);
    } else {
      echo "g berhasil";
    }
  }
?>

<div class="row mt-4">
  <div class="col-lg-3">
      <?php include 'menu.php'; ?>
  </div>
  <div class="col" style="font-family: roboto;">
    <div class="card">

      <?php if ($status == 1): ?>
        <div class="card text-center">
          <div class="card-body">
            <h5 class="card-title">Transaksi Anda Telah Berhasil</h5>
            <p class="card-text">Terimakasih</p>
            <a href="index.php" class="btn btn-primary">Home</a>
          </div>
        </div>
      <?php else: ?>
          <div class="card-header">
            Upload Bukti Bayar
          </div>
          <div class="card-body">
            <p>Selesaikan pembayaran senilai</p>
            <h5><?=rupiah($total)?></h5>
            <p class="card-text">
              Dengan Upload bukti transfer.
            </p>
            <form method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" name="bukti" class="form-control-file" id="exampleFormControlFile1"> <br/>
                <button type="submit" name="submit" class="btn btn-outline-primary">Upload</button>
              </div>
            </form>
          </div>
        <?php endif; ?>
    </div>
  </div>
</div>

<?php

else:
  redirect_url('login.php');
endif;

require_once 'view/footer.php';
?>
