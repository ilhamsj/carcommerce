<?php require_once 'core/init.php'; ?>
<?php include 'view/header.php'; ?>
<div class="row mt-4">

  <div class="col-lg-3">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <form method="get">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" placeholder="Cari" name="keyword" pattern="[^'\x22]+" title="Invalid input">
        </div>

        <button type="submit" name="cari" class="" style="display: none">cari</button>
      </div>
    </form>


    <div class="row mt-4">

    <?php
    $keyword = null;
    if (isset($_GET['cari'])) {
      $keyword = $_GET['keyword'];
    }

      $result = filter_data('cars', 'id_car', $keyword);
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card h-100">
        <a href="#">
          <img class="card-img-top" src="upload/<?=$row['car_image']?>" alt="">
        </a>

        <div class="card-body">
          <h4 class="card-title">
            <a href="#"><?= $row['car_merk'] .' '. $row['car_model'] . ' ' . $row['car_years']?></a>
          </h4>

          <?php
          if (newDate($row['date_sold']) > 0) { ?>
            <span class="badge badge-danger"> Laku </span>
          <?php } else { ?>
            <span class="badge badge-success">Ready</span>
          <?php } ?>



          <h5> <?= rupiah($row['car_price']) ?></h5>
          <!-- <p class="card-text">
            <?php //echo $row['car_description'];?>
          </p> -->
          </div>

          <?php if ($login == true): ?>
            <div class="card-footer">
            <?php if ($super_user == true): ?>
              <a class="btn btn-info" href="mobil-tambah.php">Add</a>
              <a class="btn btn-secondary" href="mobil-edit.php?id=<?=$row['id_car']?>">Edit </a>
              <a class="btn btn-danger" href="mobil-delete.php?id=<?=$row['id_car']?>">Del</a>
            <?php else: ?>
              <a class="btn btn-outline-primary" href="transaksi-wishlist.php?id=<?=$row['id_car']?>">Beli</a>
              <a class="btn btn-outline-danger" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
              <a class="btn btn-outline-primary" href="tanya-admin.php">Chat</a>
            <?php endif; ?>
          </div>
          <?php endif; ?>
      </div>
    </div>
    <?php } ?>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
