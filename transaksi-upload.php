<?php
require_once 'core/init.php';
include 'view/header.php';
?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Upload Bukti Pembayaran
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">

          <div class="form-group">
            <input type="file" name="bukti_pembayaran" class="form-control-file"/>
          </div>

          <small id="response" class="form-text text-muted"><?= $error; ?></small>
          <button type="submit" class="btn btn-primary" name="upload">Upload</button>

        </form>

        <?php
        if (isset($_POST['upload'])) {
          $id         = $_GET['id'];
          $asal       = $_FILES['bukti_pembayaran']['tmp_name'];
          $gambar     = $_FILES['bukti_pembayaran']['name'];
          $date_sold  = date('Y-m-d H:i:s');

          if (upload_bukti($gambar, $id, $date_sold)) {
            move_uploaded_file($asal, "upload/transaksi/".$gambar);
            header('Location: profile.php');
          } else {
            echo "ada masalah";
          }
        }
        ?>

      </div>
      <div class="card-footer">
          Setelah Upload Admin akan melalukan Verivikasi Tunggu beberapa saat
      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
