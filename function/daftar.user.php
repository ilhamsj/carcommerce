<?php
function daftar($col1, $col2, $col3, $col4, $col5, $col6, $col7) {
  global $link;

  $col3 = md5($col3);

  $query  = "INSERT INTO users VALUES('$col1', '$col2', '$col3', '$col4', '$col5', '$col6', '$col7')";
  $result = mysqli_query($link, $query);

  return $result;
}

function cek_username($user) {
  global $link;

  $query  = "SELECT * FROM users WHERE username='$user'";
  $result = mysqli_query($link, $query);

  if (mysqli_num_rows($result) == 0) {
    return true;
  } else {
    return false;
  }


  return $result;
}

?>
