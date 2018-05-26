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
function id_akhir($column, $key) {
  $query  = "SELECT * FROM $column WHERE $key = (SELECT MAX($key) FROM $column)";
  while ($row = mysqli_fetch_assoc(run($query))) {
    return $id_terakhir = $row[$key];
  }
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

//
function pilih_kolom($column, $table, $key, $value) {
  $query  = "SELECT $column FROM $table WHERE $key='$value'";

  while ($row = mysqli_fetch_assoc(run($query))):
    return $row[$column];
  endwhile;
}

//
function hapus_data($column, $value, $key) {
    $query  = "DELETE FROM $column WHERE $value='$key'";
  return run($query);
}

//
function tampil_data_beda($column, $key, $value) {
  $query  = "SELECT * FROM $column WHERE $key != '$value'";
  return run($query);
}

//
function daftar($table, $col1, $col2, $col3, $col4, $col5, $col6, $col7) {
  $col3 = md5($col3);
  return run("INSERT INTO $table VALUES('$col1', '$col2', '$col3', '$col4', '$col5', '$col6', '$col7')");
}

function cek_username($user) {
  if (mysqli_num_rows(run("SELECT * FROM member WHERE username='$user'")) == 0) return true;
  else return false;
}

function tambah_pemesanan($table, $col1, $col2, $col3, $col4) {
  $query  = "INSERT INTO $table VALUES ('$col1', '$col2', '$col3', CURRENT_TIMESTAMP(), '$col4')";
  return run($query);
}

function total_harga() {
  $query  = "SELECT SUM(hrg_jual) AS total FROM mobil WHERE id_mobil='MBL0015'";
  return run($query);
}

function pembayaran($val1, $val2, $val3, $val4, $val5, $val7, $val8) {
  $query = "INSERT INTO pembayaran VALUES ('$val1', '$val2', '$val3', '$val4', '$val5', CURRENT_TIMESTAMP(), '$val7', '$val8')";
  return run($query);
}

function cek_pesanan($id) {
  $query  = "SELECT status FROM pembayaran WHERE id_pemesanan='$id'";
  if (mysqli_num_rows(run($query)) > 0) return true;
  else return false;
}

function cek_status_pembayaran($id) {
  $query  = "SELECT status FROM pembayaran WHERE id_pemesanan='$id'";
  while ($row = mysqli_fetch_assoc(run($query))):
    return $row['status'];
  endwhile;
}

?>
