<?php
require_once 'core\init.php';
include 'view\header.php';

if ($login == true) {
  redirect_url('index.php');
} else {
  if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (cek_data($user, $pass)) {
      $_SESSION["user"] = $user;
      redirect_url('index.php');
    } else {
      $error = 'Username dan password tidak ditemukan';
    }
  }
}
?>
<div class="row mt-4" style="min-height: 600px;">

  <div class="col-lg-8">
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
      </div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card rounded-0">
      <div class="card-header">
        <h5 class="card-title">Silahkan login</h5>
      </div>

      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control rounded-0" placeholder="Username" required>
            <div class="invalid-feedback">Oops, you missed this one.</div>
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control rounded-0" placeholder="Password" required>
          </div>

          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Isi data anda dengan benar <?=$error?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <button type="submit" class="btn btn-success" name="login">Login</button>
        </form>
      </div>

      <div class="card-footer">
        <span class="text-muted">Belum punya akun ?</span>
        <a href="daftar.php" class="btn btn-primary btn-sm">Daftar</a>
      </div>
    </div>
  </div>
</div>
<?php require_once 'view/footer.php'; ?>
