<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {
?>


  <div class="col">

    <div class="card card-outline-secondary">
      <div class="card-header">
        Data Transaksi
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-row">
            <div class="form-group col-md-3">
              <input type="text" class="form-control" name="tglbeli" id="myInput" onkeyup="myFunction('2')" placeholder="Tanggal Transaksi">
            </div>
          </div>
        </form>

        <?php
          $result = tampil_data('pembayaran', 'status');
        ?>

        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>ID Transaksi</th>
              <th>ID User</th>
              <th>No Rekening</th>
              <th>Tanggal Transaksi</th>
              <th>Jumlah Bayar</th>
              <th>Bukti Bayar</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id_bayar'];
            ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['id_member'] ?></td>
              <td><?= $row['no_rek'] ?></td>
              <td><?= newDate($row['tgl_byr']) ?></td>
              <td><?= rupiah($row['total_byr']) ?></td>
              <td> <img class="img-thumbnail" src="upload/transaksi/<?=$row['bukti_byr']?>" style="width:100px"> </td>
            </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <a href="cetak/cetak-penjualan.php" class="btn btn-primary"> Cetak </a>
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
