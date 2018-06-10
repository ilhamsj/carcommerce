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
    $bank   = $row['mtd_byr'];
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

<div class="row">
  <div class="col-lg-3">
      <?php include 'menu.php'; ?>
  </div>
  <div class="col">


      <?php if ($status == 1): ?>
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Well done!</h4>
          <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
          <hr>
          <p class="mb-0">Back to Home <a href="index.php">Home</a> </p>
        </div>
      <?php else: ?>
        <div class="card">
          <div class="card-header">
            Upload Bukti Bayar
          </div>
          <div class="card-body">
            <p>Selesaikan pembayaran</p>
            Transfer ke Rekening
            <?=$bank?>
            <b>
            <?php if ($bank=='bca'): ?>
              12345
            <?php else: ?>
              2834388
            <?php endif; ?>
            </b>
            atas nama Arti Khansa, senilai
            <h5><?=rupiah($total)?></h5>
            <p class="card-text">
              Silahkan Upload bukti transfer !
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
