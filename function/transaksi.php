<?php
function transaksi($id_transaction, $id_car, $id_user, $tanggal, $status, $total, $bukti, $desc, $bank) {
  global $link;

  $query  = "INSERT INTO transactions VALUES('$id_transaction', '$id_car', '$id_user', '$tanggal', '$status', '$total', '$bukti', '$desc', '$bank')";
  $result = mysqli_query($link, $query);
  return $result;
}

function upload_bukti($gambar, $id) {
  global $link;

  $query  = "UPDATE transactions SET transaction_bukti = '$gambar', transaction_status = '1' WHERE id_transaction='$id'";
  $result = mysqli_query($link, $query);

  return $result;
}

function verivikasi($id) {
  global $link;

  $query  = "UPDATE transactions SET transaction_status = '2' WHERE id_transaction='$id'";
  $result = mysqli_query($link, $query);

  return $result;
}

function verivikasi_terjual($date_sold, $id) {
  global $link;

  $query  = "UPDATE cars SET date_sold = '$date_sold' WHERE id_car='$id'";
  $result = mysqli_query($link, $query);

  return $result;
}
?>
