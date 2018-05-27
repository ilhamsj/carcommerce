<?php
$daftar_merk = tampil_per_kolom('merk_mbl', 'merk');
$list_model = tampil_per_kolom('model', 'mobil');

if (isset($_GET['submit'])) {
  $merk   = $_GET['merk'];
  $model  = $_GET['model'];
  redirect_url('cari.php?merk='.$merk.'&model='.$model);
}
?>

<div class="list-group">
  <form method="get">
    <div class="form-group">
      <input type="search" name="cari" class="form-control" placeholder="Telusuri">
    </div>

    <div class="form-group">
      <select class="form-control" id="merk" name="merk">
        <option hidden selected>Merk Mobil</option>
        <?php while ($row = mysqli_fetch_assoc($daftar_merk)): ?>
          <option value="<?=$row['merk_mbl']?>"><?=$row['merk_mbl']?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <div class="form-group">
      <select class="form-control" id="model" name="model">
        <option hidden selected>Model Mobil</option>
        <?php while ($row = mysqli_fetch_assoc($list_model)): ?>
          <option value="<?=$row['model']?>"><?=$row['model']?></option>
        <?php endwhile; ?>
      </select>
    </div>

    <button type="submit" name="submit" class="btn btn-secondary btn-sm btn-block">Cari</button>
  </form>
</div>
