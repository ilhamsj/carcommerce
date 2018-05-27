<?php
require_once 'core\init.php';
include 'view\header.php';

if ($login == true) {
  redirect_url('index.php');
} else {
  if (isset($_POST['daftar'])) {

    $col1 = autonumber(id_akhir('member', 'id_member'), 3, 4);
    $col2 = $_POST['username'];
    $col3 = $_POST['password'];
    $col4 = 0;
    $col5 = $_POST['fullname'];
    $col6 = $_POST['email'];
    $col7 = $_POST['alamat'];

    if (cek_username($col2) == true) {
      if (daftar('member', $col1, $col2, $col3, $col4, $col5, $col6, $col7)) {
        $_SESSION['user'] = $col2;
        redirect_url('index.php');
      } else {
        $error = "Ada masalah saat daftar";
      }
    } else {
      $error = "User sudah ada";
    }
  }
}
?>

<div class="row mt-4" style="min-height: 600px;">

  <div class="col-lg-8">
    <?php include_once 'view/carousel.php'; ?>
  </div>

  <div class="col-lg-4">
    <div class="card rounded-0">
      <div class="card-header">
        Daftarkan dirikamu sekarang
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="username">Username</label>
              <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password" required>
            </div>
          </div>
            <div class="form-group">
              <label for="fullname">Nama Lengkap</label>
              <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group">
              <label for="email">email</label>
              <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

          <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Apartemen, studio, or floor" required>
          </div>

          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Isi data anda dengan benar <?=$error?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
        </form>
      </div>
      <div class="card-footer">
        <span class="text-muted">Sudah punya akun ?</span>
        <a href="login.php" class="btn btn-success btn-sm">Silahkan login</a>
      </div>
    </div>
  </div>

<?php require_once 'view/footer.php'; ?>
