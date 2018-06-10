<page>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #ddd;
      padding: 8px;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>

  <?php
    $result = cetak_mobil();
  ?>

  <h1>Maju Jaya Mobilindo</h1>
  <p>
    <u>Data Penjualan dan Pembelian Mobil</u>
  </p>

  <table>
    <tr>
      <th>No</th>
      <th>ID Mobil</th>
      <th>No Plat</th>
      <th>Merk mobil</th>
      <th>Model mobil</th>
      <th>Warna</th>
      <th>Tahun</th>
      <th>Harga Beli</th>
      <th>Harga Jual</th>
      <th>Tanggal Beli</th>
      <th>Tanggal Jual</th>
    </tr>

    <?php
    $no = 0;
    $total_beli = 0;
    $total_jual = 0;
    $laku = 0;

    while ($row = mysqli_fetch_assoc($result)) {
    $no ++;
    $total_beli += $row['hrg_beli'];

  ?>

    <tr>
      <td><?= $no?></td>
      <td><?= $row['id_mobil']?></td>
      <td><?= $row['no_polisi']?></td>
      <td><?= $row['merk_mbl'] ?></td>
      <td><?= $row['model'] ?></td>
      <td><?= $row['warna'] ?></td>
      <td><?= $row['tahun'] ?></td>
      <td><?= rupiah($row['hrg_beli']) ?></td>
      <td><?= rupiah($row['hrg_jual']) ?></td>
      <td><?= newDate($row['tgl_beli']) ?></td>
      <td>
        <?php if (badge($row['tgl_jual']) == true): ?>
          <span class="badge badge-danger"> <?=newDate($row['tgl_jual'])?> </span>
          <?php
            $laku++;
            $total_jual += $row['hrg_jual'];
          ?>
        <?php else: ?>
          <span class="badge badge-success"> Belum Laku </span>
        <?php endif; ?>
      </td>
    </tr>

    <?php } ?>
  </table>

  <p/>

  <table>
    <tr>
      <th>Jml Mobil</th>
      <th>Laku</th>
      <th>Belum Laku</th>
      <th>Total Modal</th>
      <th>Total Penjualan</th>
      <th>Total Laba</th>

    </tr>

    <tr style="font-weight: bold">
      <td> <?=$no?> </td>
      <td> <?=$laku?> </td>
      <td> <?=$no - $laku?> </td>
      <td>
        <?= rupiah($total_beli) ?>
      </td>
      <td>
        <?= rupiah($total_jual) ?>
      </td>
      <td>
        <?= rupiah($total_jual - $total_beli) ?>
      </td>
    </tr>
  </table>

</page>
