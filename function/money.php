<?php
function rupiah($angka) {
  return 'Rp ' . number_format($angka,2,",",".");
}

function newDate($date) {
  $newFormat = date_create($date);
  return date_format($newFormat,"Y-m-d");
}

function redirect_url($path) {
  header("location:".$path);
  exit;
}

function autonumber($id_terakhir, $panjang_kode, $panjang_angka) {

  $kode       = substr($id_terakhir, 0, $panjang_kode);
  $angka      = substr($id_terakhir, $panjang_kode, $panjang_angka);

  $angka_baru = str_repeat("0", $panjang_angka - strlen($angka+1)).($angka+1);
  $id_baru    = $kode.$angka_baru;

  return $id_baru;
}

function tglstatus($tgljual, $kondisi) {
  if (newDate($tgljual) > 0) {
    $tgl_jual = newDate($tgljual);
  } else {
    $tgl_jual = $kondisi;
  }

  return $tgl_jual;
}

?>
