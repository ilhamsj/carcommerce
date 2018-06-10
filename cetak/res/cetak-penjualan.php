<?php
  $result = tampil_data_detail('pembayaran', 'status', 1);
  $no = 0;
  $total = 0;
?>

<page>
  <style>
    table {
      border-collapse: collapse;
      width: 90%;
      margin: auto;
    }

    td, th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    .center {
      margin: auto;
      text-align: center;
    }

    .col2 {
      width: 200px;
    }
  </style>

  <p class="center">
    <h1>
      Maju Jaya Mobilindo
    </h1>
    Transaksi Berhasil
    <hr>
  </p>

  <table>
    <tr>
      <th>No</th>
      <th>ID Transaksi</th>
      <th>ID User</th>
      <th>No Rekening</th>
      <th>Tanggal Transaksi</th>
      <th>Jumlah Bayar</th>
    </tr>

    <?php
      while ($row = mysqli_fetch_assoc($result)) {
      $no++;
      $total += $row['total_byr'];
    ?>

    <tr>
      <td><?=$no?></td>
      <td><?= $row['id_bayar']; ?></td>
      <td><?= $row['id_member'] ?></td>
      <td><?= $row['no_rek'] ?></td>
      <td><?= newDate($row['tgl_byr']) ?></td>
      <td><?= rupiah($row['total_byr']) ?></td>
    </tr>
    <?php } ?>

    <tr>
      <td>Total</td>
      <td>
        <?= $no ?> Transaksi
      </td>
      <td colspan="3"></td>
      <td>
        <?= rupiah($total) ?>
      </td>
    </tr>
  </table>
</page>
