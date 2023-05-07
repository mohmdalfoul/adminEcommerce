<?php
  session_start();
  unset($_SESSION['login']['id']);
  echo "<script>window.location.href='../signin.php'</script>";
?>