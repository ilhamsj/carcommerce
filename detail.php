<?php require_once 'core/init.php'; ?>
<?php require_once 'view/header.php'; ?>

<div class="row">

  <div class="col-lg-3">

    <h1 class="my-4">Maju Jaya Mobilindo</h1>
    <div class="list-group">

      <?php if ($login == true): ?>
        <a href="#" class="list-group-item"> <?= $_SESSION['user'] ?> </a>
        <a href="#" class="list-group-item"> Transaction </a>
        <a href="logout.php" class="list-group-item"> Logout </a>
      <?php else: ?>
        <a href="login.php" class="list-group-item"> Login </a>
      <?php endif; ?>

    </div>

  </div>
  <!-- /.col-lg-3 -->

  <?php
    // $result = tampil_data_detail($id);
  ?>
  <div class="col-lg-9">

    <div class="card mt-4">
      <img class="card-img-top img-fluid" src="upload\Rental-Mobil-Cirebon.png" alt="">
      <div class="card-body">
        <h3 class="card-title">Product Name</h3>
        <h4>$24.99</h4>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
        <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
        4.0 stars
      </div>
    </div>
    <!-- /.card -->

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Product Reviews
      </div>
      <div class="card-body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
        <small class="text-muted">Posted by Anonymous on 3/1/17</small>
        <hr>
        <a href="#" class="btn btn-success">Leave a Review</a>
      </div>
    </div>
    <!-- /.card -->

  </div>
  <!-- /.col-lg-9 -->

</div>
<!-- /.row -->

<?php require_once 'view/footer.php'; ?>
