<?php
function tampil_data_detail_str($culumn, $table, $key, $rowx) {
  $query  = "SELECT * FROM $culumn WHERE $table='$key' ORDER BY $rowx DESC";
  return run($query);
}


function id_akhir($column, $key) {
  global $link;

  $query  = "SELECT * FROM $column WHERE $key = (SELECT MAX($key) FROM $column)";
  $result = mysqli_query($link, $query) or die('Error 404');

  while ($row = mysqli_fetch_assoc($result)) {
    $id_terakhir = $row[$key];
  }

  return $id_terakhir;
}

function tampil_pengecualian($culumn, $table, $key, $rowx) {
  global $link;

  $query  = "SELECT * FROM $culumn WHERE $table != '$key' ORDER BY $rowx DESC";
  $result = mysqli_query($link, $query);

  return $result;
}
?>
