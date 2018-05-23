<?php
require_once 'core/init.php';
include 'view/header.php';

if ($login == true) {
  if ($super_user == true) {

    $value = $_GET['id'];
    $file = pilih_kolom('gambar', 'mobil', 'id_mobil', $value);

    if (unlink('upload/'.$file)) {
      if (hapus_data('mobil', 'id_mobil', $value)) {
        redirect_url('index.php');
      } else {
        echo "gagal hapus data";
      }
    } else {
      hapus_data('mobil', 'id_mobil', $value);
      redirect_url('index.php');
    }

  } else {
    redirect_url('index.php');
  }
} else {
  redirect_url('login.php');
}

?>
