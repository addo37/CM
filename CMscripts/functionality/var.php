<?php
  $CurrentPage = basename($_SERVER['PHP_SELF']);
  if ($CurrentPage !== 'signin.php') {
    $UserCookie = $_COOKIE["usercookie"];
  }
?>
