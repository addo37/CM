<?php
  // Sign in function ( signin.php )

  function signinfn($SIFName, $SILName) {
    /*
    echo $SIFName;
    echo $SILName;
    */
    // require connection file
    require '../CMscripts/connection/connect.php';
    // error messages
    $errmsg = 'Please fill out all the fields.';
    $UNexistsErrMsg = 'Invalid Info.';
    // check for empty fields
    if (empty($SIFName) || empty($SILName)) {
      $cefsifnStat = true;
    }
    else {
      $cefsifnStat = false;
    }
    //check if user exists
    $siQuery = "SELECT * FROM `users` WHERE (`FirstName` = '$SIFName' AND `LastName` = '$SILName')";
    $siSQL = mysqli_query($conn, $siQuery);
    $siNR = mysqli_num_rows($siSQL);
    if ($siNR == 1) {
      $siUexists = true;
    }
    else {
      $siUexists = false;
    }
    // sign in user
    if ($cefsifnStat == false) {
      if ($siUexists == true) {
        $SID = rand();
  			$SIDQuery = "SELECT * FROM `users` WHERE (`FirstName` = '$SIFName' AND `LastName` = '$SILName')";
        $SIDSQL = mysqli_query($conn, $SIDQuery);
  			$SIDR = mysqli_fetch_assoc($SIDSQL);
        $RID = $SIDR["ID"];
  			$RSID = $SIDR["SessionID"];
  			if ($RSID === NULL) {
  				$SIDUQuery = " UPDATE `users` SET `SessionID`= '$SID' WHERE `ID` = $RID";
          $SIDUSQL = mysqli_query($conn, $SIDUQuery);
  				setcookie("usercookie", "$SID", time()+31556926);
  			}
  			else {
  				setcookie("usercookie", "$RSID", time()+31556926);
  			}
  			header("Location: index.php");
      }
      else {
        echo $UNexistsErrMsg;
      }
    }
    else {
      echo $errmsg;
    }
  }

  //add user function ( adduser.php )
  function adduser($auFName, $auLName, $auIncome, $auCurrency) {
    // require connection file
    require '../CMscripts/connection/connect.php';
    // error messages
    $errmsg = 'Please fill out all the fields.';
    $UexistsErrMsg = 'This user already exists in our database.';
    $succmsg = 'User Inserted.';
    // check for empty fields
    if (empty($auFName) || empty($auLName) || empty($auIncome) || empty($auCurrency)) {
      $cefaufnStat = true;
    }
    else {
      $cefaufnStat = false;
    }
    //check if user already exists
    $cuQuery = "SELECT * FROM `users` WHERE (`FirstName` = '$auFName' AND `LastName` = '$auLName')";
    $cuSQL = mysqli_query($conn, $cuQuery);
    $cuNR = mysqli_num_rows($cuSQL);
    if ($cuNR > 0) {
      $Uexists = true;
    }
    else {
      $Uexists = false;
    }
    if ($Uexists == false) {
      if ($cefaufnStat == true) {
        echo $errmsg;
      }
      else {
        // insert user into database
        $auQuery = "INSERT INTO `users`(`FirstName`, `LastName`, `InCome`, `Currency`, `Rank`)
        VALUES ('$auFName', '$auLName', '$auIncome', '$auCurrency', 0) ";
        $auSQL = mysqli_query($conn, $auQuery);
        echo $succmsg;
        header( "refresh:3;url=adduser.php" );
      }
    }
    else {
      echo $UexistsErrMsg;
    }
  }
  //add transactionlo function ( transactions.php )
  function addtrans($atPName, $atPrice, $atMoneyHanded, $atCurrency) {
    // require connection file
    require '../CMscripts/connection/connect.php';
    // require var file
    require '../CMscripts/functionality/var.php';
    // error messages
    $errmsg = 'Please fill out all the fields.';
    $succmsg = 'Transaction submited and pending administrator approval.';
    // check for empty fields
    if (empty($atPName) || empty($atPrice) || empty($atMoneyHanded) || empty($atCurrency) ) {
      $cefatfnStat = true;
    }
    else {
      $cefatfnStat = false;
    }
    if ($cefatfnStat == true) {
      echo $errmsg;
    }
    else {
      // get current date and time
      $FirstDate = date('Y-m-d');
      $SecondDate = date('G:i:s');
      // fetch ID of signed in user
      $atUQuery = "SELECT * FROM `users` WHERE `SessionID` = '$UserCookie'";
      $atUSQL = mysqli_query($conn, $atUQuery);
      $atUR = mysqli_fetch_assoc($atUSQL);
      $atURID = $atUR["ID"];
      // check the amount of change
      $atMoneyReceived = $atMoneyHanded - $atPrice;
      /*
      // auto edit Currency
      $currValue = '1000';
      $NewatPrice = $currValue * $atPrice;
      $NewatMoneyHanded = $currValue * $currValue;
      */
      // insert transaction into database
      $atQuery = "INSERT INTO `transactions`(`ProductName`, `Price`, `Currency`, `UserID`, `DateBought`, `DateBoughtDetailed`, `MoneyHanded`, `MoneyReceived`, `Pending`)
      VALUES ('$atPName', '$atPrice', '$atCurrency', $atURID, '$FirstDate', '$SecondDate', '$atMoneyHanded', '$atMoneyReceived', 0) ";
      $atSQL = mysqli_query($conn, $atQuery);
      echo $succmsg;
      header( "refresh:3;url=index.php" );
    }
  }

  // echo users list function
  function userlist() {
    // require connection file
    require '../CMscripts/connection/connect.php';
    // echo info
    $ULQuery = "SELECT * FROM `users`";
    $ULSQL = mysqli_query($conn, $ULQuery);
    $ULNR = mysqli_num_rows($ULSQL);
    if ($ULNR > 1) {
      while($ULR = mysqli_fetch_assoc($ULSQL)) {
        $RID = $ULR["ID"];
        $RFName = $ULR["FirstName"];
        $RLName = $ULR["LastName"];
        ?>
        <div class="alert alert-info" role="alert"><span><b><?php echo $RFName ?></b> <b><?php echo $RLName ?></b></span></div>
        <?Php
      }
    }
    else {
    ?>
      <div class="alert alert-info" role="alert"><span><b>No users to show yet.</b></span></div>
    <?php
    }
  }
?>
