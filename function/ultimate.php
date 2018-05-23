<?php
function run($query) {
  global $link;
  return mysqli_query($link, $query);
}

// login
if (isset($_SESSION['user'])) {
    $login = true;
    if (cek_status($_SESSION['user']) == 1) {
    $super_user = true;
  }
}

function cek_data($user, $pass) {
  $pass   = md5($pass);
  $query  = "SELECT * FROM member WHERE username='$user' AND password='$pass'";

  if (mysqli_num_rows(run($query)) != 0) return true;
  else return false;
}

function cek_status($user) {
  $query  = "SELECT level FROM member WHERE username='$user'";

  while ($row = mysqli_fetch_assoc(run($query))):
    return $row['level'];
  endwhile;
}

//
function tampil_data($column, $key) {
  $query  = "SELECT * FROM $column ORDER BY $key DESC";
  return run($query);
}

//
function tampil_data_detail($column, $key, $value) {
  $query  = "SELECT * FROM $column WHERE $key='$value'";
  return run($query);
}

//
function tambah_data($col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12) {
  $query  = "INSERT INTO mobil VALUES ('$col1', '$col2', '$col3', '$col4', '$col5', '$col6', '$col7', '$col8', '$col9', '$col10', '$col11', '$col12')";
  return run($query);
}
?>
