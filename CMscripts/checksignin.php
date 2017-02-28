<?php
  require 'functionality/var.php';
  if ($CurrentPage !== 'signin.php') {
    if (!$UserCookie) {
      header("Location: signin.php");
    }
  }
  if ($CurrentPage == 'signin.php') {
    if (isset($UserCookie)) {
      header("Location: index.php");
    }
  }

?>
