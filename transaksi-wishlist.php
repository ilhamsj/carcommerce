<?php
require_once 'core/init.php';

if ($login == true):
  if (isset($_GET['id'])):
    $col1 = autonumber(id_akhir('pemesanan', 'id_pemesanan'), 3, 4);
    $col2 = pilih_kolom('id_member', 'member', 'username', $_SESSION['user']);
    $col3 = $_GET['id'];
    $col4 = 0;

    if (tambah_pemesanan('pemesanan', $col1, $col2, $col3, $col4)) {
        redirect_url('profile.php');
    } else {
      echo "ada masalah";
    }

  else:
    redirect_url('index.php');
  endif;
else:
  redirect_url('login.php');
endif;
?>
