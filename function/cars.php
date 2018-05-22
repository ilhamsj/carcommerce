<?php
function tampil_data_detail($id) {
  global $link;

  $query  = "SELECT * FROM cars WHERE id_car=$id";
  $result = mysqli_query($link, $query);
  return $result;
}
?>
