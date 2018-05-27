<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {
?>

<div class="row">

  <div class="col-lg-3">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

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
        $result = tampil_data_detail('pembayaran', 'status', 1);
        ?>

        <table class="table table-responsive" id="myTable">
          <thead>
            <tr>
              <th>ID Transaksi</th>
              <th>ID User</th>
              <th>Tanggal Transaksi</th>
              <th>Jumlah Bayar</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id_bayar'];
            ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['id_member'] ?></td>
              <td><?= newDate($row['tgl_byr']) ?></td>
              <td><?= rupiah($row['total_byr']) ?></td>
            </tr>
            <?php } ?>

          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <a href="cetak-mobil.php" class="btn btn-primary"> Cetak </a>
      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->


<?php
  } else {
    redirect_url('index.php');
  }
} else {
  redirect_url('login.php');
}

require_once 'view/footer.php';
?>
