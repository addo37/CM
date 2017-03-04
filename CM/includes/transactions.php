<div class="alert alert-info" role="alert">
  <span>
    <?php
    if (isset($_POST["AddTransBTN"])) {
      $atPName = mysqli_real_escape_string($conn, $_POST["ProductName"]);
      $atPrice = mysqli_real_escape_string($conn, $_POST["ProductPrice"]);
      $atMoneyHanded = mysqli_real_escape_string($conn, $_POST["MoneyHanded"]);
      $atCurrency = mysqli_real_escape_string($conn, $_POST["Currency"]);
      addtrans($atPName, $atPrice, $atMoneyHanded, $atCurrency);
    }
    else {
    ?>
      <b>All transactions must be approved by the site administrator.</b>
    <?php
    }
    ?>
  </span>
</div>
<blockquote>
  <b>Transactions</b>
  <hr>
  <!--
  <div class = "form-group">
    <div class="alert alert-danger" role="alert"><span>The amount of money provided will be automatically multiplied by 1000</span></div>
  </div>
  -->
  <div class = "add-trans">
      <! Calender to be added >
      <div class = "form-container">
		<?php
			$calendar = new Calendar(); 
			echo $calendar->show();
		?>
      </div>
      <! Calender end >
    <div class = "form-container">
      <form method = "post" action = "index.php">
        <div class = "form-group">
            <input class = "form-control" type = "text" name = "ProductName" placeholder = "Product name">
        </div>
        <div class = "form-group">
            <input class = "form-control" type = "number" name = "ProductPrice" placeholder = "Product price">
        </div>
        <div class = "form-group">
            <input class = "form-control" type = "number" name = "MoneyHanded" placeholder = "Money handed">
        </div>
        <div class = "form-group">
          <select name = "Currency" class = "form-control">
            <option value = "LBP">L.L</option>
            <!-- <option value = "USD">&dollar;</option> -->
          </select>
        </div>
        <div class = "form-group">
          <input class = "btn btn-primary btn-block" type = "submit" name = "AddTransBTN"></input>
        </div>
      </form>
    </div>
  </div>
</blockquote>
