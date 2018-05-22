<?php
require_once 'core/init.php';
$key = $_GET['id'];

if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) == 1) {

    $value = $_GET['id'];
    
    $file = pilih_kolom('car_image', 'cars', 'id_car', $key);

    if (unlink('upload/'.$file)) {
      if (hapus_data('cars', 'id_car', $value)) {
        header('Location: index.php');
      } else {
        echo "gagal hapus data";
      }
    } else {
      hapus_data('cars', 'id_car', $value);
      header('Location: index.php');
    }


  } else {
    header('Location: index.php');
  }
} else {
  header('Location: login.php');
}

?>
