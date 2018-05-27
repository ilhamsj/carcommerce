<?php
function tampil_per_kolom($column, $table) {
  $query  = "SELECT DISTINCT $column FROM $table";
  return run($query);
}

function filter_data_join($merk, $model) {
  $query  =
  "SELECT mobil.*, merk.merk_mbl
  FROM mobil
  INNER JOIN merk
  ON merk.id_merk=mobil.id_merk
  WHERE merk_mbl LIKE '%$merk%' OR model LIKE '%$model%'";

  return run($query);
}

function cek_isi($results) {
  if (mysqli_num_rows($results) > 0) return true;
  else return false;
}



?>
