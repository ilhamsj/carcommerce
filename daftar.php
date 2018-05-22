<?php
require_once 'core\init.php';
include 'view\header.php';

if (isset($_SESSION["user"])) {
  header('Location: index.php');
} else {

  if (isset($_POST['daftar'])) {

    $col1 = autonumber(id_akhir('users', 'id_user'), 3, 4);
    $col2 = $_POST['username'];
    $col3 = $_POST['password'];
    $col4 = 0;
    $col5 = $_POST['fullname'];
    $col6 = $_POST['email'];
    $col7 = $_POST['alamat'];

    if (empty(trim($col2))) {
      $error = "Username tidak boleh kosong";
    } else {
      if (cek_username($col2)) {

        if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
            $error = "Email is not valid";
        } else {
          if (daftar($col1, $col2, $col3, $col4, $col5, $col6, $col7)) {
            $_SESSION['user'] = $col2;
            redirect_url('index.php');
          } else {
            $error = "Ada masalah saat daftar";
          }
        }//email ketersdeiaan

      } else {
        $error = "Username $col2 tidak tersedia";
      }
    } //username
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
          <input type="text" class="form-control" name="username" placeholder="Username" pattern=".{5,}" title="five or more characters">
        </div>
        <div class="form-group col-md-6">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password" pattern=".{6,}" title="Six or more characters">
        </div>
      </div>

      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="fullname">Nama Lengkap</label>
          <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap">
        </div>
        <div class="form-group col-md-6">
          <label for="email">email</label>
          <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
        </div>
      </div>


      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" name="alamat" placeholder="Apartemen, studio, or floor">
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
