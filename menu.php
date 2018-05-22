<div class="list-group">
  <?php if ($login == true): ?>
    <?php if ($super_user == true): ?>
      <a href="tanya-admin.php" class="list-group-item"> Pesan </a>
      <a href="mobil-list.php" class="list-group-item"> Data Mobil </a>
      <a href="user-list.php" class="list-group-item"> Data User </a>
      <a href="transaksi-list.php" class="list-group-item"> Data Transaksi </a>
      <a href="mobil-tambah.php" class="list-group-item"> Tambah Mobil </a>
    <?php else: ?>
      <a href="tanya-admin.php" class="list-group-item"> Inbox </a>
      <a href="profile.php" class="list-group-item"> Transaksi </a>
    <?php endif; ?>
    <a href="logout.php" class="list-group-item"> Logout </a>
  <?php else: ?>
    <a href="login.php" class="list-group-item"> Login </a>
    <a href="daftar.php" class="list-group-item"> Daftar </a>
  <?php endif; ?>
</div>

<div class="list-group mt-4">
  <a href="about.php" class="list-group-item"> Cara Beli <i class="fas fa-arrow"></i> </a>
</div>

<div class="list-group mt-4">
  <a href="#" class="list-group-item text-muted" > Kontak </a>
  <a href="https://web.whatsapp.com/" class="list-group-item"> <i class="fa fa-phone" aria-hidden="true"> </i> (021) 70454598 </a>
  <a href="https://web.whatsapp.com/" class="list-group-item"> <i class="fa fa-whatsapp" aria-hidden="true"></i> 081807857733 </a>
  <a href="https://web.whatsapp.com/" class="list-group-item"> <i class="fa fa-envelope-o" aria-hidden="true"></i> artikhansa11@gmail.com </a>
</div>
