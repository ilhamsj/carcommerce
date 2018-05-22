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
        Data Mobil
      </div>
      <div class="card-body">
        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction('7')" placeholder="Search for names..">
          </div>
        </form>

        <?php
        $result = tampil_data('cars', 'id_car');
        ?>

        <table class="table table-responsive" id="myTable">
          <thead>
          <tr>
            <!-- <th>Id</th> -->
            <th>No Polisi</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Warna</th>
            <th>Tahun</th>
            <th>Hrg Beli</th>
            <th>Hrg Jual</th>
            <th>Tgl Beli</th>
            <th>Tgl Laku</th>
          </tr>
        </thead>
          <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id_car'];

            $tgl_beli = tglstatus($row['date_purchase'], 'Belum diisi');
            $tgl_jual = tglstatus($row['date_sold'], 'Belum Laku');
          ?>
          <tr>
            <!-- <td><?= $id ?></td> -->
            <td><?= $row['car_nopolice'] ?></td>
            <td><?= $row['car_merk'] ?></td>
            <td><?= $row['car_model'] ?></td>
            <td><?= $row['car_color'] ?></td>
            <td><?= $row['car_years'] ?></td>
            <td><?= rupiah($row['car_purchase']) ?></td>
            <td><?= rupiah($row['car_price']) ?></td>
            <td><?= $tgl_beli ?></td>
            <td><?= $tgl_jual ?></td>
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
