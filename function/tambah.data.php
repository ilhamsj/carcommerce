<?php
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
