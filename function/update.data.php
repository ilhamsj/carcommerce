<?php
function update_data($column, $row, $key, $col1, $col2, $col3, $col4, $col5, $col6, $col7, $col8, $col9, $col10) {
  global $link;

  $data1  = 'car_nopolice';
  $data2  = 'car_merk';
  $data3  = 'car_model';
  $data4  = 'car_color';
  $data5  = 'car_years';
  $data6  = 'car_purchase';
  $data7  = 'car_price';
  $data8  = 'date_purchase';
  $data9  = 'date_sold';
  $data10 = 'car_image';

  $query  = "UPDATE $column SET $data1='$col1', $data2='$col2', $data3='$col3', $data4='$col4', $data5='$col5', $data6='$col6', $data7='$col7', $data8='$col8', $data9='$col9',$data10='$col10' WHERE $row='$key'";
  $result = mysqli_query($link, $query);

  return $result;
}
?>
