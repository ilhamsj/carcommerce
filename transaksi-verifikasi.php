<?php
require_once 'core/init.php';

if (isset($_SESSION['user'])) {
  if (cek_status($_SESSION['user']) == 1) {

    if (isset($_GET['id'])) {

      if (verivikasi($_GET['id'])) {
          $date_sold = date('Y-m-d H:i:s');
        if (verivikasi_terjual($date_sold, $_SESSION["car"])) {
          session_unset($_SESSION["car"]);
          header('Location: transaksi-list.php');
          exit();
        } else {
          echo "Ada masalah saat verivikasi";
        }
      } else {
        echo "Ada masalah saat verivikasi";
      }
    } else {
      header('Location: index.php');
    }


  } else {
    header('Location: index.php');
  }
} else {
  header('Location: login.php');
}
?>
