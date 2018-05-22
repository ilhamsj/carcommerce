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
      <img class="card-img-top img-fluid" src="upload\Rental-Mobil-Cirebon.png" alt="">
      <div class="card-body">
        <h3 class="card-title">Maju Jaya Mobilindo</h3>
        <p class="card-text">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus
        </p>
      </div>
    </div>
    <!-- /.card -->

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        FaQ
      </div>
      <div class="card-body">
        <h2>
          Bagaimana cara membeli mobil di Maju Jaya Mobilindo ?
        </h2>
        <p>
          <ol>
            <li>Login atau daftar Akun Mobilindo Terlebih dahulu</li>
            <li>Pilih mobil yang akan anda beli, Klik beli</li>
            <li>Pilih Metode Pembayaran (Cek metode Pembayaran yang tersedia)</li>
            <li>Bayar dan Upload bukti Pembayaran</li>
            <li>Tunggu admin untuk verifikasi</li>
            <li>Mobil anda akan dikirimkan</li>
            <li>Verivikasi jika mobil sudah diterima & Beri ulasan</li>
          </ol>
        </p>
        <small class="text-muted">Posted by Admin on 3/1/17</small>
        <hr>
        <a href="#" class="btn btn-success">Leave a Review</a>
      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
