<?php
function filter_data($column, $key, $cari) {
  global $link;

  $query  = "SELECT * FROM $column WHERE car_merk LIKE '%$cari%' OR car_model LIKE '%$cari%' ORDER BY $key DESC";
  $result = mysqli_query($link, $query);
  return $result;
}
?>
