<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true):
  $value  = pilih_kolom('id_member', 'member', 'username', $_SESSION['user']);
  $cart   = tampil_data_detail('pemesanan', 'id_member', $value);
?>



<div class="row mt-4">
  <div class="col-lg-3">
      <?php include 'menu.php'; ?>
  </div>

  <div class="col-lg-9">
    <div class="card-body">
      <table class="table">
        <tbody>

          <?php
          while ($row = mysqli_fetch_assoc($cart)):

            $id_psn   = $row['id_pemesanan'];
            $id_mmbr  = $row['id_member'];
            $id_mbl   = $row['id_mobil'];
            $tgl      = $row['tgl_pesan'];
            $status   = $row['status'];

            $car = tampil_data_detail('mobil', 'id_mobil', $id_mbl);
            while ($row = mysqli_fetch_assoc($car)):
          ?>
          <tr>
            <td><img src="upload\<?=$row['gambar']?>" alt="" style="width:150px"> </td>
            <td><?=$row['no_polisi']?></td>
            <td>
              <a href="mobil-detail.php?id=<?=$row['id_mobil']?>">
                <?= pilih_kolom('merk_mbl', 'merk', 'id_merk', $row['id_merk']) .' '. $row['model'] . ' ' . $row['tahun']?>
              </a>
            </td>
            <td>
              <?= rupiah($row['hrg_jual']) ?>
            </td>
            <td>

              <?php if (cek_pesanan($id_psn) == true): ?>
                <?php if (cek_status_pembayaran($id_psn) == 0): ?>
                  <a href="transaksi-upload.php?id=<?= pilih_kolom('id_bayar', 'pembayaran', 'id_pemesanan', $id_psn) ?>" class="badge badge-warning">
                    Upload Bukti Bayar
                  </a> <br/>
                  <a href="pemesanan-delete.php?id=<?= $id_psn ?>" class="badge badge-danger">Hapus</a>
                <?php else: ?>
                  <span class="badge badge-success">Transaksi Berhasil</span>
                <?php endif; ?>
              <?php else: ?>
                  <a href="transaksi-pembayaran.php?id=<?= $id_psn ?>" class="badge badge-primary">Lanjutkan ke proses pembayaran</a><br/>
                  <a href="pemesanan-delete.php?id=<?= $id_psn ?>" class="badge badge-danger">Hapus</a>
              <?php endif; ?>



            </td>
          </tr>
            <?php
          endwhile;
        endwhile;
        ?>


        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
else:
  redirect_url('login.php');
endif;

require_once 'view/footer.php';
?>
