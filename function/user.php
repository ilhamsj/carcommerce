<?php
function cek_data($user, $pass) {
  global $link;

  $pass = md5($pass);
  
  $query  = "SELECT * FROM users WHERE username='$user' AND password='$pass'";

  if ($result = mysqli_query($link, $query)) {
    if (mysqli_num_rows($result) != 0) return true;
    else return false;
  }
  return $result;
}

function cek_status($user) {
  global $link;

  $query  = "SELECT level FROM users WHERE username='$user'";

  if ($result = mysqli_query($link, $query)) {
    while ($row = mysqli_fetch_assoc($result)) {
      $level = $row['level'];
    }
  }
  return $level;
}

if (isset($_SESSION['user'])) {
    $login = true;
    if (cek_status($_SESSION['user']) == 1) {
    $super_user = true;
  }
}

function id_user($user) {
  global $link;

  $query  = "SELECT id_user FROM users WHERE username='$user'";
  $result = mysqli_query($link, $query);

  while ($row = mysqli_fetch_assoc($result)) {
    $your_id = $row['id_user'];
  }

  return $your_id;
}

?>
