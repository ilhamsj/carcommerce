<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  $value = $_GET['id'];
  if (hapus_data('pemesanan', 'id_pemesanan', $value)) {
    redirect_url('profile.php');
  } else {
    echo "gagal hapus data";
  }
} else {
  redirect_url('login.php');
}

?>
