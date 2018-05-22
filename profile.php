<?php
require_once 'core/init.php';
include 'view/header.php';

if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) != 1) {

?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">
    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        History Transaksi
      </div>
      <div class="card-body">

        <?php
        $key = id_user($_SESSION['user']);
        $result = tampil_data_detail_str('transactions', 'id_user', $key, 'id_transaction');
        ?>

        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Jumlah Bayar</th>
              <th>Deskripsi</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id_transaction'];
            ?>
            <tr>
              <td><?= $id ?></td>
              <td><?= newDate($row['transaction_date']) ?></td>

              <?php
              switch ($row['transaction_status']) {
                case "0":
                  $status = "<a href='transaksi-upload.php?id=".$id."'>Upload Bukti Bayar</a>";
                  break;

                case "1":
                  $status = "Proses Verivikasi";
                  break;

                default:
                  $status = "Berhasil";
                  break;
              }
              ?>

              <td><?= $status; ?></td>
              <td><?= $row['transaction_count'] ?></td>
              <td><?= $row['description'] ?></td>
              <td>
                <a href="#"><i class="fa fa-print"></i></a>
                <a href="#"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            <?php } ?>

          </tbody>
        </table>
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
?>

<?php require_once 'view/footer.php'; ?>
