<?php
  require '../CMscripts/requires.php';
?>

<!DOCTYPE html>
<html>
  <?php
    include 'head/head.php';
  ?>
<body onLoad="setToday()">
  <?php
    $CurrentPage = basename($_SERVER['PHP_SELF']);
    if ($CurrentPage == 'signin.php') {
      include 'navbar/guest/navbar.php';
    }
    else {
      include 'navbar/member/navbar.php';
    }
  ?>
  <div class="container">
    <?php
      include 'includes/version.php';
    ?>
