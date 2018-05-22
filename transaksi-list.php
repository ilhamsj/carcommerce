<?php
require_once 'core/init.php';
include 'view/header.php';

if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) == 1) {
?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card card-outline-secondary my-4">
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
        $result = tampil_data('transactions', 'id_transaction');
        ?>

        <table class="table table-responsive" id="myTable">
          <thead>
            <tr>
              <th>ID Transaksi</th>
              <th>ID User</th>
              <th>Tanggal Transaksi</th>
              <th>Action</th>
              <th>Jumlah Bayar</th>
              <th>Deskripsi</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id_transaction'];
            ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= $row['id_user'] ?></td>
              <td><?= newDate($row['transaction_date']) ?></td>

              <?php
              switch ($row['transaction_status']) {
                case "0":
                  $status = "on wishlist";
                  break;

                case "1":
                  $_SESSION['car'] = $row['id_car'];
                  $status = "<a href='transaksi-verifikasi.php?id=".$id."'>verify</a>";
                  break;

                default:
                  $status = "succes";
                  break;
              }
              ?>

              <td><?= $status; ?></td>
              <td><?= rupiah($row['transaction_count']) ?></td>
              <td><?= $row['description'] ?></td>
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
    header('Location: index.php');
  }
} else {
  header('Location: login.php');
}
require_once 'view/footer.php';
?>
