<?php require_once 'core/init.php'; ?>
<?php require_once 'view/header.php'; ?>

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Maju Jaya Mobilindo</h1>
    <div class="list-group">

      <?php if ($login == true): ?>
        <a href="#" class="list-group-item"> <?= $_SESSION['user'] ?> </a>
        <a href="#" class="list-group-item"> Transaction </a>
        <a href="logout.php" class="list-group-item"> Logout </a>
      <?php else: ?>
        <a href="login.php" class="list-group-item"> Login </a>
      <?php endif; ?>

    </div>

  </div>
  <!-- /.col-lg-3 -->

  <?php
    // $result = tampil_data_detail($id);
  ?>
  <div class="col-lg-9">

    <div class="card mt-4">
      <div class="card-body">
        <h3 class="card-title">Halaman Transaksi</h3>

        <p class="card-text">
          Setelah Upload Admin akan melalukan verivikasi Tunggu beberapa saat
        </p>

      </div>
    </div>
    <!-- /.card -->

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Upload Bukti Pembayaran
      </div>
      <div class="card-body">
        <form method="post">

          <div class="form-group">
            <input type="file" name="bukti-pembayaran" class="form-control"/>
          </div>

          <small id="response" class="form-text text-muted"><?= $error; ?></small>
          <button type="submit" class="btn btn-primary" name="upload">Upload</button>

        </form>

        <?php
        if (isset($_POST['upload'])) {
          header('Location: index.php');
          // $id_user  = $_POST['username'];
          // $id_car   = $_POST['password'];
          // $transaction_date = ;

        }
        ?>

      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
