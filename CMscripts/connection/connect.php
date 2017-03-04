<?php
//error_reporting(0);
//error_reporting( E_ALL & ~E_NOTICE );
  require 'connectvars.php';
  $link = ($GLOBALS["___mysqli_ston"] = mysqli_connect($servername,  $dbusername,  $password));
	if (!$link) {
		die ('Not connected : '.((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	}
	$db_selected = ((bool)mysqli_query( $link, "USE $dbname"));
	if (!$db_selected) {
		die ('Can\'t use ' .$dbname . ' database : ' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)));
	}
	$conn = new mysqli($servername, $dbusername, $password, $dbname);
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

?>