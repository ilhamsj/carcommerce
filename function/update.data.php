<?php
function update_data($column, $key, $value, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10, $col11, $col12) {
  $data2  = 'id_merk';
  $data3  = 'no_polisi';
  $data4  = 'model';
  $data5  = 'warna';
  $data6  = 'tahun';
  $data7  = 'hrg_beli';
  $data8  = 'hrg_jual';
  $data9  = 'tgl_beli';
  $data10 = 'tgl_jual';
  $data11 = 'gambar';
  $data12 = 'deskripsi';

  $query  = "UPDATE $column
  SET $data2='$col2', $data3='$col3', $data4='$col4', $data5='$col5', $data6='$col6', $data7='$col7', $data8='$col8',
  $data9='$col9', $data10='$col10', $data11='$col11', $data12='$col12' WHERE $key='$value'";
  return run($query);
}

function update($bukti, $status, $id) {
  $query = "UPDATE pembayaran SET bukti_byr='$bukti', status='$status' WHERE id_bayar='$id'";
  return run($query);
}

function update_tgl_jual($id_mobil) {
  $query = "UPDATE mobil SET tgl_jual=CURRENT_TIMESTAMP() WHERE id_mobil='$id_mobil'";
  return run($query);
}
?>
