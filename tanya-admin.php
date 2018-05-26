<?php
require_once 'core/init.php';
include 'view/header.php';

if (isset($_SESSION['user'])) {
  // if (cek_status($_SESSION['user']) != 1) {

    if (isset($_POST['kirim'])) {

      $col1 = id_user($_SESSION['user']);
      $col2 = 2;
      $col3 = $_SESSION['user'];
      $col4 = $_POST['konfirmasi'];
      $col5 = "oke";

      if (chatting($col1, $col2, $col3, $col4, $col5))  {
         redirect_url('tanya-admin.php');
      } else {
        $error = "ga berhasil";
      }
    }
?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card card-outline-secondary my-4">

      <div class="card-header">
        Butuh bantuan? silahkan tanya admin
      </div>

      <div class="card-body">
        <?php
        $result = tampil_chatting('konfirmasi'); ?> <p>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <b><?= ucfirst($row['username']); ?> </b> :
          <?= $row['text']; ?> <p/>
        <?php } ?>
      </div>

      <div class="card-footer">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="textarea">Kirim pesan</label>
            <textarea id="textarea" name="konfirmasi" class="form-control" rows="3"></textarea>
          </div>

          <div class="form-group">
            <span class="badge badge-danger"><?=$error?></span>
          </div>

          <button type="submit" class="btn btn-primary" name="kirim"> Kirim </button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
} else {
  header('Location: login.php');
}
require_once 'view/footer.php';
?>
