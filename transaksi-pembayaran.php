<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true):
  $user   = tampil_data_detail('member', 'username', $_SESSION['user']);
  while ($row = mysqli_fetch_assoc($user)):
    $nama   = $row['nm_lgkp'];
    $alamat = $row['alamat'];
    $telp = $row['telp'];
  endwhile;

  $car = tampil_data_detail('mobil', 'id_mobil', pilih_kolom('id_mobil', 'pemesanan', 'id_pemesanan', $_GET['id']));
  while ($row = mysqli_fetch_assoc($car)):
    $merk       = $row['id_merk'];
    $no         = $row['no_polisi'];
    $model      = $row['model'];
    $warna      = $row['warna'];
    $tahun      = $row['tahun'];
    $harga      = $row['hrg_beli'];
    $gambar     = $row['gambar'];
  endwhile;

  if (isset($_POST['submit'])) {

    $val1 = autonumber(id_akhir('pembayaran', 'id_bayar'), 3, 4);
    $val2 = $_GET['id'];
    $val3 =  pilih_kolom('id_member', 'member', 'username', $_SESSION['user']);
    $val4 = $_POST['bank'];
    $val5 = $harga;
    $val7 = NULL;
    $val8 = 0;
    $val9 = $_POST['rekening'];

    if (pembayaran($val1, $val2, $val3, $val4, $val5, $val7, $val8, $val9)) {
      redirect_url('transaksi-upload.php?id='.$val1);
    } else {
      echo "g berhasil";
    }
  }
?>

<div class="row mt-4">
  <div class="col-lg-3">
      <?php include 'menu.php'; ?>
  </div>

  <div class="col-lg-9">
    <div class="row">
      <div class="col-sm-5">
        <div class="card">
          <h5 class="card-header">Detail Pelanggan</h5>
          <div class="card-body">
            <address class="">
              <p>
                <strong>Nama Lengkap</strong> <br/>
                <?=$nama; ?>
              </p>
              <p>
                <strong>Alamat</strong> <br/>
                <?=$alamat; ?>
              </p>

              <p>
                <strong>Kontak</strong> <br/>
                <abbr title="Phone"><?=$telp?></abbr>
              </p>
            </address>
            <button type="button" class="btn btn-outline-primary">Edit</button>

          </div>
        </div>
      </div>
      <div class="col">
          <div class="card">
            <h5 class="card-header">Detail Transaksi</h5>
            <div class="card-body">

              <address class="row">
                <p class="col">
                  Merk <br/>
                  <strong><?= pilih_kolom('merk_mbl', 'merk', 'id_merk', $merk)?></strong>
                </p>

                <p class="col">
                  Model<br/>
                  <strong><?= $model?></strong><p/>
                </p>

                <p class="col">
                  Tahun<br/>
                  <strong><?= $tahun ?></strong><p/>
                </p>

                <p class="col">
                  No Polisi<br/>
                  <strong><?= $no ?></strong><p/>
                </p>
              </address>

              <address class="">
                Total Harga<br/>
                <h2><?= rupiah($harga) ?></h2>
              </address>

              Metode Bayar :<br/>
              <form class="was-validated" method="post">

                <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="mandiri" name="bank" value="mandiri" required>
                  <label class="custom-control-label" for="mandiri">Bank Mandiri</label>
                </div>

                <div class="form-group custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="bca" name="bank" value="bca" required>
                  <label class="custom-control-label" for="bca">Bank BCA</label>
                </div>

                <div class="form-group">
                  <label for="rekening">No Rekening Anda</label>
                  <input name="rekening" type="number" class="form-control" placeholder="No Rekening" required>
                </div>

                <button type="submit" name="submit" class="btn btn-outline-primary">Bayar</button>
                <button type="button" class="btn btn-outline-primary">Batal</button>
              </form>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>

<?php
else:
  redirect_url('login.php');
endif;

require_once 'view/footer.php';
?>
