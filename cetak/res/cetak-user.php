<?php
  $result = tampil_data('member', 'id_member');
  $no = 0;
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
    Data User
    <hr>
  </p>

  <table>
    <tr>
      <th>No</th>
      <th>ID User</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Alamat</th>
      <th>Status</th>
    </tr>

    <?php
      while ($row = mysqli_fetch_assoc($result)) {
      $no++;
    ?>

    <tr>
      <td><?=$no?></td>
      <td><?= $row['id_member']; ?></td>
      <td><?= ucfirst($row['nm_lgkp']); ?></td>
      <td><?= ucfirst($row['email']); ?></td>
      <td class="col2"><?= ucfirst($row['alamat']); ?></td>
      <td><?= level_member($row['level'])?></td>
    </tr>

    <?php } ?>
  </table>
</page>
