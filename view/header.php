<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Mobil Shop</title>
    <link rel="icon" href="assets\images\apple-touch-icon.png">
    <link href="assets\css\roboto.css" rel="stylesheet">
    <link href="assets\css\custom.css" rel="stylesheet">
    <link rel="stylesheet" href="node_modules\font-awesome\css\font-awesome.css">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.min.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">
          <img src="assets\images\apple-touch-icon.png" width="30" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
          </ul>

          <div class=" my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <?php if ($login == true): ?>
                    <?php if ($super_user == true): ?>
                      <a href="tanya-admin.php" class="dropdown-item"> Pesan </a>
                      <a href="mobil-list.php" class="dropdown-item"> Data Mobil </a>
                      <a href="user-list.php" class="dropdown-item"> Data User </a>
                      <a href="transaksi-list.php" class="dropdown-item"> Data Transaksi </a>
                      <a href="mobil-tambah.php" class="dropdown-item"> Tambah Mobil </a>
                    <?php else: ?>
                      <a href="tanya-admin.php" class="dropdown-item"> Inbox </a>
                      <a href="profile.php" class="dropdown-item"> Transaksi </a>
                    <?php endif; ?>
                    <a href="logout.php" class="dropdown-item"> Logout </a>
                  <?php else: ?>
                    <a href="login.php" class="dropdown-item"> Login </a>
                    <a href="daftar.php" class="dropdown-item"> Daftar </a>
                  <?php endif; ?>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </nav>

    <!-- Page Content -->
    <div class="container minim mt-4">
