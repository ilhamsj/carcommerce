<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {
?>


  <div class="col">

    <div class="card card-outline-secondary">
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

        <table class="table table-striped table-sm" id="myTable">
          <thead>
            <tr>
              <th>ID User</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Alamat</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?= $row['id_member']; ?></td>
              <td><?= ucfirst($row['nm_lgkp']); ?></td>
              <td><?= ucfirst($row['email']); ?></td>
              <td><?= ucfirst($row['alamat']); ?></td>
              <td><?= level_member($row['level'])?></td>
            </tr>
            <?php } ?>

            <tr>
              <td colspan="3"> <h4>Total User</h4> </td>
              <td>  </td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <a href="cetak/cetak-user.php" class="btn btn-primary"> Cetak </a>
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
