<?php require_once 'core\init.php'; ?>
<?php include 'view\header.php'; ?>
<?php

if (isset($_SESSION["user"])) {
  header('Location: index.php');
} else {
  if (isset($_POST['login'])) {

    $user = $_POST['username'];
    $pass = $_POST['password'];

    if (!empty(trim($user)) && !empty(trim($pass))) {
      if (cek_data($user, $pass)) {
        $_SESSION["user"] = $user;

        if (cek_status($_SESSION['user']) == 1) {
          header('Location: index.php');
        } else {
          header('Location: index.php');
        }
      } else {
        $error = 'Username dan password tidak ditemukan';
      }
    } else {
      $error = 'Username dan password wajib diisi  ';
    }
  }
}

?>

<div class="row single">
  <div class="col-lg-4">
    <h1>Silahkan login</h1>
    <form method="post">

      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username">
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Password">
      </div>

      <div class="form-group">
        <span class="badge badge-danger"><?=$error?></span>
      </div>

      <button type="submit" class="btn btn-primary" name="login">Login</button>

      <div class="form-group mt-4">
        <span class="text-muted">Belum punya akun ?</span>
        <a href="daftar.php" class="badge badge-primary">Daftar</a>
      </div>
    </form>

  </div>
</div>

<?php require_once 'view/footer.php'; ?>
