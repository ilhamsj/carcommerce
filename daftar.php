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
      // if (daftar('member', $col1, $col2, $col3, $col4, $col5, $col6, $col7)) {
      //   $_SESSION['user'] = $col2;
      //   redirect_url('index.php');
      // } else {
      //   $error = "Ada masalah saat daftar";
      // }
    } else {
      $error = "User sudah ada";
    }
  }
}
?>

<div class="row single">
  <div class="col-lg-6">
    <form method="post">
      <h1>Silahkan Daftar</h1>
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

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="fullname">Nama Lengkap</label>
          <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group col-md-6">
          <label for="email">email</label>
          <input type="email" class="form-control" name="email" placeholder="Email" required>
        </div>
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" placeholder="Apartemen, studio, or floor" required>
      </div>

      <div class="form-group">
        <span class="badge badge-danger"><?=$error?></span>
      </div>

      <button type="submit" name="daftar" class="btn btn-primary">Daftar</button>
    </form>

    <div class="form-group mt-4">
      <span class="text-muted">Udah punya akun ?</span>
      <a href="login.php" class="badge badge-primary">Login</a>
    </div>

  </div>
</div>

<?php require_once 'view/footer.php'; ?>
