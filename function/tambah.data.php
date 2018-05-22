<?php
function tambah($column, $id_car, $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10) {
  global $link;

  $query  = "INSERT INTO $column VALUES('$id_car', '$col1', '$col2', '$col3', '$col4', '$col5', '$col6', '$col7', '$col8', '$col9', '$col10')";
  $result = mysqli_query($link, $query);
  return $result;
}

//chatting
function chatting($col1, $col2, $col3, $col4, $col5) {
  global $link;

  $query  = "INSERT INTO konfirmasi VALUES(NULL, '$col1', '$col2', '$col3', '$col4', '$col5')";
  $result = mysqli_query($link, $query);

  return $result;
}

function tampil_chatting($column) {
  global $link;

  $query  = "SELECT * FROM $column";
  $result = mysqli_query($link, $query);
  return $result;
}

?>
