<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {
?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Data User
      </div>
      <div class="card-body">

        <form method="post">
          <div class="form-group">
            <input type="text" class="form-control" id="myInput" onkeyup="myFunction('0')" placeholder="Search for ID User..">
          </div>
        </form>

        <?php
        $result = tampil_data('member', 'id_member');
        ?>

        <table class="table table-responsive" id="myTable">
          <thead>
            <tr>
              <th>ID User</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?= $row['id_member']; ?></td>
              <td><?= ucfirst($row['nm_lgkp']); ?></td>
              <td><?= ucfirst($row['email']); ?></td>
              <td><?= ucfirst($row['alamat']); ?></td>
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
