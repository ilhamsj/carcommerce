<?php
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
