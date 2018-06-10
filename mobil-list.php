<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {
?>

  <div class="col">

    <div class="card card-outline-secondary">
      <div class="card-header">
        Data Mobil
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction('2')" placeholder="Search for names..">
          </div>
        </form>

        <?php
        $result = tampil_data('mobil', 'id_mobil');
        ?>

        <table class="table table-striped table-sm" id="myTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Merk</th>
                <th>No Polisi</th>
                <th>Model</th>
                <th>Warna</th>
                <th>Tahun</th>
                <th>Hrg Beli</th>
                <th>Hrg Jual</th>
                <th>Tgl Beli</th>
                <th>Tgl Jual</th>
              </tr>
          </thead>

          <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
            <td> <?= $row['id_mobil'] ?> </td>
            <td><?= pilih_kolom('merk_mbl', 'merk', 'id_merk', $row['id_merk']) ?></td>
            <td><?= $row['no_polisi'] ?></td>
            <td><?= $row['model'] ?></td>
            <td><?= $row['warna'] ?></td>
            <td><?= $row['tahun'] ?></td>
            <td><?= rupiah($row['hrg_beli']) ?></td>
            <td><?= rupiah($row['hrg_jual']) ?></td>
            <td> <?= newDate($row['tgl_beli']) ?> </td>
            <td>
              <?php if (badge($row['tgl_jual']) == true): ?>
                <span class="badge badge-danger"> <?=newDate($row['tgl_jual'])?> </span>
              <?php else: ?>
                <span class="badge badge-success"> Belum Laku </span>
              <?php endif; ?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
      </table>
      </div>
      <div class="card-footer">
        <a href="cetak/cetak-mobil.php" class="btn btn-primary"> Cetak </a>
      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

<?php
  } else {
    redirect_url('index.php');
  }
} else {
  redirect_url('login.php');
}
require_once 'view/footer.php';
?>
