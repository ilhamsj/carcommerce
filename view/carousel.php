<?php $caros = tampil_data_limit('mobil', 'id_mobil'); ?>
<div id="carouselExampleIndicators" class="carousel slide mb-4" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="upload\maxresdefault.jpg" alt="First slide">
    </div>
    <?php while ($row = mysqli_fetch_assoc($caros)) { ?>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="upload/<?=$row['gambar']?>" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <h4 class="bg-warning">
          Seri Terbaru
        </h4>

        <a href="mobil-detail.php?id=<?=$row['id_mobil']?>" class="btn btn-primary mb-2" >
          Detail
        </a>

      </div>
    </div>
    <?php } ?>
  </div>

  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>

  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

</div>
