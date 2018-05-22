<?php
require_once 'core/init.php';
include 'view/header.php';

if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) == 1) {

    if (isset($_POST['tambah'])) {

      $id_car = autonumber(id_akhir('cars', 'id_car'), 3, 4);

      $col1 = $_POST['no'];
      $col2 = $_POST['merk'];
      $col3 = $_POST['tipe'];
      $col4 = $_POST['warna'];
      $col5 = $_POST['tahun'];
      $col6 = $_POST['beli'];
      $col7 = $_POST['jual'];
      $col8 = $_POST['tglbeli'];
      $col9 = null;//$_POST['tgljual'];
      $asal  = $_FILES['gambar']['tmp_name'];
      $col10 = $_FILES['gambar']['name'];

      if ( empty(trim($col1))) {
        $error = "No Plat Tidak boleh kosong";
      } else {
        if (empty(trim($col2))) {
          $error = "merk tidak boleh kosong";
        } else {
          if (empty(trim($col3))) {
            $error = "Tipe mobil tidak boleh kosong";
          } else {
            if (empty(trim($col4))) {
              $error = "Warna tidak boleh kosong";
            } else {
              if (empty(trim($col5))) {
                $error = "Tahun tidak boleh kosong";
              } else {
                if (empty(trim($col6))) {
                  $error = "Harga beli tidak boleh kosong";
                } else {
                  if (empty(trim($col8))) {
                    $error = "Tanggal beli tidak boleh kosong";
                  } else {
                    if (empty(trim($col10))) {
                      $error = "Gambar tidak boleh kosong";
                    } else {
                      if (tambah('cars', $id_car, $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10)) {
                        move_uploaded_file($asal, "upload/".$col10);
                        // $message = "Data Berhasil ditambahkan " . '<a href="index.php">Home</a>';
                        redirect_url('index.php');
                      } else {
                        echo "ga berhasil";
                      }
                    }
                  }
                }
              }
            }
          }
        }

      }
    }
?>

<div class="row">

  <div class="col-lg-3 mt-4">
    <?php include 'menu.php'; ?>
  </div>
  <!-- /.col-lg-3 -->

  <div class="col-lg-9">

    <div class="card card-outline-secondary my-4">
      <div class="card-header">
        Tambah Data Mobil
      </div>
      <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-row">
            <div class="form-group col">
              <label for="no">No. Polisi</label>
              <input type="text" class="form-control" name="no" pattern=".{6,}" title="Six or more characters">
            </div>

            <div class="form-group col">
              <label for="merk">Merk</label>
              <?php $result = tampil_data('merk', 'merk'); ?>

              <select class="form-control" id="merk" name="merk">
              <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <option><?=$row['merk']?></option>
              <?php } ?>
              </select>
            </div>
            
            <div class="form-group col">
              <label for="tipe">Tipe</label>
              <input type="text" class="form-control" name="tipe" pattern=".{6,}" title="Six or more characters">
            </div>
            <div class="form-group col">
              <label for="warna">Warna</label>
              <input type="text" class="form-control" name="warna" pattern=".{3,}" title="3 or more characters">
            </div>
            <div class="form-group col">
              <label for="tahun">Tahun</label>
              <input type="number" class="form-control" name="tahun" pattern=".{4,}" title="4 or more characters">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="beli">Harga Beli</label>
              <input type="number" class="form-control" name="beli" placeholder="Rp" pattern=".{6,}" title="Six or more characters">
            </div>

            <div class="form-group col">
              <label for="jual">Harga Jual</label>
              <input type="number" class="form-control" name="jual" placeholder="Rp" pattern=".{6,}" title="Six or more characters">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col">
              <label for="tglbeli">Tanggal Beli</label>
              <input type="date" class="form-control" name="tglbeli">
            </div>

            <div class="form-group col">
              <label for="tgljual">Tanggal Jual</label>
              <input type="date" class="form-control" name="tgljual" disabled>
            </div>
          </div>

          <div class="form-group">
            <label for="gambar">Upload Gambar</label>
            <input type="file" class="form-control-file" name="gambar">
          </div>

          <div class="form-group">
            <span class="badge badge-danger"><?=$error?></span>
          </div>

          <button type="submit" class="btn btn-primary" name="tambah">
            Simpan
          </button>
        </form>

      </div>
      <div class="card-footer">
        Pastikan data Terisi dengan benar
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
