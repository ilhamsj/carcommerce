<?php
function hapus_data($column, $key, $value) {
  global $link;

  $query  = "DELETE FROM $column WHERE $key='$value'";;
  $result = mysqli_query($link, $query);

  return $result;
}

// "SELECT * FROM articles WHERE (`title` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')";
?>
